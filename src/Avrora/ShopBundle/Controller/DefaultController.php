<?php

namespace Avrora\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller{
  public function indexAction(){
    $title=  "Магазин";
    $em =    $this->getDoctrine();
    $conn =  $this->get('database_connection');
    $games = $em->getRepository('AvroraShopBundle:Games')
                ->getAll($conn);
    
    return $this->render('AvroraShopBundle:Default:index.html.twig', array('games'=>$games,'title'=>$title,'menu'=>'shop'));
  }
  
  
  
    
}
