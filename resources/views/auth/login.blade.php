@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <style>
            body {
                background-image: linear-gradient(to left, #0BAB64, #3BB78F);
            }

            textarea:focus,
            input:focus {
                outline: none !important;
            }

            .btn {
                border-radius: 50rem !important;
                box-shadow: 2px 10px 10px rgba(0, 0, 0, 0.25);
            }

            .text-color {
                color: #41BDA5 !important;
            }

            .image {
                background-image: url('images/Group 1122.png') !important;
                background-position: center !important;
                background-size: cover !important;
                background-repeat: no-repeat !important;
            }

            h4 {
                text-shadow: 7px 3px 5px rgba(0, 0, 0, 0.25) !important;
                / font-family: 'Inter' !important;/ font-style: normal !important;
                font-weight: 700 !important;
                font-size: 60px !important;
                line-height: 73px !important;
            }

            @media only screen and (max-width: 600px) {
                .image {
                    background-image: url('images/Group 122.png') !important;
                    background-position: center !important;
                    background-size: cover !important;
                    background-repeat: no-repeat !important;
                }
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="card vh-100 p-3 image shadow">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="card-body col-12 d-flex justify-content-center align-items-center rounded">

                        <div class="col-sm-12 col-lg-7">
                            <div class="col-12 mb-5 text-color d-flex justify-content-center">
                                <h4>Login</h4>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <div class="col-sm-10 col-md-8 col-lg-8">
                                    <input id="email" type="email"
                                        class="form-control col-12 border border-0 border-bottom mb-3 @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="Email id" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    {{-- <input type="email" name="email" placeholder="Email id" class="form-control col-12 border border-0 border-bottom mb-3"> --}}


                                    {{-- <input type="password" name="Enter-password" placeholder="Enter Password" class="form-control col-12 border border-0 border-bottom mb-3"> --}}

                                    <input id="password" type="password"
                                        class="form-control col-12 border border-0 border-bottom mb-3 @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password"
                                        placeholder="Enter Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <div class="col-10 d-flex">
                                    <div class="row">
                                        <div class="d-flex col-sm-12 col-md-12 col-lg-7">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-5 mt-sm-1">
                                            @if (Route::has('password.request'))
                                                <a class="btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="login col-12 d-flex justify-content-center mt-5">
                                <button type="submit" class="btn btn-light col-6 text-color"><i><svg width="20"
                                            height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.00078 9H0.0507812C0.550781 3.947 4.81478 0 10.0008 0C15.5238 0 20.0008 4.477 20.0008 10C20.0008 15.523 15.5238 20 10.0008 20C4.81578 20 0.551781 16.053 0.0507812 11H8.00078V14L13.0008 10L8.00078 6V9Z"
                                                fill="#41BDA5" />
                                        </svg>
                                    </i><b>Login</b></button>
                            </div>
                            <div class="col-12 d-flex">
                                <div class="col-6  d-flex justify-content-end">
                                    <svg width="134" height="135" viewBox="0 0 134 135" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        onclick="underworking()">
                                        <rect width="134" height="135" fill="url(#pattern0)" />
                                        <defs>
                                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1"
                                                height="1">
                                                <use xlink:href="#image0_171_249"
                                                    transform="translate(-0.00373134) scale(0.000671642 0.000666667)" />
                                            </pattern>
                                            <image id="image0_171_249" width="1500" height="1500"
                                                xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABdwAAAXcCAYAAAA4NUxkAAENpElEQVR42uzBAQEAAACAkP6v7ggCAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIDZgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVXYgwMBAAAAACD/10ZQVVVVVVVVVVVVVVVVVVVV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
