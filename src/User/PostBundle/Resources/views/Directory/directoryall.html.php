<ul class="nav nav-pills nav-justified">
  <li class="active"><a href="#tab_a" data-toggle="tab">Все файлы <span class="badge"><?php echo $COUNT_FILE_ALL;?></span></a></li>
  <li><a href="#tab_b" data-toggle="tab">Мои файлы <span class="badge"><?php echo $COUNT_FILE_USER;?></span></a></li>
  <li><a href="#tab_c" data-toggle="tab">Общие файлы <span class="badge"><?php echo $COUNT_FILE_COMMON;?></span></a></li>
</ul>


<div class="tab-content">    
    
<div class="tab-pane active mail_table" id="tab_a">	
	
<div class="row">    
     


<?

$d = new DirAll;
$d -> recursiv ( $USER_DIR_ARRAY_ALL, $USER_DIR );

 ?>
 
 </div><!-- end row/file_holder -->
			
 </div><!-- end tab_a -->
 
 <?php

class DirAll {
//echo "<pre>";print_r ( $USER_DIR_ARRAY);echo "</pre>"; die;


public function recursiv ( $arr, $path ){  
   
    
    foreach ( $arr as $key => $value ) {
       // echo $key;
   
       if ( is_array ( $value )) { 
           
            if ( $key == $path ) { 
         // $name_dir = $name;
          $path1 = $path;
          
     } else {
        //  $name_dir = $key;
          $path1 = $path.'/'.$key;
     }
       
        //   echo '<li path="'.$path1.'">'.$name_dir.'<ul>';  
          // echo $path1;
                 $this->recursiv ( $value, $path1 );
                 
          // echo '</li></ul>'    ;
          }
        else {
        //  $ext_file = explode (".", $value );
          $ext_img = substr($value, strrpos($value, '.') + 1);
          echo '<div class="col-sm-4 col-md-2" style="margin: 10px;" >';
          echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">';
          echo '<img src="http://localhost/Symfony/web/img/icon_files/'.$this->getExtFile ( $value ).'" alt="'.$path.'/'.$value.'">';
          echo '</a>';
          echo '<div>'.$value.'</div>';
          echo '<ul class="dropdown-menu">';
          echo '<li> <a class="file_row" title="'.$value.'" path="'.$path.'" href="#">Отправить'.$ext_img.'</a></li>';
          echo '<li class="divider"></li>';
          echo '<li><a href="#deleteFile"  data-toggle="modal" title="'.$value.'" path="'.$path.'">Удалить</a></li>';
          echo '</ul></div>';

         // echo '<li class="file_row" path="'.$path.'" title="'.$value.'">'.$value.'</li>';
            
        }
        
    }
 }

public function getExtFile ( $value ) {
     $arr_ext = array ('doc'=>'doc.png', 'md'=>'md.png', 'yml'=>'yml.png');
    $ext_img = strtolower ( substr($value, strrpos($value, '.') + 1) );
    if ( array_key_exists ($ext_img, $arr_ext) ) return $arr_ext[$ext_img];
    
}
}
?>