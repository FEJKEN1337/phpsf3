<?php

namespace ReserveRoomBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LoadRoomsController extends Controller
{
    private $entityManager;
    
    public function indexAction()
    {
        $this->entityManager = $this->getDoctrine()->getManager();
        
        $rooms = $this->entityManager->getRepository("AppBundle:Rooms")->findAll();
        return $this->render('ReserveRoomBundle:ReserveRooms:loadRooms.html.php',array("rooms"=>$rooms));
    }
}
