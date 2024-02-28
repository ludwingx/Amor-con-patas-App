function validarcampos(){

    var email=document.getElementById('email').value;
    var password=document.getElementById('password').value;
    mensaje='';
    otromensaje='';

    if (email==''){ 
        mensaje='Este valor no puede estar Vacio'+' <br> ';
       
    }

    if (email.length<=3){ 
        mensaje=mensaje+'Se necesita al menos 4 caracteres';
       
    }

    if (mensaje==''){

    }else{
        document.getElementById('msUSA').innerHTML=mensaje;
    }


    if (password==''){ 
        otromensaje='Campo requerido';
    }else{
       
    }
    if (otromensaje==''){}
    else
    {
        document.getElementById('msCLAVE').innerHTML=otromensaje;

    }

    if (( mensaje=='' )&& (otromensaje=='') ){

        validarLogin(email,password);

    }
    

}

function validarLogin(email,password){

    var type = 'POST';
    var formdata={'email':email,'password':password};
    var ruta='validarlogin';

    $.ajax({
        type:type,
        url:ruta,
        data:formdata,
        dataType:"JSON",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(data){

               if (data.mensaje === "exito") {
                // Verifica el rol del usuario y redirige en consecuencia
                if (data.rol === "admin") {
                    window.location.href = window.location.origin + '/principal';
                } else if (data.rol === "user") {
                    window.location.href = window.location.origin + '/home';
                } else {
                    // Rol desconocido o manejar según sea necesario
                }
                }

        },
        error:function(data){

            console.log(data);
            
        }
    });

 
}


function resetCampos(ncampo){

    console.log('entra');

    if (ncampo=='msUSA')
    document.getElementById('msUSA').innerHTML='';

    if (ncampo=='msCLAVE')
    document.getElementById('msCLAVE').innerHTML='';


}

function cerrarSesion() {
    $.ajax({
        type: 'GET',
        url: 'logout',
        dataType: 'html',
        success: function (data) {
            console.log(data);
            location.reload();
            window.location.href = '/';
            
        },
        error: function (data) {
            console.log(data);
        }
    });
}

function createUser(){
    var type = "POST";
    name=document.getElementById('name').value;
    password=document.getElementById('password').value;
    email=document.getElementById('email').value;
    var formData = {
        'name':name, 'email':email, 'password':password
    }
    var ruta= 'newUser';

    $.ajax({
        type: type,
        url: ruta,
        data: formData,
        dataType: 'JSON',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            console.log(data); 

            if(data.mensaje=="exito"){
                
                window.location.href=window.location.origin+'/principal';
                alert('USUARIO CREADO CORRECTAMENTE');
            }
        },
        error: function (data) {
            console.log(data);
            alert('ERROR DE CONEXION O DATOS INCORRECTOS');
        }
    })
}