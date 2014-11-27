<?php

namespace User\PostBundle\Models;

use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class RegisterInfo {
    
    private $container;

    public function __construct(Container $container) {
        $this->container = $container;
    }
    
    public function getUserInfo ($activ_mail){
      $user_info = array();
      $user_info["FIO"] = $this->container ->get('security.context')->getToken()->getUser() -> getFullName();
      $mail_error ="err";
       if ( $this->proverka_mail ($activ_mail, $mail_error )  ){
           $user_info["ACTIVE_MAIL"] = $activ_mail;
      } else{
          if ( $this->proverka_mail ($this->container ->get('security.context')->getToken()->getUser() -> getEmail(), $mail_error ) ){
             $user_info["ACTIVE_MAIL"] = $this->container ->get('security.context')->getToken()->getUser()->getEmail();  
              
          }else {
              
               $user_info["ACTIVE_MAIL"] = $this ->getErrMail();
          }
      }
             
       $user_info["MAIN_MAIL"] = $this->container -> get('security.context')->getToken() -> getUser()->getEmail(); 
     // if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
      //  $results = print_r ( $this -> getUser() -> getListmail(), true);
       $u = $this->container ->get('security.context')->getToken() -> getUser() -> getRoles();
       foreach ( $u as $key => $value){
           $user_info["ROLE"][] = $value -> getRole();
       }
    
       
       $user_info["USER_MAIL"] = $this->container ->get('security.context')->getToken() -> getUser() -> getListmail() ;
   
       $user_info["USER_RULE"] = $this->container ->get('security.context')->getToken() -> getUser() -> getListrule();
       
       $user_info["USER_ID"] = $this->container ->get('security.context')->getToken() -> getUser() -> getIDiff();
       
       $user_info["USER_DIR"] = 'user'.$user_info["USER_ID"];
 
       $user_info["USER_DIR_ABSOLUTE"] = $_SERVER["DOCUMENT_ROOT"].'/Symfony/document/users/'.$user_info["USER_DIR"].'/';
       
        //echo "<pre>"; print_r ( $this -> getUser() -> getListmail(), true); echo"</pre>";
         return $user_info;
    //  } else {
     //      throw new AccessDeniedException('BAD ROLE');
    //  }
       
       
  
     
       
     }
     
     private function proverka_mail ($mail, $mail_error ) {
     $emailConstraint = new Email();
     $emailConstraint->message = $mail_error;
     $errorList = $this->container -> get('validator')-> validateValue( $mail, $emailConstraint );
     if (count($errorList) == 0) {
          return true;
          } else {
          $this->err_mail=$errorList[0]->getMessage();     
        return false;
 
          }
}

public function getErrMail() {
      return $this->err_mail;
}
  
    
    
}
