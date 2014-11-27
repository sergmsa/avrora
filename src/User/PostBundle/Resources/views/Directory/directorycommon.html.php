<div class="tab-pane mail_table" id="tab_c">	
	
<div class="row">    
     


<?

$d = new DirCommon;
$d -> recursiv ( $USER_DIR_ARRAY_COMMOM, $USER_DIR );

 ?>
 
 </div><!-- end row/file_holder -->
			
 </div><!-- end tab_c -->
 
 <?php

class DirCommon {
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

          echo '<div class="col-sm-4 col-md-2" style="margin: 10px;" >';
          echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">';
          echo '<img src="http://localhost/Symfony/web/img/location_file.png" alt="'.$path.'/'.$value.'">';
          echo '</a>';
          echo '<div>'.$value.'</div>';
          echo '<ul class="dropdown-menu">';
          echo '<li> <a class="file_row" title="'.$value.'" path="'.$path.'" href="#">Отправить</a></li>';
          echo '<li class="divider"></li>';
          echo '<li><a href="#deleteFile"  data-toggle="modal" title="'.$value.'" path="'.$path.'">Удалить</a></li>';
          echo '</ul></div>';

         // echo '<li class="file_row" path="'.$path.'" title="'.$value.'">'.$value.'</li>';
            
        }
        
    }
 }
}
?>
