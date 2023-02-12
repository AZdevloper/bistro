@extends('layouts.app')
@section('content')
    <style>
        body {
            background-color: #f9f9fa
        }

        .padding {
            padding: 3rem !important
        }

        .user-card-full {
            overflow: hidden;
        }

        .card {
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            border: none;
            margin-bottom: 30px;
        }

        .m-r-0 {
            margin-right: 0px;
        }

        .m-l-0 {
            margin-left: 0px;
        }

        .user-card-full .user-profile {
            border-radius: 5px 0 0 5px;
        }

        .bg-c-lite-green {
            background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
            background: linear-gradient(to right, #ee5a6f, #f29263);
        }

        .user-profile {
            padding: 20px 0;
        }

        .card-block {
            padding: 1.25rem;
        }

        .m-b-25 {
            margin-bottom: 25px;
        }

        .img-radius {
            border-radius: 5px;
        }



        h6 {
            font-size: 14px;
        }

        .card .card-block p {
            line-height: 25px;
        }

        @media only screen and (min-width: 1400px) {
            p {
                font-size: 14px;
            }
        }

        .card-block {
            padding: 1.25rem;
        }

        .b-b-default {
            border-bottom: 1px solid #e0e0e0;
        }

        .m-b-20 {
            margin-bottom: 20px;
        }

        .p-b-5 {
            padding-bottom: 5px !important;
        }

        .card .card-block p {
            line-height: 25px;
        }

        .m-b-10 {
            margin-bottom: 10px;
        }

        .text-muted {
            color: #919aa3 !important;
        }

        .b-b-default {
            border-bottom: 1px solid #e0e0e0;
        }

        .f-w-600 {
            font-weight: 600;
        }

        .m-b-20 {
            margin-bottom: 20px;
        }

        .m-t-40 {
            margin-top: 20px;
        }

        .p-b-5 {
            padding-bottom: 5px !important;
        }

        .m-b-10 {
            margin-bottom: 10px;
        }

        .btn:hover,
        .btn:focus {
            background: var(--gradient) !important;
            -webkit-background-clip: none !important;
            -webkit-text-fill-color: #fff !important;
            border: 5px solid #fff !important;
            box-shadow: #222 1px 0 10px;
            text-decoration: underline;
        }

        .m-t-40 {
            margin-top: 20px;
        }

        .user-card-full .social-link li {
            display: inline-block;
        }

        .user-card-full .social-link li a {
            font-size: 20px;
            margin: 0 10px 0 0;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }



        .button {
            text-align: center;
            display: inline-block;
            background: #4285f4;
            width: 60px;
            height: 30px;
            /* color: #fff; */
            border: none;
            /* text-transform: uppercase; */
            /* padding: 20px 30px; */
            border-radius: 5px;
            box-shadow: 0px 17px 10px -10px rgba(0, 0, 0, 0.4);
            cursor: pointer;
            -webkit-moz-transition: all ease-in-out 300ms;
            transition: all ease-in-out 300ms
        }

        .button:hover {
            box-shadow: 0px 37px 20px -20px rgba(0, 0, 0, 0.2);
            -webkit-moz-transform: translate(0px, -3px) scale(1);
            transform: translate(0px, -5px) scale(1)
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <div class="page-content page-container" id="page-content">

        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                    @if (session()->has('status'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <strong>success!</strong>
                            {{ session()->get('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert">
                            </button>
                        </div>
                    @endif
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-25">
                                        <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius"
                                            alt="User-Profile-Image">
                                    </div>
                                    <h6 class="f-w-600 " id="">{{ $users->name }}</h6>
                                    <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                </div>
                            </div>

                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                    <div class="row">
                                        <form action=" {{ route('users.update', $users->id) }}" class=" row d-flex"
                                            method="post">
                                            @csrf
                                            @method('put')
                                            
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                           @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Email</p>
                                                <input type="text" class="" name="email"
                                                    value="{{ $users->email }}" style="" id="Email-input">
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">current Password</p>
                                                <input type="text" class="" value=""
                                                    name="currentPassword" style="" id="Password-input">
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">username</p>
                                                <input type="text" value="{{ $users->name }}" name="username" style=" "
                                                    id="username-input">
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">New Password</p>
                                                <input type="text" value="" name="newPassword" id="newPassword-input">
                                            </div>
                                            <div class="col-sm-6">
                                                <span class="button" id="edite">edite</span>
                                            </div>
                                            <div class="col-sm-6">
                                                <button class="button" type="submit" id="update">update</button>
                                            </div>
                                        </form>
                                    </div>

                                    <ul class="social-link list-unstyled m-t-40 m-b-10">
                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                                                data-original-title="facebook" data-abc="true"><i
                                                    class="mdi mdi-facebook feather icon-facebook facebook"
                                                    aria-hidden="true"></i></a></li>
                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                                                data-original-title="twitter" data-abc="true"><i
                                                    class="mdi mdi-twitter feather icon-twitter twitter"
                                                    aria-hidden="true"></i></a></li>
                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                                                data-original-title="instagram" data-abc="true"><i
                                                    class="mdi mdi-instagram feather icon-instagram instagram"
                                                    aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
        $(document).ready(function() {
            $('#edite').click(function() {
                $('#Email').hide();
                $('#Email-input').val($('#Email').text());
                $('#Email-input').show();
                $('#Email-input').focus();
            //password
            $('#Password').hide();
                $('#Password-input').val($('#Password').text());
                // $('#Password-input').show();
                // $('#Password-input').focus();
            })
            //Email
            $('#Email-input').hide();
            // $('#Email').click(function() {
            //     $('#Email').hide();
            //     $('#Email-input').val($('#Email').text());
            //     $('#Email-input').show();
            //     $('#Email-input').focus();
            // });

            $('#Email-input').blur(function() {
                $('#Email').text($('#Email-input').val());
                $('#Email').show();
                $('#Email-input').hide();
            });

            // Password
            $('#Password-input').hide();
            $('#Password').click(function() {
                $('#Password').hide();
                $('#Password-input').val($('#Password').text());
                $('#Password-input').show();
                $('#Password-input').focus();
            });

            $('#Password-input').blur(function() {
                $('#Password').text($('#Password-input').val());
                $('#Password').show();
                $('#Password-input').hide();
            });
            // username
            // $('#username-input').hide();
            $('#username-input').addClass('d-none');
            $('#username').click(function() {
                $('#username').addClass('d-none');
                // $('#username').hide();
                $('#username-input').val($('#username').text());
                // $('#username-input').show();
                $('#username-input').removeClass('d-none');
                $('#username-input').focus();
            });

            $('#username-input').blur(function() {
                $('#username').removeClass('d-none');
                $('#username').text($('#username-input').val());
                // $('#username').show();
                // $('#username-input').hide();
                $('#username-input').addClass('d-none');
            });

        });
    </script> --}}
@endsection
