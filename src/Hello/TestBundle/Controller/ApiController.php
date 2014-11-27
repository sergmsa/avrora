<?php

namespace Hello\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ApiController extends Controller
{
    public function nameFilmAction( $name_film )
    {
	///	$logger = $this->get('logger');
	//	$logger->info('I just got the logger');
	//	$logger->error('An error occurred');
        return $this->render('HelloTestBundle:Api:name_film.html.twig', array('name_film' => $name_film));
    }
}
