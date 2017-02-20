<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\RegistrationType;
use AppBundle\Entity\Registration;
use Symfony\Component\HttpFoundation\Response;

class RezerwacjaController extends Controller
{
    /**
     * @Route("/rezerwacja", name="rezerwacja")
     */
    public function indexAction(Request $request)
    {
         if($request->isXmlHttpRequest()) {
            
            $listWeekDays = $this->get('date_service')->showWeekFromCurrentDay();
            $today = $this->get('date_service')->polishDateTranslate(date('N'));
            $test = $this->get('date_service')->workHours(8, 20);
            return $this->render('views/pages/rezerwacja.html.php',
                                 array('listWeekDays' => $listWeekDays,
                                       'today' => $today,
                                       'test' => $test,
                                       'iloscTorow' => 5
                                     )
                    );
         } else {
             return $this->redirectToRoute("index");
         }
        
    }
    /**
     * @Route("/rezerwacja_dane", name="rezerwacja_dane")
     */
    public function daneAction(Request $request)
    {
         if($request->isXmlHttpRequest()) {
             
            $params = $request->request->all();
            //var_dump($params);
             
            $em = $this->getDoctrine()->getManager(); 
            if(isset($params['day'])) {
                $time = $this->get('date_service')->checkIfHoursColide($params);
            } else {
                $time = "controller";
            }
            
            
            $rejestracja = new Registration();
            
            $form = $this->createForm(new RegistrationType($time), $rejestracja);
            $form->handleRequest($request);
            
            if($form->isValid()) {
                $getRegistrationData = $form->getData();
                $em->persist($getRegistrationData);
                $em->flush();
                
                return new Response("Rezerwacja przebiegła pomyślnie");
            }
           
            return $this->render('views/pages/rezerwacja_dane.html.php',
                                 array('form' => $form->createView(),
                                       'params' => $params, 
                                       'time' => $time
                                       
                                     )
                    );
         } else {
             return $this->redirectToRoute("index");
         }
        
    }
    /**
     * @Route("/rezerwacja_get", name="rezerwacja_get")
     */
    public function daneGetAction(Request $request)
    {
         if($request->isXmlHttpRequest()) {
             $registration = $this->getDoctrine()->getRepository("AppBundle:Registration");
             $query = $registration->createQueryBuilder('p')
                                   ->select(array('p.dataRezerwacji', 'p.tor', 'p.od', 'p.do', 'p.id', 'p.imie', 'p.nazwisko', 'p.telefon')
                                   )->getQuery();
             $results = $query->getResult();
            return new Response(json_encode($results));
         } else {
             return $this->redirectToRoute("index");
         }
        
    }
    /**
     * @Route("/rezerwacja_people", name="rezerwacja_people")
     */
    public function daneGetFromIdAction(Request $request)
    {
         if($request->isXmlHttpRequest()) {
             $params = $request->request->all();
             $registration = $this->getDoctrine()->getRepository("AppBundle:Registration");
             $query = $registration->createQueryBuilder('p')
                                   ->select(array('p.tor', 'p.od', 'p.do', 'p.id', 'p.imie', 'p.nazwisko', 'p.telefon'))
                                   ->where("p.id = " . $params['id'])
                                   ->getQuery();
             $results = $query->getResult();
            return new Response(json_encode($results));
         } else {
             return $this->redirectToRoute("index");
         }
        
    }
}
