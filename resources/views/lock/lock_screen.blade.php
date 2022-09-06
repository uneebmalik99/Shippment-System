<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.partials.head')
    <style>
        .body {
            width: 100vw;
            height: 100vh;
        }
    </style>
</head>

<body>
    <div class="body px-5 d-flex flex-column justify-content-center">
        <div class="input-border-style bg-white">
            <div class="h3 col-6 d-flex justify-content-center mt-3">
                <div class="d-flex align-items-center">
                    <b>Screen Lock</b>
                </div>
                <div class="px-3">
                    <svg width="42" height="50" viewBox="0 0 42 50" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d_169_171)">
                            <path
                                d="M27.5 19.5H25V12C25 6.5 20.5 2 15 2C9.5 2 5 6.5 5 12V19.5H2.5C1.25 19.5 0 20.75 0 22V39.5C0 40.75 1.25 42 2.5 42H27.5C28.75 42 30 40.75 30 39.5V22C30 20.75 28.75 19.5 27.5 19.5ZM17.5 37H12.5L13.5 31.5C12.25 31 11.25 29.5 11.25 28.25C11.25 26.25 13 24.5 15 24.5C17 24.5 18.75 26.25 18.75 28.25C18.75 29.75 18 31 16.5 31.5L17.5 37ZM20 19.5H10V12C10 9.25 12.25 7 15 7C17.75 7 20 9.25 20 12V19.5Z"
                                fill="#426498" />
                        </g>
                        <defs>
                            <filter id="filter0_d_169_171" x="0" y="0" width="42" height="50"
                                filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                <feColorMatrix in="SourceAlpha" type="matrix"
                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                <feOffset dx="7" dy="3" />
                                <feGaussianBlur stdDeviation="2.5" />
                                <feComposite in2="hardAlpha" operator="out" />
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_169_171" />
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_169_171"
                                    result="shape" />
                            </filter>
                        </defs>
                    </svg>
                </div>
            </div>
            <div class="d-flex py-3">
                <form action="{{ route('unlock') }}" method="POST" class="col-6">
                    <div class="col-12 d-flex justify-content-center p-3">
                        <div class="w-100 d-flex flex-column align-items-center">
                            <div class="d-flex flex-column align-items-center my-4">
                                <div>
                                    <svg width="127" height="127" viewBox="0 0 127 127" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M106.16 98.9401C111.86 92.0825 115.824 83.9531 117.717 75.2395C119.61 66.5258 119.377 57.4844 117.037 48.88C114.697 40.2755 110.319 32.3613 104.274 25.8067C98.228 19.2521 90.6926 14.25 82.305 11.2235C73.9174 8.1971 64.9242 7.23533 56.0862 8.41961C47.2483 9.60388 38.8256 12.8994 31.5306 18.0273C24.2356 23.1552 18.283 29.9646 14.1763 37.8796C10.0697 45.7946 7.92971 54.5822 7.93752 63.4992C7.94052 76.4619 12.5085 89.0094 20.8399 98.9401L20.7606 99.0076C21.0384 99.341 21.3559 99.6267 21.6416 99.9561C21.9988 100.365 22.3838 100.75 22.7529 101.147C23.8641 102.353 25.0071 103.512 26.2057 104.6C26.5708 104.933 26.9478 105.242 27.3169 105.56C28.5869 106.655 29.8926 107.695 31.246 108.664C31.4206 108.783 31.5794 108.937 31.754 109.06V109.013C41.0492 115.554 52.1379 119.065 63.504 119.065C74.8701 119.065 85.9588 115.554 95.254 109.013V109.06C95.4286 108.937 95.5834 108.783 95.762 108.664C97.1114 107.691 98.4211 106.655 99.6911 105.56C100.06 105.242 100.437 104.929 100.802 104.6C102.001 103.508 103.144 102.353 104.255 101.147C104.624 100.75 105.005 100.365 105.366 99.9561C105.648 99.6267 105.97 99.341 106.247 99.0036L106.16 98.9401ZM63.5 31.7492C67.0323 31.7492 70.4852 32.7966 73.4222 34.759C76.3591 36.7214 78.6482 39.5107 79.9999 42.7741C81.3517 46.0374 81.7053 49.6284 81.0162 53.0928C80.3271 56.5571 78.6262 59.7394 76.1285 62.237C73.6308 64.7347 70.4486 66.4357 66.9842 67.1248C63.5198 67.8139 59.9289 67.4602 56.6655 66.1085C53.4022 64.7567 50.6129 62.4677 48.6505 59.5307C46.6881 56.5937 45.6406 53.1408 45.6406 49.6086C45.6406 44.872 47.5223 40.3294 50.8715 36.9801C54.2208 33.6308 58.7634 31.7492 63.5 31.7492ZM31.7778 98.9401C31.8466 93.729 33.9644 88.7545 37.6728 85.0929C41.3813 81.4313 46.3822 79.3769 51.5938 79.3742H75.4063C80.6178 79.3769 85.6188 81.4313 89.3272 85.0929C93.0357 88.7545 95.1534 93.729 95.2222 98.9401C86.5181 106.784 75.2168 111.124 63.5 111.124C51.7832 111.124 40.4819 106.784 31.7778 98.9401Z"
                                            fill="#426498" />
                                    </svg>
                                </div>
                                <div class="text-muted font-bold">
                                    <span>This is a user</span>
                                </div>
                            </div>
                            <div class="d-flex flex-column align-items-center my-2 p-3 w-100">
                                <div class="w-100 d-flex justify-content-center">
                                    <input type="password" name="password" placeholder="Enter Password"
                                        class="lock_style col-8 p-1 border-0">
                                </div>
                                <div class="w-100 d-flex justify-content-center">
                                    <div class="col-8 text-muted text-right px-0 py-2 font-bold">
                                        <span>Forget Password?</span>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100 d-flex justify-content-center">
                                <div class="col-6">
                                    <button class="form-control lock_button text-dark font-bold" style="cursor: pointer;">Unlock</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-6">
                    <div class="col-12 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('assets/images/lock_bg.png') }}" alt=""
                            class="img-responsive col-10">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
