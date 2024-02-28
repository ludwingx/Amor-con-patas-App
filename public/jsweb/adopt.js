function adoptionForm(id) {
    var type = 'GET';
    var formdata={'id':id};
    var ruta = 'adoptionForm';

    $.ajax({
        type: type,
        url: ruta,
        data: formdata,
        dataType: 'JSON',
        headers: {
            
        }
    })
    window.location.href = window.location.origin + '/adoption/' + id;


}
function adopt() {
    var type = 'POST';
    idPet=document.getElementById('idPet').value;
    idUser=document.getElementById('idUser').value;

    name=document.getElementById('name').value;
    lastname=document.getElementById('lastname').value;
    ci=document.getElementById('ci').value;
    age=document.getElementById('age').value;
    email=document.getElementById('email').value;
    phone=document.getElementById('phone').value;
    city=document.getElementById('city').value;
    address=document.getElementById('address').value;

    var formData = {
        'idPet': idPet,
        'idUser': idUser,
        'name': name,
        'lastname': lastname,
        'ci': ci,
        'age': age,
        'email': email,
        'phone': phone,
        'city': city,
        'address': address
    };

    var ruta = 'saveAdopt';

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
                
                window.location.href='/adoptions';
                alert('USUARIO CREADO CORRECTAMENTE');
            }
        },
        error: function (data) {
            console.log(data);
        }
    });
}

// Resto de tu código...

// Asigna la función adopt al hacer clic en el botón
$(document).ready(function () {
    $('#adoptButton').click(function () {
        adopt();
    });
});

