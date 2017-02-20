<?php

namespace ReserveRoomBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Reservations;
use AppBundle\Entity\Rooms;

class ReserveRoomController extends Controller
{
    private $entityManager;
    
    public function indexAction(Request $request)
    {
        $this->entityManager = $this->getDoctrine()->getManager();
        $session = $this->get('session');
        $formData = $request->query->all();
        
        //sprawdza czy wszystkie wartosci istnieja
        if(!array_key_exists("id", $formData) || !array_key_exists("days", $formData) || !array_key_exists("reservationDate", $formData) )
        {
            $session->getFlashBag()->add('error', 'Niekompletne dane');
            return $this->redirect($this->generateUrl("load_rooms"));
        }
        
        $room = $this->entityManager->getRepository("AppBundle:Rooms")->find($formData["id"]);
        
        //sprawdza czy znaleziono pokój o podanym identyfikatorze
        if(!$room)
        {
            $session->getFlashBag()->add('error', 'Nie odnaleziono pokoju o podanym identyfikatorze');
            return $this->redirect($this->generateUrl("load_rooms"));
        }
        
        if($request->isMethod("POST"))
        {
            $formReservation = $request->request->get('reservation');
            $roomId = $formData['id'];
            
            //tworzy start i end
            $days = (int)$formReservation['days'];
            $daysInSeconds = $days * 24 * 60 *60;
            $date = strtotime($formReservation['reservationFrom']);
            
            if($date && $date > time())//jezeli data jest wieksza od dzisiejszego dnia
            {
                $start = $date;
                $end = $date + $daysInSeconds;
                
                //wszystkie rezerwacje dotyczace okresu wypozyczenia dla tego pokoju
                $reservations = $this->entityManager->getRepository("AppBundle:Reservations")->createQueryBuilder("r")
                    ->addSelect("r")
                    ->where("r.reservationFrom < :end AND r.reservationTo > :start") 
                    ->andWhere("r.room = :id")
                    ->setParameter("id",$room)
                    ->setParameter("start",$start)
                    ->setParameter("end",$end)
                    ->getQuery()
                    ->getResult();
                
                //sprawdza ile pokoj ma wolnych miejsc
                $reserved = 0;
                foreach($reservations as $reservation)
                {  
                    if($reservation->getAmmountOfPeople() > $reserved)
                        $reserved = $reservation->getAmmountOfPeople();
                }
                $placeToStore = $room->getPlaceToStore() - $reserved;
                
                if($placeToStore < (int)$formReservation['ammountOfPeople'])
                {
                    $session->getFlashBag()->add('error', 'Ten pokój nie ma wystarczającej liczby wolnych miejsc w tym przedziale datowym');
                    return $this->redirect($this->generateUrl("add_reservation",array(
                        "id"=>$roomId,
                        "reservationDate"=>$formReservation['reservationFrom'],
                        "days"=>$formReservation['days']
                        )));
                }
                
                //nowy obiekt rezerwacji
                $newReservation = new Reservations();
                $newReservation->setRoom($room);
                $newReservation->setName($formReservation['name']);
                $newReservation->setSurname($formReservation['surname']);
                $newReservation->setReservationFrom($start);
                $newReservation->setReservationTo($end);
                $newReservation->setAmmountOfDays($days);
                $newReservation->setPhone($formReservation['phone']);
                $newReservation->setAmmountOfPeople((int)$formReservation['ammountOfPeople']);
                
                //walidacja
                $validator = $this->get('validator');
                $errors = $validator->validate($newReservation);
                
                if(count($errors) > 0)
                {
                    foreach($errors as $error)
                        $session->getFlashBag()->add('error', $error->getMessage());
                    
                    return $this->redirect($this->generateUrl("add_reservation",array(
                        "id"=>$roomId,
                        "reservationDate"=>$formReservation['reservationFrom'],
                        "days"=>$formReservation['days']
                        )));
                }
                
                //dodanie rezerwacji do bazy
                $this->entityManager->persist($newReservation);
                $this->entityManager->flush();
                
                $session->getFlashBag()->add('success', 'Pokój o został zarezerwowany');
                return $this->redirect($this->generateUrl("load_rooms"));
                
           }
            else
            {
                $session->getFlashBag()->add('error', 'Błędna data');
                return $this->redirect($this->generateUrl("add_reservation",array(
                    "id"=>$roomId,
                    "reservationDate"=>$formReservation['reservationFrom'],
                    "days"=>$formReservation['days']
                    )));
            }
                
            
        }
        return $this->render('ReserveRoomBundle:ReserveRooms:reserveRoom.html.php',array("room"=>$room));
    }
}
