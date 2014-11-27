<?php

namespace Admin\AdmBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Admin\AdmBundle\Entity\Clients;
use Symfony\Component\HttpFoundation\Response;
//use Admin\AdmBundle\Form\ClientsType;
//use Symfony\Component\HttpFoundation\Request;

class ClientsController extends Controller{
  public function indexAction(){
    $em =   $this->getDoctrine();
    $conn = $this->get('database_connection');
    $data = $em->getRepository('AdminAdmBundle:Clients')
               ->getAll($conn);
    
    return $this->render('AdminAdmBundle:Clients:index.html.twig', array('data'=>$data,'title'=>'Клиенты','menu'=>'clients'/*,'FORM' => $form_clients->createView()*/));
  }
  
  public function createAction(/*Request $request*/){
    $request = $this->getRequest();
    $em = $this->getDoctrine()->getManager();
    
    $company=$request->request->get('company');
    $fname=$request->request->get('fname');
    $sname=$request->request->get('sname');
    $pname=$request->request->get('pname');
    $birthday=new \DateTime($request->request->get('birthday'));
    $email=$request->request->get('email');
    $phone=$request->request->get('phone');
    if(!$company || !$email || !$phone){
      $r=array(
        'status'=>'err',
        'error'=>'Не заполнены обязательные поля!',
      );
      $data=json_encode($r);
      return $this->render('AdminAdmBundle:Clients:create.json.twig', array('rezult'=>$data));
      return false;
    }
    
    /*
    $clients=new Clients();
    $form_clients=$this->createForm(new ClientsType(),$clients);
    $form_clients->handleRequest($request);
    var_dump($clients);
    */
    $clients=new Clients();
    $clients->setCompany($company);
    $clients->setFname($fname);
    $clients->setSname($sname);
    $clients->setPname($pname);
    $clients->setBirthday($birthday);
    $clients->setEmail($email);
    $clients->setPhone($phone);
    
    $em->persist($clients);
    $em->flush();
    
    $data=array(
      'status'=>'ok',
      'error'=>'',
      'id'=>$clients->getId(),
    );
    
    return $this->render('AdminAdmBundle:Clients:create.json.twig', array('rezult'=>json_encode($data)));
  }
  
  public function deleteAction($id){
    $em = $this->getDoctrine()->getManager();
    //$clients=$em->getRepository('AdminAdmBundle:Clients')->findOneBy(array("id"=>$id));
    $clients=$em->getRepository('AdminAdmBundle:Clients')->find($id);
    $em->remove($clients);
    $em->flush();
    
    $data=array(
      'status'=>'ok',
      'error'=>'',
    );
    
    return $this->render('AdminAdmBundle:Clients:delete.json.twig', array('rezult'=>json_encode($data)));
  }
  
  public function updateAction($id){
    $request = $this->getRequest();
    $param=$request->query->get('param');
    $value=$request->query->get('value');
    
    $em = $this->getDoctrine()->getManager();
    $clients=$em->getRepository('AdminAdmBundle:Clients')->find($id);
    
    if($param=='company'){
      $clients->setCompany($value);
    }elseif($param=='fname'){
      $clients->setFname($value);
    }elseif($param=='sname'){
      $clients->setSname($value);
    }elseif($param=='pname'){
      $clients->setPname($value);
    }elseif($param=='birthday'){
      $clients->setBirthday(new \DateTime($value));
    }elseif($param=='email'){
      $clients->setEmail($value);
    }elseif($param=='phone'){
      $clients->setPhone($value);
    }
    
    //$em->update($clients);
    $em->flush();
    
    $data=array(
      'status'=>'ok',
      'error'=>'',
    );
    
    return $this->render('AdminAdmBundle:Clients:update.json.twig', array('rezult'=>json_encode($data)));
  }
  
}