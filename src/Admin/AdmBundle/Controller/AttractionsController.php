<?php

namespace Admin\AdmBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Admin\AdmBundle\Entity\Attractions;   //

class AttractionsController extends Controller{
  public function indexAction(){
    $em =   $this->getDoctrine();
    $conn = $this->get('database_connection');
    $data = $em->getRepository('AdminAdmBundle:Attractions')
               ->getAll($conn);
    $clients = $em->getRepository('AdminAdmBundle:Clients')
                  ->findAll();
    
    return $this->render('AdminAdmBundle:Attractions:index.html.twig', array('data'=>$data,'clients'=>$clients,'title'=>'Аттракционы','menu'=>'attractions'));
  }
  
  public function createAction(){
    $request = $this->getRequest();
    $em = $this->getDoctrine()->getManager();
    
    $client_id=$request->request->get('client_id');
    $pass=$request->request->get('pass');
    $dateintall=new \DateTime($request->request->get('dateintall'));
               
    if(!$client_id || !$pass || !$dateintall){
      $r=array(
        'status'=>'err',
        'error'=>'Не заполнены обязательные поля!',
      );
      $data=json_encode($r);
      return $this->render('AdminAdmBundle:Attractions:create.json.twig', array('rezult'=>$data));
      return false;
    }
    
    $attractions=new Attractions();
    $attractions->setClientId($client_id);
    $attractions->setPass(md5($pass));
    $attractions->setDateinstall($dateintall);
    $attractions->setGpsn(0);
    $attractions->setGpse(0);
    
    $em->persist($attractions);
    $em->flush();
    
    
    // Формируем селект для выбора клиента
    $cl = $em->getRepository('AdminAdmBundle:Clients')
                  ->findAll();
    $clients='<select class="form-control client_id" name="client_id">';
    foreach($cl as $v){
      if($v->getId()==$client_id) $clients.="<option value='".$v->getId()."' selected>".$v->getCompany()."</option>";
      else                        $clients.="<option value='".$v->getId()."'>".$v->getCompany()."</option>";
    }
    $clients.='</select>';
    $newline='
<tr>
  <td>'.$newid.'</td>
  <td>'.$clients.'</td>
  <td><input type="password" name="pass" id="'.$newid.'" value="" class="form-control" placeholder="новый пароль"></td>
  <td></td>
  <td></td>
  <td><input type="date" name="dateinstall" id="'.$newid.'" value="'.$dateinstall.'" class="form-control"></td>
  <td><button type="button" name="delete" id="'.$newid.'" class="btn">удалить</button></td>
</tr>
    ';
    
    $data=array(
      'status'=>'ok',
      'error'=>'',
      'id'=>$attractions->getId(),
      'newline'=>$newline,
    );
    
    return $this->render('AdminAdmBundle:Attractions:create.json.twig', array('rezult'=>json_encode($data)));
    
  }
  
  public function updateAction($id){
    $request = $this->getRequest();
    $param=$request->query->get('param');
    $value=$request->query->get('value');
    
    $em = $this->getDoctrine()->getManager();
    $attractions=$em->getRepository('AdminAdmBundle:Attractions')->find($id);
    
    
    if($param=='client_id'){
      $attractions->setClientId($value);
    }elseif($param=='pass'){
      $attractions->setPass(md5($value));
    }elseif($param=='dateinstall'){
      $attractions->setDateinstall(new \DateTime($value));
    }
    
    $em->flush();
    
    $data=array(
      'status'=>'ok',
      'error'=>'',
    );
    
    return $this->render('AdminAdmBundle:Attractions:update.json.twig', array('rezult'=>json_encode($data)));
  }
  
  public function deleteAction($id){
    $em = $this->getDoctrine()->getManager();
    $attractions=$em->getRepository('AdminAdmBundle:Attractions')->find($id);
    $em->remove($attractions);
    $em->flush();
    
    $data=array(
      'status'=>'ok',
      'error'=>'',
    );
    
    return $this->render('AdminAdmBundle:Attractions:delete.json.twig', array('rezult'=>json_encode($data)));
  }
  
  
}