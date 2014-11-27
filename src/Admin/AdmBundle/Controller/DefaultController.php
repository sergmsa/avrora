<?php

namespace Admin\AdmBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller{
  public function indexAction(){
    return $this->render('AdminAdmBundle:Default:index.html.twig', array('title'=>'Администрирование','menu'=>'index'));
  }
  
  public function historycommandsAction(){
    $em =   $this->getDoctrine();
    $conn = $this->get('database_connection');
    $data = $em->getRepository('AdminAdmBundle:HistoryCommands')
               ->getAll($conn);
    
    return $this->render('AdminAdmBundle:Default:historycommands.html.twig', array('data'=>$data,'title'=>'История команд','menu'=>'historycommands'));
  }
  
  public function gamesinstallAction(){
    $em =    $this->getDoctrine();
    $conn =  $this->get('database_connection');
    $data = $em->getRepository('AdminAdmBundle:GamesInstall')
               ->getAll($conn);
    
    return $this->render('AdminAdmBundle:Default:gamesinstall.html.twig', array('data'=>$data,'title'=>'Установленые игры','menu'=>'gamesinstall'));
  }
  
  
  
}
