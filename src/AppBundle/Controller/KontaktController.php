<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class KontaktController extends Controller
{
    /**
     * @Route("/kontakt", name="kontakt")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('views/pages/kontakt.html.php', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
}
