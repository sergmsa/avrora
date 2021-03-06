<?php

namespace Admin\AdmBundle\Entity\Repositories;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\DoctrineExtention;

/**
 * ClientsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ClientsRepository extends EntityRepository{
  public function findOne($conn,$uniq_index){
    $statement = $conn->prepare('
      SELECT * FROM   `clients` 
      WHERE id= :uniq_index
    ');
    $statement->bindValue('uniq_index',$uniq_index);
    $statement->execute();   
      
    $all = $statement->fetchAll();
  
    if(count($all)>0){
      return $all;
    }else{
      return array();
    }      
  
  }
  
  public function getAll($conn){
    $statement = $conn->prepare('SELECT * FROM `clients`');
    $statement->execute();   
      
    $all = $statement->fetchAll();
  
    if(count($all)>0){
      return $all;
    }else{
      return array();
    }      
  
  }
  
  
}

