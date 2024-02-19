function savePet(){
    var type='POST';
    var nombrep=document.getElementById('nombrep').value;
    var specie=document.getElementById('specie').value;
    
    var formData={'nombrep':nombrep};

    var ruta = 'savepet';

    $.ajax({
        type: type,
        url: ruta,
        data: formData,
        dataType: 'JSON',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        sucess:function(data){
            if(data.mensaje=="exito"){
                listPets('principal');

            }if(data.mensaje=="sinusuario"){
                window.location.href=window.location.origin+'/login';
            }
        },
        error:function(data){
            console.log(data);
        }
    })
}

$(document).ready(function () {
    // Cargar mascotas al cargar la página
    loadPets();

    function loadPets() {
        $.ajax({
            url: '{{ route("adoptions.pets") }}',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                // Renderizar la vista parcial con las mascotas
                $('pets').html(response.html);
            },
            error: function (error) {
                console.error('Error al cargar las mascotas:', error);
            }
        });
    }
});