<?php

namespace User\PostBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DirectoryController extends Controller
{
    
    
 private $r = '';
 private $r1= '';
 private $user_info = array();
 private $all = '';
 private $count_file_all ='';
 private $count_file_user ='';
 private $count_file_common ='';




 public function getDirectoryTreeAction( $user_id )
{
   $User = $this->get('userinfo.service');
   $user_info = $User->getUserInfo($activ_mail = '');
   $this -> dirArrayUser ($user_id);
   $this -> dirArrayCommom ();
  // $this -> all = array_merge ($this->r, $this->r1 );
  // $this -> count_file_all = $this -> countFile ( $this->all );
   return $this->render('UserPostBundle:Directory:directory.html.php', array('USER_DIR_ARRAY' => $this->r, 
                                                                             'FIO' => $user_info["FIO"],
                                                                             'USER_DIR' => $user_info["USER_DIR"],
                                                                             'COMMON_DIR_ARRAY' => $this->r1,
           ));
}

public function getDirectoryAllAction ($user_id){    
   $User = $this->get('userinfo.service');
   $user_info = $User->getUserInfo($activ_mail = '');
   $this -> dirArrayUser ($user_id);
   $this -> dirArrayCommom ();
   $this -> count_file_user = $this -> countFile ( $this->r );
   $this -> count_file_common = $this -> countFile ( $this->r1 );
   $this->all = array_merge ($this->r, $this->r1 );
   $this -> count_file_all = $this -> countFile ( $this->all );
   //print_r ( $this -> count_file_all ); die;
   return $this->render('UserPostBundle:Directory:directoryall.html.php', array('USER_DIR_ARRAY_ALL' => $this->all, 
                                                                             'FIO' => $user_info["FIO"],
                                                                             'USER_DIR' => $user_info["USER_DIR"],
                                                                             'COUNT_FILE_ALL' => $this -> count_file_all,
                                                                             'COUNT_FILE_USER' => $this -> count_file_user,
                                                                             'COUNT_FILE_COMMON' => $this -> count_file_common,

             ));
    
}


public function getDirectoryUserAction ($user_id){
    $User = $this->get('userinfo.service');
   $user_info = $User->getUserInfo($activ_mail = '');
   $this -> dirArrayUser ($user_id);
   $this -> count_file_user = $this -> countFile ( $this->r );
   //print_r ( $this -> count_file_all ); die;
   return $this->render('UserPostBundle:Directory:directoryuser.html.php', array('USER_DIR_ARRAY_USER' => $this->r, 
                                                                             'FIO' => $user_info["FIO"],
                                                                             'USER_DIR' => $user_info["USER_DIR"],
                                                                            // 'COUNT_FILE_USER' => $this -> count_file_user,
              ));
    
}


public function getDirectoryCommonAction ($user_id){
   $User = $this->get('userinfo.service');
   $user_info = $User->getUserInfo($activ_mail = '');
   $this -> dirArrayUser ($user_id);
   $this -> dirArrayCommom ();
   $this -> count_file_common = $this -> countFile ( $this->r1 );
   return $this->render('UserPostBundle:Directory:directorycommon.html.php', array('USER_DIR_ARRAY_COMMOM' => $this->r1, 
                                                                             'FIO' => $user_info["FIO"],
                                                                             'USER_DIR' => $user_info["USER_DIR"],
                                                                          //   'COUNT_FILE_COMMON' => $this -> count_file_common,
              ));
    
}

private function dirArrayUser ($user_id){
    
  if ( $user_id != 'noname' ) {///если пользователь определен Но пока подставляем значение из рег данных
      
          $User = $this->get('userinfo.service');
          $user_info = $User->getUserInfo($activ_mail = '');
          
    if (file_exists( $user_info['USER_DIR_ABSOLUTE'])) {//Проверка на существование пользовательской директории
        
        /* Выбираем все файлы рекурсивно
         * 
         */
          $ritit = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator( $user_info['USER_DIR_ABSOLUTE'] ), \RecursiveIteratorIterator::CHILD_FIRST);
          $this->r[$user_info["USER_DIR"]] = array();
          foreach ($ritit as $splFileInfo) {
             $path = $splFileInfo->isDir()
                   ? array($splFileInfo->getFilename() => array())
                   : array($splFileInfo->getFilename());
             for ($depth = $ritit->getDepth() - 1; $depth >= 0; $depth--) {
                 $path = array($ritit->getSubIterator($depth)->current()->getFilename() => $path);
             }
             if ($splFileInfo->getFilename() !='.' AND $splFileInfo->getFilename() !='..' ){
               $this -> r[$user_info["USER_DIR"]] = array_merge_recursive($this-> r[$user_info["USER_DIR"]], $path);
             }
          }
          /*
           * 
           */
          
  } else {//если директории нет
    $this->r = array('name'=>$user_info["FIO"]." No DIR" );
    $user_info["USER_DIR"] = 'No DIR'; 
  }
  } else {//Если не определен
    $this->r = array();
    $user_info["USER_DIR"] = '';
  }
//echo "<pre>"; print_r($r); echo "</pre>";

//echo '<pre>';print_r ( $r ); die;
/* Вывод объединеной директории
$t["Common"] = $r_common;
$common = array_merge_recursive($r, $t);
echo "<pre>"; print_r($common); echo "</pre>";
die;
*/

    
}

private function dirArrayCommom ( ){
    
$dir =  $_SERVER["DOCUMENT_ROOT"].'/Symfony/document/common/' ;
$ritit = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator( $dir ), \RecursiveIteratorIterator::CHILD_FIRST);
$this->r1['Common'] = array();
foreach ($ritit as $splFileInfo) {
   $path = $splFileInfo->isDir()
         ? array($splFileInfo->getFilename() => array())
         : array($splFileInfo->getFilename());
   for ($depth = $ritit->getDepth() - 1; $depth >= 0; $depth--) {
       $path = array($ritit->getSubIterator($depth)->current()->getFilename() => $path);
   }
   if ($splFileInfo->getFilename() !='.' AND $splFileInfo->getFilename() !='..' ){
     $this->r1['Common'] = array_merge_recursive($this->r1['Common'], $path);
   }
} 
    
    
}

private function countFile ( $array ){
    $c = 0;
    $array_iterator = new \RecursiveIteratorIterator(  new \RecursiveArrayIterator( $array ));
        foreach($array_iterator as $key=>$value){
           $c++;
        }
    return $c;
}

}