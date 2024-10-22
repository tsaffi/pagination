$(document).ready(function(){
    $('#name').on('change', function(e) {
        e.preventDefault();
        let val = $(this).val();

        if (val) {
            
        }

        if (val === 'existing_source') {
            $('.existing-card').show();
        }

        if (val === 'new_source') {
            $('.new-card').show();
        }
    });

    $('#create-link-participant').on('click', function(e) {
        e.preventDefault();
        var $self = $(this);

        var email = $('input[name=email]');

        $.ajax({
            type: 'POST',
            url: '/api/v1/participant/user',
            data: {
                'event_id' : $('#event_id').val(),
                'email' : email.val()
            },
            success: function(res) {
                $('.email-link-error').remove();
                $('input[name=user_id]').remove();
                email.after('<input type="hidden" name="user_id" value="'+res.id+'" />');
                $self.text('Link a different Account');
            },
            error: function(res) {
                var response = JSON.parse(res.responseText);
                $('.email-link-error').remove();
                $('input[name=user_id]').remove();
                email.after('<div class="email-link-error">'+response.error+'</div>');
                $self.text('Create / Link Account');
            }
        });
    });
});
