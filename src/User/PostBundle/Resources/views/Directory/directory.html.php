<h3>Мои файлы</h3>
<a href="javascript:ddtreemenu.flatten('treemenu1', 'expand')">Развернуть все</a> | <a href="javascript:ddtreemenu.flatten('treemenu1', 'contact')">Свернуть все</a>
<ul id="treemenu1" class="treeview">
<?php

class Dir {
//echo "<pre>";print_r ( $USER_DIR_ARRAY);echo "</pre>"; die;


public function recursiv ( $arr, $path, $name ){  
   
    
    foreach ( $arr as $key => $value ) {
       // echo $key;
   
       if ( is_array ( $value )) { 
           
            if ( $key == $path ) { 
          $name_dir = $name;
          $path1 = $path;
          
     } else {
          $name_dir = $key;
          $path1 = $path.'/'.$key;
     }
       
           echo '<li path="'.$path1.'">'.$name_dir.'<ul>';  
          // echo $path1;
                 $this->recursiv ( $value, $path1, $name );
                 
           echo '</li></ul>'    ;
          }
        else {
          echo '<li class="file_row" path="'.$path.'" title="'.$value.'">'.$value.'</li>';
            
        }
        
    }
 }
}
$d = new Dir;
$d -> recursiv ( $USER_DIR_ARRAY, $USER_DIR, "Иванов Денис" );
?>
</ul>
<a href="javascript:ddtreemenu.flatten('treemenu2', 'expand')">Развернуть все</a> | <a href="javascript:ddtreemenu.flatten('treemenu2', 'contact')">Свернуть все</a>
<ul id="treemenu2" class="treeview">
    
    
<?php
//echo "<pre>";print_r ( $COMMON_DIR_ARRAY );echo "</pre>"; die;
$d -> recursiv ( $COMMON_DIR_ARRAY, 'Common', "Общая папка" );
?>
</ul>
