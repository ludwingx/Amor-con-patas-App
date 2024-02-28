function jugadoreslist(opcion)
{
    var type = "GET"; 
    var formData = {'opcion':opcion }; 
    var ruta='listarJugadores';
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
                      
                }                 
                else {
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