
function jsListarMascota(opcion)
{   
    var type = "GET"; 
    var formData = {'opcion':opcion };
    var ruta='listarMascotas';
    
    $.ajax({
        type: type,
        url: ruta,
        data:formData,
        dataType: "JSON", 
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data){ 

            var ldato = data[0];
            if (ldato.mensaje=='sinusuario')
            {
                window.location.href=window.location.origin+'/login';
            }
            else
            {
                if (opcion=='principal')
                { 
 
                    $('#pprincipal').empty().append($(data));
                      
                }                 
                else {
                    $('#paneldetalle').empty().append($(data));  
                }
            }
          
        },
        error:function(data)
        { 
            console.log('Error en la solicitud AJAX. Datos recibidos:', data);

        }
        
    });
}

function nuevaMascota(accion){
    var type = 'GET';
    var formData = {'accion' : accion};

    var ruta= 'agregarmascota';

    $.ajax({
        type: type,
        url: ruta,
        data: formData,
        dataType: 'JSON',
        success: function(data){
            var ldato = data[0];
            if(ldato.mensaje=='sinusuario'){
                window.location.href=window.location.origin+'/login';
            }
            else{
                $('#pprincipal').empty().append(data);

            }
        },
        error:function(data){
            console.log(data);
        }
    })
}
function saveMascota(){
    var type = "POST";
    nombre_mt=document.getElementById('nombre_mt').value;
    tipo_mt = document.getElementById('tipo_mt').value;
    raza_mt=document.getElementById('raza_mt').value;
    fcod_pe=document.getElementById('edper').value;
    estado_mt=document.getElementById('estado_mt').value;
    detalle_mt=document.getElementById('detalle_mt').value;
    
    var formData = {
        'nombre_mt': nombre_mt, 'tipo_mt': tipo_mt, 'raza_mt': raza_mt,'fcod_pe':fcod_pe, 'estado_mt': estado_mt, 'detalle_mt': detalle_mt
    }
    console.log(formData);

    var ruta= 'newMascota';

    $.ajax({
        type: type,
        url: ruta,
        data: formData,
        dataType: 'JSON',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {


            if(data.mensaje=="exito"){
                jsListarMascota('principal');
            }
        },
        error: function (data) {

            alert('ERROR DE CONEXION O DATOS INCORRECTOS');
        }
    })
}
function jsEditarMascota( $cod_mt){
    var type = "GET";
    var formData = { 'cod_mt': $cod_mt};
    var ruta = 'rEditarMascota';

    $.ajax({
        type: type,
        url: ruta,
        data: formData,
        dataType: "JSON",
        success: function (data) {
            var ldato = data[0];
            if (ldato.mensaje == 'sinusuario') {
                window.location.href = window.location.origin + '/login';
            }
            else{
                $('#pprincipal').empty().append(data);

            }
        },
        error: function (data) {
            console.log(data);
        }
    })
}
function filtrarMascotas(opcion)
{   
    var type = "GET"; 
    var formData = {'opcion':opcion };
    var ruta='filtrarMascotas';
    
    $.ajax({
        type: type,
        url: ruta,
        data:formData,
        dataType: "JSON", 
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data){ 
            console.log(data);
            var ldato = data[0];
            if (ldato.mensaje=='sinusuario')
            {
                window.location.href=window.location.origin+'/login';
            }
            else
            {
                if (opcion=='principal')
                { 
 
                    $('#pprincipal').empty().append($(data));
                      
                }                 
                else {
                    $('#paneldetalle').empty().append($(data));  
                }
            }
          
        },
        error:function(data)
        { 
            console.log('Error en la solicitud AJAX. Datos recibidos:', data);
           console.log(data);
        }
        
    });
}
