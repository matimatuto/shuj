jQuery('#go').on('click',function() {
    jQuery.ajax({
       url:'validaUsuario.php',
       type:'POST',
       data: jQuery('#pwd-container form').serialize()
    }).then(function(response) { 
       console.log(response);
    });
});


