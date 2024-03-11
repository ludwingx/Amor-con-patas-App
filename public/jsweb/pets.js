function savePet() {
    var type = 'POST';
    var nombrep = document.getElementById('nombrep').value;
    var specie = document.getElementById('specie').value;

    var formData = { 'nombrep': nombrep };

    var ruta = 'savepet';

    $.ajax({
        type: type,
        url: ruta,
        data: formData,
        dataType: 'JSON',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        sucess: function (data) {
            if (data.mensaje == "exito") {
                listPets('principal');

            } if (data.mensaje == "sinusuario") {
                window.location.href = window.location.origin + '/login';
            }
        },
        error: function (data) {
            console.log(data);
        }
    })
}
function jsShowAdoptionList(opcion) {
    var type = "GET";
    var formData = {'opcion':opcion }; 
    var ruta = 'rShowAdoptionList';
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
            else {
                //console.log(data);
                if (opcion == 'adopciones') {
                    $('#pprincipal').empty().append($(data));

                }
                else {
                    $('#paneldetalle').empty().append($(data));
                }
            }

        },
        error: function (data) {
            console.log(data);
        }

    });
}

function jsProfilePet(id) {
    var type = "GET";
    var formData = { 'id': id };
    var ruta = 'profile-pet';

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

