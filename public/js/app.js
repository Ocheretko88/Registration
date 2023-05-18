$(document).ready(function () {
    $('#register-form').on('input', function () {
        $('#error-message').hide();
    });

    $('#registerButton').click(function (e) {
        e.preventDefault();

        let firstName = $('#firstName').val();
        let lastName = $('#lastName').val();
        let email = $('#email').val();
        let password = $('#password').val();
        let confirmPassword = $('#confirmPassword').val();

        // Basic client-side validation
        if (!firstName || !lastName || !email || !password || !confirmPassword) {
            alert('All fields are required');
            return;
        }
        if (email.indexOf('@') === -1) {
            alert('Email must contain @');
            return;
        }
        if (password !== confirmPassword) {
            alert('Passwords do not match');
            return;
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/register',
            method: 'post',
            data: {
                firstName: firstName,
                lastName: lastName,
                email: email,
                password: password,
                confirmPassword: confirmPassword
            },
            success: function (response) {
                if (response.success) {
                    $('#register-form').hide();
                    $('#success-message').show();
                    $('#error-message').hide();
                } else {
                    $('#error-message').text(response.message).show();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
                console.error('Error:', textStatus, ', Details:', errorThrown);
                console.error('Response:', jqXHR.responseText);
                $('#error-message').text(jqXHR.responseJSON.message).show();
            }
        });
    });
});
