<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CennikController extends Controller
{
    /**
     * @Route("/cennik", name="cennik")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('views/pages/cennik.html.php', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
}
