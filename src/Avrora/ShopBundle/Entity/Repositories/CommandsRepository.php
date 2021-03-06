<?php

namespace Avrora\ShopBundle\Entity\Repositories;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\DoctrineExtention;

/**
 * HistoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CommandsRepository extends EntityRepository{
  public $statusdescr;
  public $type_cmd;
  
  public function findOne($conn,$uniq_index){
    $statement = $conn->prepare('
      SELECT * FROM   `commands` 
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
    $statement = $conn->prepare('
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
  
  
  public function downloadcntCommands($conn,$attraction_id){
    $statement = $conn->prepare('
    SELECT count(*) cnt FROM commands where attraction_id=:attraction_id and type_cmd=1
    ');
    $statement->bindValue('attraction_id',$attraction_id);
    $statement->execute();   
      
    $result=$statement->fetchAll();
    if(count($result)>0){
      return $result[0]['cnt'];
    }else{
      return 0;
    }
  }
  
  public function stop($conn,$downloadid){
    // получаем инфу о текущем запуске
    $statement = $conn->prepare('
      SELECT * FROM   `commands` 
      WHERE id= :uniq_index
        and type_cmd=2
    ');
    $statement->bindValue('uniq_index',$downloadid);
    $statement->execute();   
    
    $result=$statement->fetchAll();
    
    if($result[0]){
      // проставляем поля
      $statement = $conn->prepare('
        update `commands` 
        set status=2
          , progress=100
          , endexec=current_timestamp()
        WHERE id= :uniq_index
          and type_cmd=2
      ');
      $statement->bindValue('uniq_index',$downloadid);
      $statement->execute();
      //перемещаем в хистори
      $statement = $conn->prepare('
        insert into history_commands select null,attraction_id,client_id,game_id,type_cmd,add_cmd,startexec,endexec,progress,status FROM commands where id=:uniq_index
      ');
      $statement->bindValue('uniq_index',$downloadid);
      $statement->execute();
      // удаляем из commands
      $statement = $conn->prepare('
        delete from commands where id=:uniq_index
      ');
      $statement->bindValue('uniq_index',$downloadid);
      $statement->execute();
    }else{
      // Если записи нет то успех
      return 1;
    }
  }
  
  public function progressrun($conn,$downloadid){
    // Контроллируем процесс запуска
    $statement = $conn->prepare('
      SELECT * FROM   `commands` 
      WHERE id= :uniq_index
        and type_cmd=2
    ');
    $statement->bindValue('uniq_index',$downloadid);
    $statement->execute();   
    
    $result=$statement->fetchAll();
    
    
    if($result[0]){
      if($result[0]['status']==0){
        return $result[0]['status'];
      }elseif($result[0]['status']==1){
        return $result[0]['status'];
      }elseif($result[0]['status']==2){
        // проставляем поля
        $statement = $conn->prepare('
          update `commands` 
          set status=2
            , progress=100
            , endexec=current_timestamp()
          WHERE id= :uniq_index
            and type_cmd=2
        ');
        $statement->bindValue('uniq_index',$downloadid);
        $statement->execute();
        
        $statement = $conn->prepare('
          insert into history_commands select null,attraction_id,client_id,game_id,type_cmd,add_cmd,startexec,endexec,progress,status FROM commands where id=:uniq_index
        ');
        $statement->bindValue('uniq_index',$downloadid);
        $statement->execute();
        // удаляем из commands
        $statement = $conn->prepare('
          delete from commands where id=:uniq_index
        ');
        $statement->bindValue('uniq_index',$downloadid);
        $statement->execute();
        
        return $result[0]['status'];
      }elseif($result[0]['status']==3){
        // ошибка
        
      }
    }else{
      //если запись ненайдена
      return 2;
    }
    
    
  }
  
  public function progressdownload($conn,$downloadid){
    // Контроллируем процесс загрузки
    $statement = $conn->prepare('
      SELECT * FROM   `commands` 
      WHERE id= :uniq_index
    ');
    $statement->bindValue('uniq_index',$downloadid);
    $statement->execute();   
    
    $result=$statement->fetchAll();
    
    if($result[0]){
      if($result[0]['progress']==100){
        // переносим запись в history_commands
        $statement = $conn->prepare('
          insert into history_commands select null,attraction_id,client_id,game_id,type_cmd,add_cmd,startexec,endexec,progress,status FROM commands where id=:uniq_index
        ');
        $statement->bindValue('uniq_index',$downloadid);
        $statement->execute();
        
        // пишем в историю установок
        $statement = $conn->prepare('
          insert into games_install select null,attraction_id,client_id,game_id,null FROM commands where id=:uniq_index and type_cmd=1
        ');
        $statement->bindValue('uniq_index',$downloadid);
        $statement->execute();
        
        
        // удаляем из commands
        $statement = $conn->prepare('
          delete from commands where id=:uniq_index
        ');
        $statement->bindValue('uniq_index',$downloadid);
        $statement->execute();
        
      }
    }else{
      //Если запись не найдена то она перенесена в хистори и значит надо отобр азить 100% 
      return 100;
    }
    return $result[0]['progress'];
  }
  
  
  
  public function runcntCommands($conn,$attraction_id){
    $statement = $conn->prepare('
    SELECT count(*) cnt FROM commands where attraction_id=:attraction_id and type_cmd=2
    ');
    $statement->bindValue('attraction_id',$attraction_id);
    $statement->execute();   
      
    $result=$statement->fetchAll();
    if(count($result)>0){
      return $result[0]['cnt'];
    }else{
      return 0;
    }
  }
  
}

