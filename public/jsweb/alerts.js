function showNotification(title, text) {
    // Configurar el modal de notificación
    $('#notificationModal').find('#notificationTitle').text(title);
    $('#notificationModal').find('#notificationText').text(text);
    $('#notificationModal').find('.modal-content').removeClass('bg-success bg-danger').addClass(title === 'Éxito' ? 'bg-success' : 'bg-danger');

    // Mostrar el modal de notificación
    $('#notificationModal').modal('show');

    // Ocultar automáticamente después de 3 segundos (ajustable según necesidades)
    setTimeout(function() {
        $('#notificationModal').modal('hide');
    }, 3000);
}