<?php
namespace User\PostBundle\Validators;

use Symfony\Component\Validator\Constraints\Email;

class myValidMail{    
private $err;   
public function __construct ($mail, $mail_error ) {
     $emailConstraint = new Email();
     $emailConstraint->message = $mail_error;
     $errorList = $this->get('validator')->validateValue( $mail, $emailConstraint );
     if (count($errorList) == 0) {
          return true;
          } else {
              die("-------------------------");
          $this->err=$errorList[0]->getMessage();     
        return false;
 
          }
}

public function getErr() {
      return $this->err;
}
}