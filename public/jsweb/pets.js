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