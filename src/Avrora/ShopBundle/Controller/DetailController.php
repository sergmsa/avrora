<?php

namespace Avrora\ShopBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Avrora\ShopBundle\Entity\Games;
use Avrora\ShopBundle\Entity\Commands;


class DetailController extends Controller{
  public function indexAction($id){
    $em=   $this->getDoctrine();
    $conn= $this->get('database_connection');
    //$game= $em->getRepository('AvroraShopBundle:Games')
    //           ->findOne($conn,$id);
    $game= $em->getRepository('AvroraShopBundle:Games')->find($id);
    
    $title="Игра: ".$game->getName();
    return $this->render('AvroraShopBundle:Detail:index.html.twig', array('id' => $id,'game'=>$game,'title'=>$title,'menu'=>'shop'));
  }
  
  public function runAction($id){
    $em=$this->getDoctrine()->getManager();
    $conn=$this->get('database_connection');
    // есть ли команда запуска на текщем аттракционе?
    $r=$em->getRepository('AvroraShopBundle:Commands')
          ->runcntCommands($conn,4);
    if($r>=1){
      $r=array(
        'status'=>'err',
        'error'=>'Вы можете единовременно запустить только одну игру на аттракционе',
      );
      $data=json_encode($r);
      return $this->render('AvroraShopBundle:Detail:run.json.twig', array('rezult'=>$data));
    }
    
    $commands=new Commands();
    $commands->setAttractionId(4);
    $commands->setClientId(2);
    $commands->setGameId($id);
    $commands->setTypeCmd(2);
    $commands->setStatus(0);
    $commands->setAddCmd(null);
    $commands->setStartexec(new \DateTime("0000-00-00 00:00:00"));
    $commands->setEndexec(new \DateTime("0000-00-00 00:00:00"));
    $commands->setProgress(0);
    $em->persist($commands);
    $em->flush();
    
    $r=array(
      'status'=>'ok',
      'error'=>'',
      'id'=>$commands->getId(),
    );
    
    $data=json_encode($r);
    return $this->render('AvroraShopBundle:Detail:run.json.twig', array('rezult' =>$data));
  }
  
  
  
  public function downloadAction($id){
    $em=$this->getDoctrine()->getManager();
    $conn=$this->get('database_connection');
    // есть ли команда загрузки на текщий аттракцион?
    $r=$em->getRepository('AvroraShopBundle:Commands')
          ->downloadcntCommands($conn,4);
    if($r>=1){
      $r=array(
        'status'=>'err',
        'error'=>'Вы можете единовременно запустить максимум одну установку на аттракцион',
      );
      $data=json_encode($r);
      return $this->render('AvroraShopBundle:Detail:download.json.twig', array('rezult'=>$data));
    }
    
    $commands=new Commands();
    $commands->setAttractionId(4);
    $commands->setClientId(2);
    $commands->setGameId($id);
    $commands->setTypeCmd(1);
    $commands->setStatus(0);
    $commands->setAddCmd(null);
    $commands->setStartexec(new \DateTime("0000-00-00 00:00:00"));
    $commands->setEndexec(new \DateTime("0000-00-00 00:00:00"));
    $commands->setProgress(0);
    
    
    $em->persist($commands);
    $em->flush();
    
    $r=array(
      'status'=>'ok',
      'error'=>'',
      'id'=>$commands->getId(),
    );
    
    $data=json_encode($r);
    return $this->render('AvroraShopBundle:Detail:download.json.twig', array('rezult' =>$data));
  }
  
  public function progressdownloadAction($id){
    $em=$this->getDoctrine()->getManager();
    $conn=$this->get('database_connection');
    $request = $this->getRequest();
    $downloadid=$request->query->get('downloadid');
    
    $prorgess= $em->getRepository('AvroraShopBundle:Commands')
                  ->progressdownload($conn,$downloadid);
    return $this->render('AvroraShopBundle:Detail:progressdownload.html.twig', array('rezult'=>$prorgess));
  }
  
  public function progressrunAction($id){
    $em=$this->getDoctrine()->getManager();
    $conn=$this->get('database_connection');
    $request = $this->getRequest();
    $downloadid=$request->query->get('downloadid');
    
    $prorgess= $em->getRepository('AvroraShopBundle:Commands')
                  ->progressrun($conn,$downloadid);
    return $this->render('AvroraShopBundle:Detail:progressrun.html.twig', array('rezult'=>$prorgess));
  }
  
  public function stopAction($id){
    $em=$this->getDoctrine()->getManager();
    $conn=$this->get('database_connection');
    $request = $this->getRequest();
    $downloadid=$request->query->get('downloadid');
    
    $rezult= $em->getRepository('AvroraShopBundle:Commands')
                ->stop($conn,$downloadid);
    
    $r=array(
      'status'=>'ok',
      'error'=>'',
    );
    
    $data=json_encode($r);
    return $this->render('AvroraShopBundle:Detail:stop.json.twig', array('rezult'=>$data));
  }
  
    
}
