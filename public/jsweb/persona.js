function listadePersonas(opcion)
{
    var type = "GET"; 

    var formData = {'opcion':opcion };
   
    var ruta='ruserlista';
    
    
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
                 //console.log(data);
                if (opcion=='home')
                { 
                    $('#pprincipal').empty().append($(data));  
                    
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