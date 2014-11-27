<?php

namespace Admin\AdmBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Admin\AdmBundle\Entity\Games;
use Symfony\Component\HttpFoundation\Response;


class GamesController extends Controller{
  public function indexAction(){
    $em =   $this->getDoctrine();
    $data = $em->getRepository('AdminAdmBundle:Games')
               ->findAll();
    
    return $this->render('AdminAdmBundle:Games:index.html.twig', array('data'=>$data,'title'=>'Игры','menu'=>'games'));
  }
  
  public function createAction(){
    $request = $this->getRequest();
    $em = $this->getDoctrine()->getManager();
    
    $name=$request->request->get('name');
    $ver=$request->request->get('ver');
    $price=$request->request->get('price');
    $path_run=$request->request->get('path_run');
    
    if(!$name){
      $r=array(
        'status'=>'err',
        'error'=>'Не заполнены обязательные поля!',
      );
      $data=json_encode($r);
      return $this->render('AdminAdmBundle:Games:create.json.twig', array('rezult'=>$data));
      return false;
    }
    
    $games=new Games();
    $games->setName($name);
    $games->setVer($ver);
    $games->setPrice($price);
    $games->setPathRun($path_run);
    $games->setDateadd(null);
    $games->setDeveloperId(0);
    
    $em->persist($games);
    $em->flush();
    
    $games=$em->getRepository('AdminAdmBundle:Games')->find($games->getId());
    $dateadd=$games->getDateadd();
    
    $data=array(
      'status'=>'ok',
      'error'=>'',
      'id'=>$games->getId(),
      'dateadd'=>$dateadd,
      
    );
    
    return $this->render('AdminAdmBundle:Games:create.json.twig', array('rezult'=>json_encode($data)));
  }
  
  public function deleteAction($id){
    $em = $this->getDoctrine()->getManager();
    $games=$em->getRepository('AdminAdmBundle:Games')->find($id);
    $em->remove($games);
    $em->flush();
    
    $data=array(
      'status'=>'ok',
      'error'=>'',
    );
    
    return $this->render('AdminAdmBundle:Games:delete.json.twig', array('rezult'=>json_encode($data)));
  }
  
  public function updateAction($id){
    $request = $this->getRequest();
    $param=$request->query->get('param');
    $value=$request->query->get('value');
    
    $em = $this->getDoctrine()->getManager();
    $games=$em->getRepository('AdminAdmBundle:Games')->find($id);
    
    if($param=='name'){
      $games->setName($value);
    }elseif($param=='ver'){
      $games->setVer($value);
    }elseif($param=='price'){
      $games->setPrice($value);
    }elseif($param=='path_run'){
      $games->setPathRun($value);
    }
    
    $em->flush();
    
    $data=array(
      'status'=>'ok',
      'error'=>'',
    );
    
    return $this->render('AdminAdmBundle:Games:update.json.twig', array('rezult'=>json_encode($data)));
  }
  
  public function loadimgAction($id){
    if($_FILES["imgfile"]["size"] && $_FILES["imgfile"]["type"]=='image/jpeg'){
      $image = imagecreatefromjpeg($_FILES["imgfile"]["tmp_name"]);
      $w=imagesx($image);
      $h=imagesy($image);
      if($w>500){
        $cw=500/$w;
        $cy=$h*$cw;
        $new_image = imagecreatetruecolor(500,$cy);
        imagecopyresampled($new_image, $image, 0, 0, 0, 0, 500, $cy, $w, $h);
        $image = $new_image;
        imagejpeg($image,$_SERVER['DOCUMENT_ROOT']."/games/{$id}.jpg",75);
      }
      //move_uploaded_file($_FILES["imgfile"]["tmp_name"],$_SERVER['DOCUMENT_ROOT']."/games/{$id}.jpg");
      
    }
    
    return $this->redirect($this->generateUrl('admin_adm_games'));
  }
  
  
}