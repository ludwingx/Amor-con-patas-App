function userlist(opcion){
    var type = "GET";
    var formData = {
        'opcion': opcion
    };

    var ruta = 'ruserlist';
    $.ajax({
        type: type,
        url: ruta,
        data: formData,
        dataType: 'JSON',
        success: function (data) {
            var ldato = data[0];
            if(ldato.mensaje=='sinusuario'){
                window.location.href=window.location.origin+'/login';
            }else{ 
                if (opcion == 'principal') {

                    $('#vlistusers').empty().append($(data));
                    
                }
                else{
                    $('#paneldetalle').empty().append($(data));
                }
            }
        },
        error: function (data) {
            console.log(data);
        }
    })

}

function userlista(opcion){
    var type = "GET";
    var formData = {
        'opcion': opcion
    };

    var ruta = 'ruserlista';
    $.ajax({
        type: type,
        url: ruta,
        data: formData,
        dataType: 'JSON',
        success: function (data) {
            var ldato = data[0];
            if(ldato.mensaje=='sinusuario'){
                window.location.href=window.location.origin+'/login';
            } else { 
                if (opcion == 'principal') {
                    console.log(data);
                    $('#vlistusers').empty().append($(data));
                }
                else {
                    $('#paneldetalle').empty().append($(data));
                }
            }
        },
        error: function (data) {
            console.log(data);
        }
    })
}

function listadeUsuario(opcion)
{
    var type = "GET"; 
    var formData = {'opcion':opcion }; 

    var ruta='lUsuarios';
    $('#loadingESPERE').show();
    
    $.ajax({
        type: type,
        url: ruta,
        data:formData,
        dataType: "JSON", 
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
                    $('#loadingESPERE').hide();
                }                 
                else{
                    $('#paneldetalle').empty().append($(data)); 
                }
            }
          
        },
        error:function(data)
        { 
           console.log(data);
        }
        
    });
}