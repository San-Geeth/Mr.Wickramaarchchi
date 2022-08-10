<script>
    $(document).ready(function () {
        $('.curr_password').on('keyup', function () {
            $.ajax({
                url: "{{ route('privacy.checkPassword') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                data: {
                    password: $(this).val()
                },
                success: function (response) {
                    if (response == 'true') {
                        $('#curr_pass_msg').addClass('text-success').removeClass(
                            'text-danger').html('Password is' +
                            ' correct');

                        $('#new_pass_section').removeClass('d-none');
                    } else {
                        $('#curr_pass_msg').addClass('text-danger').removeClass(
                            'text-success').html('Password is' +
                            ' incorrect');
                        $('#new_pass_section').addClass('d-none');
                    }
                }
            });
        })

    });

    $('#password_confirmation').keyup(function (e) {
        if ($(this).val() != $('#password').val()) {
            $('#pass_confirmation').html('Password confirmation not matching with new password');
            $('#pass_confirmation').css({
                color: 'red'
            });
            $('input[type=submit]').attr('disabled', 'disabled');
        } else {
            $('#pass_confirmation').html('ok');
            $('#pass_confirmation').css({
                color: 'green'
            });
            $('input[type=submit]').removeAttr('disabled');
        }
    });

    password = $('#inp_password');
    password2 = $('#password-verify');
    password.focus(function () {
        $('.pswd_info').fadeIn('low');
    });
    password.blur(function () {
        $('.pswd_info').fadeOut('low');
    });
    var conf_rule_validator = function () {
        if ((password.val() != "") && (password.val() == password2.val())) {
            $('#password-verify').addClass("is-valid").removeClass("is-invalid");
            $('#conf_pass_msg').addClass('text-success').removeClass('text-danger').html(
                'The password and confirmation' +
                ' password match');
            $('#sumbit-btn').removeAttr('disabled');
        } else if (((password.val() != "") && (password.val() != password2.val()))) {
            $('#password-verify').addClass("is-invalid").removeClass("is-valid");
            $('#conf_pass_msg').addClass('text-danger').removeClass('text-success').html(
                'The password and confirmation' +
                ' password do not match');
            $('#sumbit-btn').attr('disabled', true);

        } else {
            $('#conf_password_msg').html('');

        }
        $('input[type=submit]').attr('disabled', 'disabled');
    };
    password.keyup(conf_rule_validator);
    password2.keyup(conf_rule_validator);




</script>
