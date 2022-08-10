@livewireScripts
<script src="{{ asset('MemberArea/bundles/libscripts.bundle.js') }}"></script>
<!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
<script src="{{ asset('MemberArea/bundles/vendorscripts.bundle.js') }}"></script>
<!-- slimscroll, waves Scripts Plugin Js -->
<script defer src="{{ asset('MemberArea/js/pages/widgets/infobox/infobox-1.js') }}"></script>
<script src="{{ asset('MemberArea/bundles/mainscripts.bundle.js') }}"></script><!-- Morris Plugin Js -->

<script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script defer src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script defer src="{{ asset('js/memberApp.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js"
    integrity="sha512-RCgrAvvoLpP7KVgTkTctrUdv7C6t7Un3p1iaoPr1++3pybCyCsCZZN7QEHMZTcJTmcJ7jzexTO+eFpHk4OCFAg=="
    crossorigin="anonymous"></script>
@stack('cdnJs')
<script>
    $(document).ready(function () {
        footerSocialCard();
        footerContactCard();

        @foreach(['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-'.$msg))
        var msg = '@php echo Session("alert-".$msg); @endphp';
        @if($msg == 'success')
        setTimeout(() => {
            alertSuccess(msg);
        }, 500);
        @endif
        @if($msg == 'danger')
        setTimeout(() => {
            alertDanger(msg);
        }, 500);
        @endif
        @if($msg == 'info')
        setTimeout(() => {
            alertInfo(msg);
        }, 500);
        @endif
        @if($msg == 'warning')
        setTimeout(() => {
            alertWarning(msg);
        }, 500);
        @endif
        @endif
        @endforeach
    });

    $('.go-bottom').on('click', function () {
        $("html, body").animate({
            scrollTop: "800"
        }, 500);
    });

    function alertDanger(msg) {
        $.toast({
            heading: 'Oops',
            text: msg,
            icon: 'error',
            loader: true,
            loaderBg: '#fff',
            showHideTransition: 'slide',
            hideAfter: 6000,
            position: 'top-right',
        })
    }

    function alertSuccess(msg) {
        $.toast({
            heading: 'Success',
            text: msg,
            icon: 'success',
            loader: true,
            loaderBg: '#fff',
            showHideTransition: 'slide',
            hideAfter: 6000,
            allowToastClose: false,
            position: 'bottom-center',
        })
    }

    function alertWarning(msg) {
        $.toast({
            heading: 'Warning',
            text: msg,
            icon: 'warning',
            loader: true,
            loaderBg: '#fff',
            showHideTransition: 'slide',
            hideAfter: 6000,
            allowToastClose: false,
            position: 'bottom-right',
        })
    }

    function alertInfo(msg) {
        $.toast({
            heading: 'Attention',
            text: msg,
            icon: 'info',
            loader: true,
            loaderBg: '#fff',
            showHideTransition: 'slide',
            hideAfter: 6000,
            allowToastClose: false,
            position: 'bottom-right',
        })
    }

    function delconf(url, title = "Do You Want To Remove This!") {
        $.confirm({
            title: 'Are You Sure,',
            content: title,
            autoClose: 'cancel|8000',
            type: 'red',
            confirmButton: "Yes",
            cancelButton: "Cancel",
            theme: 'material',
            backgroundDismiss: false,
            backgroundDismissAnimation: 'glow',
            buttons: {
                'Yes, Delete IT': function () {
                    window.location.href = url;
                    confirmButton: "Yes";
                    cancelButton: "Cancel";
                },
                cancel: function () {

                },

            }
        });
    }

    function approveStatus(url, title = "Do You Want To Approve It") {
        $.confirm({
            title: 'Are you sure,',
            content: title,
            autoClose: 'No|8000',
            type: 'green',
            theme: 'material',
            backgroundDismiss: false,
            backgroundDismissAnimation: 'glow',
            buttons: {
                'Yes ': function () {
                    window.location.href = url;
                    confirmButton: "Yes";
                    cancelButton: "No";
                },
                No: function () {

                },

            }
        });
    }

    function removeStatus(url, title = "Do You Want To remove It") {
        $.confirm({
            title: 'Are you sure,',
            content: title,
            autoClose: 'No|8000',
            type: 'red',
            theme: 'material',
            backgroundDismiss: false,
            backgroundDismissAnimation: 'glow',
            buttons: {
                'Yes ': function () {
                    window.location.href = url;
                    confirmButton: "Yes";
                    cancelButton: "No";
                },
                No: function () {

                },

            }
        });
    }

    function showHidePwd(icon_id, input_id) {
        let element = $("#" + icon_id);

        if (element.hasClass('fa fa-eye')) {
            $("#" + icon_id).removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        } else {
            $("#" + icon_id).removeClass('fa fa-eye-slash').addClass('fa fa-eye icon');
        }

        if ($("#" + input_id).attr("type") == "password") {
            $("#" + input_id).attr("type", "text");
        } else {
            $("#" + input_id).attr("type", "password");
        }
    }

    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }



</script>
@stack('js')
@yield('js')
