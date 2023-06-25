jQuery('#go').on('click',function() {
    jQuery.ajax({
       url:'registrarUsuario.php',
       type:'POST',
       data: jQuery('#pwd-container form').serialize()
    }).then(function(response) { 
       console.log(response);
    });
});


