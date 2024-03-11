function ajaxSubirFoto(){
    $edfile = document.getElementById("edfile").value;
    $id=document.getElementById('id').value;


    $archivofile=$('#archivo')[0]; //
    $formularioIMG=$('#formImg');
    if($edfile!=''){
        var formData = new FormData();
        formData.append('file', $archivofile[0].files[0]);

        $.ajax({
            url: $formularioIMG.attr('action')+'?'+$formularioIMG.serialize()+'&id='+$id,
            method:'POST',
            data: formData,
            processData: false,
            contentType: false,
            //dataType: "JSON"
            }).done(function(data){
                if(data.sucess){
                    listadePersonas('principal');
                    
                }
            }).fail(function(data){
                console.log(data);
                formData.delete;
            })




    }else{
        alert('Debe seleccionar una imagen');
    }
}