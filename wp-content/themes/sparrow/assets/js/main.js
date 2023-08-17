jQuery(document).ready(function ($){
    var form = $('#contactForm');
    var action = form.attr('action');

    form.on('submit',function(e){

        var formData = {
            contactName: $('#contactName').val(),
            contactEmail: $('#contactEmail').val(),
            contactSubject: $('#contactSubject').val(),
            contactMessage: $('#contactMessage').val()
        }
        $.ajax({
            url: action,
            type: 'POST',
            data: formData,
            error: function (request, txtstatus, errorThrow){
                console.log(request);
                console.log(txtstatus);
                console.log(errorThrow)
            },
            success: function (){
                form.html('success');
            },
        })
        e.preventDefault();
    });
});