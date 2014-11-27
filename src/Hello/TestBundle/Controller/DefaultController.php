<?php

namespace Hello\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller{
  public function indexAction($name){
    /*$id=1;
    $em = $this->getDoctrine();
    $conn = $this->get('database_connection');
    $edit = $em->getRepository('TestBundle:Games')
               ->findOneArticle(  $uniq_index  );  ///Находим одну статью по индексу
    
    
    
    
    $em = $this->getDoctrine()->getEntityManager();
    $cinema = $this->getDoctrine()->getRepository('HelloTestBundle:Games')
    ->find($id);


    echo $cinema->getId()."<br />";die;     
    foreach ( $cinema as $key => $value ) {
      echo $cinema->getId()."<br />";
    }
    
    $arr_kino = array(
      'vesna' => array ( 
        'name' => 'кинотеатр ВЕСНА',
        'zal' => array( 'Зал_1', 'Зал_2', 'Зал_3'),
        'films' => array( 'Звездные войны', 'Терминатор','Aliens' ),
      ),
      'udarnic' => array ( 
        'name' => 'кинотеатр УДАРНИК',
        'zal' => array( 'Зал_1', 'Зал_2'),
        'films' => array( 'Звездные войны_1', 'Терминатор','Aliens' ),
      ),
    );
    */
    return $this->render('HelloTestBundle:Default:index.html.twig', array('menu'=>''));
    
  }
}
