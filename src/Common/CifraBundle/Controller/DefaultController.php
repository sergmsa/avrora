<?php

namespace Common\CifraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CommonCifraBundle:Default:index.html.twig', array('name' => $name));
    }
}
