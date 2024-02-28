function jsUserList(opcion)
{
    var type = "GET"; 
    var formData = {'opcion':opcion }; 
    var ruta='ruserlist';    
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
                if (opcion=='pprincipal')
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