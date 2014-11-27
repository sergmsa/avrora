<?php

namespace User\PostBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints\Email;



class DefaultController extends Controller
{
    
private $err_mail; 


    public function indexAction($activ_mail)
    {
          $User = $this->get('userinfo.service');
          $user_info = $User->getUserInfo($activ_mail);
         // echo '<pre>'; print_r ( $user_info ); die;
          return $this->render('UserPostBundle:Default:index.html.twig', array('USER_INFO' => $user_info  ));
   
     }
     
     public function createdirAction($activ_mail)
    {
          $User = $this->get('userinfo.service');
          $user_info = $User->getUserInfo($activ_mail);
          //echo '<pre>'; print_r ( $user_info ); die;
          return $this->render('UserPostBundle:Default:createdir.html.twig', array('USER_INFO' => $user_info ));
   
     } 
     
         
}
