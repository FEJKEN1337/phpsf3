<?php

namespace ReserveRoomBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Rooms;
use AppBundle\Entity\Reservations;

class AjaxController extends Controller
{
    private $entityManager;
    
    public function indexAction(Request $request)
    {
        $this->entityManager = $this->getDoctrine()->getManager();
        if($request->isXmlHttpRequest())
        {
            $mode = $request->request->get('mode');
            return new JsonResponse($this->$mode($request));
        }
        return new Response("Acces Denied");
    }
    public function checkRoomAvailibility($request)
    {
        $days = (int)$request->request->get("days");
        $daysInSeconds = $days * 24 * 60 *60;
        
        $date = strtotime($request->request->get("date"));
        
        if($date)
        {
            $start = $date;
            $end = $date + $daysInSeconds;
            
            //zaczynające sie lub kończoce poza oraz te co sa całe w srodku oraz te 
            //co zaczynaja sie poza i trwaja przez nasz okres i kończą sie poza nim
            
            $reservations = $this->entityManager->getRepository("AppBundle:Reservations")->createQueryBuilder("r")
                    ->addSelect("r")
                    ->where("r.reservationFrom < :end AND r.reservationTo > :start") 
                    ->setParameter("start",$start)
                    ->setParameter("end",$end)
                    ->getQuery()
                    ->getResult();
            
                    
            $rooms = $this->entityManager->getRepository("AppBundle:Rooms")->findAll();
            $preparedRooms = array();
            
            foreach($rooms as $room)
            {
                $preparedRoom["id"] = $room->getId();
                $reserved = 0;
                
                foreach($reservations as $reservation)
                {
                    if($reservation->getRoom() == $room && $reservation->getAmmountOfPeople() > $reserved)
                        $reserved = $reservation->getAmmountOfPeople();
                }
                
                $placeToStore = $room->getPlaceToStore() - $reserved;
                $preparedRoom["placeToStore"] = $placeToStore;
                
                array_push($preparedRooms, $preparedRoom);
                
            }
            return $preparedRooms;
        }
        
        return array();
    }
}
