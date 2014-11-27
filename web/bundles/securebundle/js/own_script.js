 $(document).ready(function () {
 

 
 $( '#lefile, #lefileUpload' ).change(function() {
$( '.photoCover' ).val($( '.path_upload' ).val()+'/'+$(this).val());
});
 
 
 $( '.dir' ).on( 'click', function () {
 
 $( '.path_upload' ).val( $(this).attr( 'rel' ) );//получаем путь директории
 $( '.photoCover' ).val($( '.path_upload' ).val()+'/'+$( '#lefile' ).val() );///добавляем имя файла аплоуда
 
 $( '#path_create_dir' ).val( $(this).attr( 'rel' ) );//получаем путь директории
 $( '#createDir' ).val($( '#path_create_dir' ).val()+'/' );//добавляем полный путь
 
 });
 
 
 
  $( '.file_row' ).on( 'click', function () {
  
  $( '#lefile' ).val( '' );
  $( '#sendMail' ).modal('show');      

 $( '.path_upload' ).val( $(this).attr( 'path' )  );
 $( '.photoCover' ).val( $( '.path_upload' ).val() + '/' + $(this).attr( 'title' ) );
 
 
  });
 
/*
 $('.wysihtml5-sandbox').contents().find('body').on("focus",function() {
        console.log("Handler for .keypress() called.");
		alert ( "000" );
    });
	

	var editor_sendMail = new wysihtml5.Editor("some-textarea-send", { // id of textarea element
  toolbar:      "wysihtml5-toolbar-sendMail", // id of toolbar element
  //parserRules:  wysihtml5ParserRules // defined in parser rules set 
});
 
 */
  
$('#some-textarea-send').wysihtml5({
    "events": {
        "load": function() { 
            console.log("Loaded!");
        },
        "blur": function() { 
            console.log( $('#some-textarea-send').val() );
        },
		"focus": function() { 
            console.log( $(this) );
			$(this).html( '000000000000000' );
        }
    }
});
  
	//editor_sendMail.on("change",  loadsendMail ( ) );
/*
 function loadsendMail  (  ) { 
     alert (  editor_sendMail  ) ;
     editor_sendMail.contents().find('body').html( 'jfkdjfkdjfdkfjd' );
 }
  */
  //$('.wysihtml5-sandbox').contents().find('body').html( "0000000000000000" ); 
 // alert (  $('.wysihtml5-sandbox').contents().find('body').html( ) );
 //$('.wysihtml5-sandbox').contents().find('body').on("show:dialog",function() {
   //    $(this).text( "00000000000000" );
  //  });
	

	$('#changeUser').on('shown.bs.modal', function () {
   
  
});

$( '.redactUserButton' ).on( 'click', function () {
var user = $(this).attr( 'role' );

var jsonUser = JSON.parse ( $ ( '#' + user ).html() );

$( '#block_active' ).html( '' );   
$( '#panelRules' ).html( '' );

jQuery.each(jsonUser, function(key, value) {///добавление прав пользователя
                                                                                                  
  if ( key == 'activityUser' ){///Выставляем активность
   
    if ( value.active == 1 ) { checked = 'checked="checked"' ; } else { checked = ""; }  ;               
    teg = '<div class="checkbox"><label><input type="checkbox" value="1" name="active" ' + checked + '>'
			    	+ value.desc + '</label></div>';     
    $( '#block_active' ).append( teg );            
		
 } else if ( key == 'rulesUser' ) {  
         jQuery.each(value, function(keyRules, valueRules) {   
        if (  valueRules.rule == 1 ) { checked = 'checked="checked"' ; } else { checked = ""; } ; 
           teg = '<div class="checkbox" id="'
           + keyRules
           + '"><label><input type="checkbox" value="1" name="'
           + keyRules 
           + '"' + checked + '>'
				   + valueRules.desc
			     + '</label></div>';
           $( '#panelRules' ).append( teg );
          });

	 }  else {   
   
        $( '#' + key ).val( value );
   }
   
 });
 

$('#changeUser').modal('show');


});
	

//$('#example').popover('toggle') ;
//$('#example').popover('hide') ; 
//
//
//
//
//
ddtreemenu.createTree("treemenu1", true);
ddtreemenu.createTree("treemenu2", true);
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 });