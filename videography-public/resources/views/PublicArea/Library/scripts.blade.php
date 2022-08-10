<script src="{{ asset('assets/js/theme.core.min.js') }}"></script>
<script src="{{ asset('assets/js/theme.min.js') }}"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

 <script>
     $(document).ready(function () {
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

     /**
      * Set Local Storage Item
      * @param string $name
      * @param string $value
      */
     function setLSt(name, value) {
         localStorage.setItem(name, value);
     }
     /**
      * Get Local Storage Item
      * @param string $name
      */
     function getLSt(name) {
         return localStorage.getItem(name);
     }
     /**
      * remove Local Storage Item
      *@param string $name
      *
      */
     function removeLSt(name) {
         localStorage.removeItem(name);
     }

 </script>
 @stack('js')
 @stack('scripts')
