<?php

namespace Admin\AdmBundle\Entity\Repositories;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\DoctrineExtention;

/**
 * HistoryCommandsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class HistoryCommandsRepository extends EntityRepository{
  public $statusdescr;
  public $type_cmd;
  
  public function findOne($conn,$uniq_index){
    $statement = $conn->prepare('
      SELECT * FROM   `history_commands` 
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
    $this->statusdescr=array(
      0=>"Ожидает исполнения",
      1=>"Выполняется",
      2=>"Выполнен",
      3=>"Ошибка",
    );
    $this->type_cmd=array(
      0=>"",
      1=>"Скачивание",
      2=>"Запуск",
      
    );
    
    $statement = $conn->prepare('
			SELECT a.id
           , a.attraction_id
           , a.client_id
           , a.game_id
           , a.type_cmd
           , a.add_cmd
           , a.startexec
           , a.endexec
           , a.progress
           , a.status
           , a.attraction_id
           , b.gpsn
           , b.gpse
           , b.dateinstall
           , c.company
           , c.fname
           , c.sname
           , c.pname
           , c.birthday
           , c.email
           , c.phone
           , d.developer_id
           , d.name game
           , d.ver
           , d.dateadd
        FROM history_commands a
  INNER JOIN attractions b
          ON a.attraction_id=b.id
  INNER JOIN clients c
          ON a.client_id=c.id
  INNER JOIN games d
          ON a.game_id=d.id
    ORDER BY a.id DESC
    ');
    $statement->execute();   
      
    $result=$statement->fetchAll();
  
    if(count($result)==0){
      return array();
    }      
    
    foreach($result as $k=>$v){
      $result[$k]['status']=$this->statusdescr[$v['status']];
    }
    foreach($result as $k=>$v){
      $result[$k]['type_cmd']=$this->type_cmd[$v['type_cmd']];
    }
    
    return $result;
  }
  

}

