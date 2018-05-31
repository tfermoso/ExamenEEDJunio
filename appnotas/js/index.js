$('document').ready(function(){
   

    $('#btnSubmit').click(function(){

    
        if($('#nombre').val()=="" || ($('#password').val()=="")){
            $('#error').html("Error al introducir usuario o contraseña")
        }
    })


  
});