<?php

namespace Admin\AdmBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Admin\AdmBundle\Entity\Commands;
use Symfony\Component\HttpFoundation\Response;

class CommandsController extends Controller{
  public function indexAction(){
    $em =   $this->getDoctrine();
    $conn = $this->get('database_connection');
    $data = $em->getRepository('AdminAdmBundle:Commands')
               ->getAll($conn);
    
    return $this->render('AdminAdmBundle:Commands:index.html.twig', array('data'=>$data,'title'=>'Текущие команды','menu'=>'commands'));
  }
  
  public function stopAction($id){
    $em=$this->getDoctrine()->getManager();
    $conn=$this->get('database_connection');
    
    $rezult= $em->getRepository('AdminAdmBundle:Commands')
                ->stop($conn,$id);
    
    $r=array(
      'status'=>'ok',
      'error'=>'',
    );
    
    $data=json_encode($r);
    return new Response($data);
  }
  
}