function jugadoreslist(opcion)
{
    var type = "GET"; 
    var formData = {'opcion':opcion }; 

    var ruta='rjugadores';

    
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

                $('#pprincipal').empty().append($(data.listaJugadores)); 

                   
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