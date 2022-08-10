@livewireStyles
@stack('beforeCss')
<link rel="stylesheet" href="{{ asset('MemberArea/assets/plugins/bootstrap/css/bootstrap.min.css') }}">

<!-- Custom Css -->
<link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="{{ asset('MemberArea/css/main.css') }}">
<link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="{{ asset('MemberArea/css/color_skins.css') }}">
<link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="{{ asset('vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
<link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css"
    integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ=="
    crossorigin="anonymous" />
<link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="{{ asset('css/Member.css') }}">

<noscript>
<!-- Custom Css -->
<link rel="stylesheet" href="{{ asset('MemberArea/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('MemberArea/css/color_skins.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css"
    integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ=="
    crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<link rel="stylesheet" href="{{ asset('css/Member.css') }}">
</noscript>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css"
    integrity="sha512-YdYyWQf8AS4WSB0WWdc3FbQ3Ypdm0QCWD2k4hgfqbQbRCJBEgX0iAegkl2S1Evma5ImaVXLBeUkIlP6hQ1eYKQ=="
    crossorigin="anonymous" />
@stack('cdnCss')

<style>
    .select2-container--default .select2-selection--single {
        border-radius: 13px;
    }

    .select2-container--default .select2-search--dropdown .select2-search__field {
        border-radius: 13px;
    }

    .vouchers_list {
        overflow-y: scroll;
        max-height: 440px;
    }

    .cart-count {
        position: absolute;
        width: 15px;
        top: 15px;
        height: 15px;
        line-height: 15px;
        background-color: #ff2a60;
        border-radius: 50%;
        text-align: center;
        color: #ffffff;
        font-size: 11px;
    }

    .dataTables_length {
        padding-left: 1.5rem;
    }

    /* chat box css */

    #center-text {
        display: flex;
        flex: 1;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100%;

    }

    #chat-circle {
        position: fixed;
        bottom: 7%;
        right: 2.5%;
        background: #ff2a60;
        width: 56px;
        height: 56px;
        border-radius: 50%;
        color: white;
        padding: 13px;
        cursor: pointer;
        z-index: 5;
        box-shadow: 0px 3px 16px 0px rgba(0, 0, 0, 0.6), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
    }

    .btn#my-btn {
        background: white;
        padding-top: 13px;
        padding-bottom: 12px;
        border-radius: 45px;
        padding-right: 40px;
        padding-left: 40px;
        color: #5865C3;
    }

    #chat-overlay {
        background: rgba(255, 255, 255, 0.1);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        display: none;
    }

    .badge-notification {
        position: absolute;
        font-size: .8rem;
        margin-top: -.1rem;
        margin-left: -.5rem;
        padding: .4em .55em;
    }

    .btn .badge {
        position: absolute;
        top: -7px;
        right: 4px;
    }

    .chat-box {
        display: none;
        background: #efefef;
        position: fixed;
        right: 30px;
        bottom: 50px;
        width: 350px;
        max-width: 85vw;
        max-height: 100vh;
        border-radius: 5px;
        /*   box-shadow: 0px 5px 35px 9px #464a92; */
        box-shadow: 0px 5px 35px 9px #ccc;
        z-index: 5;
    }

    .chat-box-toggle {
        float: right;
        margin-right: 15px;
        cursor: pointer;
    }

    .chat-box-header {
        background: #ff2a60;
        height: 70px;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        color: white;
        text-align: center;
        font-size: 20px;
        padding-top: 17px;
        font-weight: 800;
    }

    .chat-box-body {
        position: relative;
        height: 370px;
        height: auto;
        border: 1px solid #ccc;
        overflow: hidden;
    }

    .chat-box-body:after {
        content: "";
        opacity: 0.1;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        height: 100%;
        position: absolute;
        z-index: -1;
    }

    #chat-input {
        background: #f4f7f9;
        width: 100%;
        position: relative;
        height: 47px;
        padding-top: 10px;
        padding-right: 50px;
        padding-bottom: 10px;
        padding-left: 15px;
        border: none;
        resize: none;
        outline: none;
        border: 1px solid #ccc;
        color: #000;
        border-top: none;
        border-bottom-right-radius: 5px;
        border-bottom-left-radius: 5px;
        overflow: hidden;
        font-size: 12px;
    }

    .chat-input>form {
        margin-bottom: 0;
    }

    #chat-input::-webkit-input-placeholder {
        /* Chrome/Opera/Safari */
        color: #ccc;
        font-size: 14px;
    }

    #chat-input::-moz-placeholder {
        /* Firefox 19+ */
        color: #ccc;
        font-size: 14px;
    }

    #chat-input:-ms-input-placeholder {
        /* IE 10+ */
        color: #ccc;
        font-size: 14px;
    }

    #chat-input:-moz-placeholder {
        /* Firefox 18- */
        color: #ccc;
        font-size: 14px;
    }

    .chat-submit {
        position: absolute;
        bottom: 3px;
        right: 10px;
        background: transparent;
        box-shadow: none;
        border: none;
        border-radius: 50%;
        color: #ff2a60;
        width: 35px;
        height: 35px;
    }

    .chat-logs {
        padding: 15px;
        height: 370px;
        overflow-y: scroll;
    }

    .chat-logs::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        background-color: #F5F5F5;
    }

    .chat-logs::-webkit-scrollbar {
        width: 5px;
        background-color: #F5F5F5;
    }

    .chat-logs::-webkit-scrollbar-thumb {
        background-color: #5A5EB9;
    }

    .chat .form-group input,
    textarea {
        font-size: 14px !important;
    }



    @media only screen and (max-width: 500px) {
        .chat-logs {
            height: 40vh;
        }
    }

    .chat-msg.user>.msg-avatar img {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        float: left;
        width: 15%;
    }

    .chat-msg.self>.msg-avatar img {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        float: right;
        width: 15%;
        font-size: 12px;
    }

    .cm-msg-text {
        background: white;
        padding: 10px 15px 10px 15px;
        color: #000;
        max-width: 75%;
        float: left;
        margin-left: 10px;
        position: relative;
        margin-bottom: 20px;
        border-radius: 10px;
        font-size: 12px;
    }

    .chat-msg {
        clear: both;
    }

    .chat-msg.self>.cm-msg-text {
        float: right;
        margin-right: 10px;
        background: #9ca8e661 none repeat scroll 0 0;
        color: #000;
    }

    .cm-msg-button>ul>li {
        list-style: none;
        float: left;
        width: 50%;
    }

    .cm-msg-button {
        clear: both;
        margin-bottom: 70px;
    }

    .chat-logs p {
        font-size: 12px;
        word-break: break-all !important;
    }

    /* footer  */

    .footer_social {
        text-align: center;
    }

    .copy-right-text {
        margin-top: 1rem;
    }

    .active-bg1 {
        background-color: #e1e1e1;
    }

    .active-bg2 {
        background-color: #292929;
    }

    .customize-gift-inner a {
        font-size: 16px;
    }

    .customize-gift-inner h2 {
        font-size: 34px;
    }

    .single-footer-widget .import-link li {
        margin-bottom: 11px;
        position: relative;
        padding-left: 20px;
        color: rgba(255, 255, 255, 0.9);
    }

    .footer-area .single-footer-widget .import-link li a {
        color: #ffffff !important;
        font-weight: 600;
    }

    .single-footer-widget .import-link li::before {
        content: "";
        position: absolute;
        top: 7px;
        left: 0;
        width: 11px;
        height: 11px;
        background-color: #ff2a60;
        -webkit-transition: all ease 0.5s;
        transition: all ease 0.5s;
    }

    .import-link {
        list-style: none;
    }

    .footer-link {
        font-weight: 600;
        color: white;
    }

    .footer-link:hover {
        font-weight: 600;
        color: white;
    }

    .single-footer-widget h6 {
        text-transform: none;
    }

    .footer_logo h6 {
        text-transform: none;
    }

    .import-link {
        padding-left: 0px;
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .footer_social {
            margin-top: 17px;
        }
    }

    @media only screen and (max-width: 767px) {
        .footer_social {
            margin-top: 15px;
        }
    }

    .footer_social ul li {
        display: inline-block;
        margin-right: 8px;
    }

    .footer_social ul li:last-child {
        margin-right: 0;
    }

    @media only screen and (max-width: 767px) {
        .footer_social ul li {
            margin-right: 6px;
        }
    }

    .footer_social ul li a {
        width: 42px;
        height: 42px;
        line-height: 44px;
        display: block;
        text-align: center;
        font-size: 14px;
        background: #f2f2f2;
        border-radius: 50%;
    }

    .footer_social ul li a:hover {
        color: #ffffff;
        background: rgb(235, 51, 5);
    }

    @media only screen and (max-width: 767px) {
        .footer_social ul li a {
            width: 35px;
            height: 35px;
            line-height: 35px;
        }
    }

    @media screen and (max-width: 540px) {

        div.dataTables_wrapper div.dataTables_length,
        div.dataTables_wrapper div.dataTables_filter,
        div.dataTables_wrapper div.dataTables_info,
        div.dataTables_wrapper div.dataTables_paginate {
            text-align: left;
        }

    }

</style>

@stack('css')
@yield('css')
