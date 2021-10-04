$(function(){
    $('.delete-toggle-modal').on('click', function(){
        var value = $(this).data('id');
    
        $('#modal_delete_id').val(value);
        $('#deleteModalCenter').modal('show');
    });
    
    var isPassGood, isPassConfirmed;

    $('#newpass-confirm').on('keyup', function () {
        if ($('#newpass').val() == $('#newpass-confirm').val())
        {
            if($('#newpass-confirm').hasClass('is-invalid'))
            {
                $('#newpass-confirm').removeClass('is-invalid');
            }
            $('#newpass-confirm').addClass('is-valid');

            isPassConfirmed = 1;
        } 
        else
        {
            if($('#newpass-confirm').hasClass('is-valid'))
            {
                $('#newpass-confirm').removeClass('is-valid');
            }
            $('#newpass-confirm').addClass('is-invalid');

            isPassConfirmed = 0;
        }
    });

    function checkStrength(password) {  
        var strength = 0;
        if (password.length < 6) {  
            $('#strengthMessage').removeClass();  
            $('#strengthMessage').addClass('Short');
            if($('#newpass').hasClass('is-valid'))
            {
                $('#newpass').removeClass('is-valid');
            }

            isPassGood = 0;

            return 'Password too short';  
        }  
        if (password.length > 7) strength += 1  
        // If password contains both lower and uppercase characters, increase strength value.  
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1;  
        // If it has numbers and characters, increase strength value.  
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1;  
        // If it has one special character, increase strength value.  
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1;  
        // If it has two special characters, increase strength value.  
        if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1;  
        // Calculated strength value, we can return messages  
        // If value is less than 2  
        if (strength < 2) {  
            $('#strengthMessage').removeClass(); 
            $('#strengthMessage').addClass('Weak');
            if($('#newpass').hasClass('is-valid'))
            {
                $('#newpass').removeClass('is-valid');
            }

            isPassGood = 0;

            return 'Weak password';  
        } else if (strength == 2) {  
            $('#strengthMessage').removeClass();  
            $('#strengthMessage').addClass('Good');
            $('#newpass').addClass('is-valid');

            isPassGood = 1;

            return 'Good password';  
        } else {  
            $('#strengthMessage').removeClass(); 
            $('#strengthMessage').addClass('Strong');
            $('#newpass').addClass('is-valid');

            isPassGood = 1;

            return 'Strong password';  
        }  
    }  
    
    $('#newpass').on('keyup', function() {
        $('#strengthMessage').html(checkStrength($('#newpass').val())) 
    });

    $('#newpass, #newpass-confirm').on('keyup', function() {
        if(isPassGood && isPassConfirmed)
        {
            $('#password-submit').removeAttr('disabled');
        }
        else
        {
            $('#password-submit').attr('disabled', true);
        }
    })

});

