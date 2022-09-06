@include('layouts.customer_create.navbar')
<form action={{ $action }} method="POST" class="mt-3">
    @csrf
    <div class="d-flex justify-content-around p-2">
        <div class="col-4 d-block">
            <div>
                <label for="destination_port" class="text-info font-style">Destination Port</label>
            </div>
            <div>
                <input type="text" class="form-control rounded btn col-10 input-style text-left" name="destination_port"
                    id="destination_port">
            </div>
        </div>
        <div class="col-4 d-block">
            <div>
                <label for="valid_from" class="text-info font-style">Valid From</label>
            </div>
            <div>
                <input type="text" class="form-control rounded btn col-10 input-style text-left" name="valid_from"
                    id="valid_from">
            </div>
        </div>
        <div class="col-4 d-block">
            <div>
                <label for="valid_till" class="text-info font-style">Valid Till</label>
            </div>
            <div>
                <input type="text" class="form-control rounded btn col-10 input-style text-left" name="valid_till"
                    id="valid_till">
            </div>
        </div>
    </div>

    <div class="d-flex">
        <div class="col-6 px-0">
            <div class="d-flex justify-content-around p-2 col-12">
                <div class="col-3">
                    <div>
                        <label for="container_size" class="text-info font-style">Container Size</label>
                    </div>
                    <div>
                        <select name="container_size" id="container_size"
                            class="mx-2 form-control border border-info rounded col-10 input-style">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <label for="vehicle" class="text-info font-style">Vehicle</label>
                    </div>
                    <div>
                        <select name="vehicle" id="vehicle"
                            class="mx-2 form-control border border-info rounded col-10 input-style">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <label for="loading_port" class="text-info font-style">Loading Port</label>
                    </div>
                    <div>
                        <select name="loading_port" id="loading_port"
                            class="mx-2 form-control border border-info rounded col-10 input-style">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <label for="shipping_line" class="text-info font-style">Shipping Line</label>
                    </div>
                    <div>
                        <select name="shipping_line" id="shipping_line"
                            class="mx-2 form-control border border-info rounded col-10 input-style">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 px-0">
            <div class="d-flex justify-content-around p-2 col-12">
                <div class="col-6">
                    <div>
                        <label for="default" class="text-info font-style">Default</label>
                    </div>
                    <div>
                        <input type="text" class="form-control rounded btn col-12 input-style text-left"
                            name="default" id="default">
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <label for="special_rate" class="text-info font-style">Special Rate</label>
                    </div>
                    <div>
                        <input type="text" class="form-control rounded btn col-10 input-style text-left"
                            name="special_rate" id="special_rate">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2 px-0">
            <div class="d-flex justify-content-around align-items-end mt-4 p-2 col-12">
                <div class="col-3 d-flex icon-style">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M35.6248 21.8746C34.3748 28.1246 29.6623 34.0096 23.0498 35.3246C19.8248 35.9669 16.4794 35.5753 13.4898 34.2056C10.5003 32.8359 8.01913 30.558 6.39957 27.6961C4.78 24.8342 4.10463 21.5343 4.4696 18.2663C4.83458 14.9983 6.22131 11.9287 8.43233 9.49463C12.9673 4.49963 20.6248 3.12463 26.8748 5.62463"
                            stroke="#1CACD9" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M14.375 19.375L20.625 25.625L35.625 9.375" stroke="#1CACD9" stroke-width="4"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="col-3 d-flex icon-style mx-3">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.5 32.5H37.5V35H2.5V32.5ZM31.75 11.25C32.75 10.25 32.75 8.75 31.75 7.75L27.25 3.25C26.25 2.25 24.75 2.25 23.75 3.25L5 22V30H13L31.75 11.25ZM25.5 5L30 9.5L26.25 13.25L21.75 8.75L25.5 5ZM7.5 27.5V23L20 10.5L24.5 15L12 27.5H7.5Z"
                            fill="#1CACD9" />
                    </svg>
                </div>
                <div class="col-3 d-flex icon-style">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.6663 8.33333H23.333C23.333 7.44928 22.9818 6.60143 22.3567 5.97631C21.7316 5.35119 20.8837 5 19.9997 5C19.1156 5 18.2678 5.35119 17.6427 5.97631C17.0175 6.60143 16.6663 7.44928 16.6663 8.33333ZM14.1663 8.33333C14.1663 7.56729 14.3172 6.80875 14.6104 6.10101C14.9035 5.39328 15.3332 4.75022 15.8749 4.20854C16.4166 3.66687 17.0596 3.23719 17.7674 2.94404C18.4751 2.65088 19.2336 2.5 19.9997 2.5C20.7657 2.5 21.5243 2.65088 22.232 2.94404C22.9397 3.23719 23.5828 3.66687 24.1245 4.20854C24.6661 4.75022 25.0958 5.39328 25.389 6.10101C25.6821 6.80875 25.833 7.56729 25.833 8.33333H35.4163C35.7479 8.33333 36.0658 8.46503 36.3002 8.69945C36.5346 8.93387 36.6663 9.25181 36.6663 9.58333C36.6663 9.91485 36.5346 10.2328 36.3002 10.4672C36.0658 10.7016 35.7479 10.8333 35.4163 10.8333H33.2163L31.2663 31.0183C31.1168 32.565 30.3964 34.0004 29.2458 35.0447C28.0952 36.089 26.5969 36.6673 25.043 36.6667H14.9563C13.4028 36.6668 11.9048 36.0884 10.7546 35.0442C9.60434 33.9999 8.88423 32.5647 8.73467 31.0183L6.78301 10.8333H4.58301C4.25149 10.8333 3.93354 10.7016 3.69912 10.4672C3.4647 10.2328 3.33301 9.91485 3.33301 9.58333C3.33301 9.25181 3.4647 8.93387 3.69912 8.69945C3.93354 8.46503 4.25149 8.33333 4.58301 8.33333H14.1663ZM17.4997 16.25C17.4997 15.9185 17.368 15.6005 17.1336 15.3661C16.8991 15.1317 16.5812 15 16.2497 15C15.9182 15 15.6002 15.1317 15.3658 15.3661C15.1314 15.6005 14.9997 15.9185 14.9997 16.25V28.75C14.9997 29.0815 15.1314 29.3995 15.3658 29.6339C15.6002 29.8683 15.9182 30 16.2497 30C16.5812 30 16.8991 29.8683 17.1336 29.6339C17.368 29.3995 17.4997 29.0815 17.4997 28.75V16.25ZM23.7497 15C24.0812 15 24.3991 15.1317 24.6336 15.3661C24.868 15.6005 24.9997 15.9185 24.9997 16.25V28.75C24.9997 29.0815 24.868 29.3995 24.6336 29.6339C24.3991 29.8683 24.0812 30 23.7497 30C23.4182 30 23.1002 29.8683 22.8658 29.6339C22.6314 29.3995 22.4997 29.0815 22.4997 28.75V16.25C22.4997 15.9185 22.6314 15.6005 22.8658 15.3661C23.1002 15.1317 23.4182 15 23.7497 15ZM11.223 30.7783C11.3129 31.7061 11.7451 32.5671 12.4353 33.1935C13.1255 33.8199 14.0243 34.1669 14.9563 34.1667H25.043C25.9751 34.1669 26.8739 33.8199 27.5641 33.1935C28.2543 32.5671 28.6864 31.7061 28.7763 30.7783L30.7063 10.8333H9.29301L11.223 30.7783Z"
                            fill="#1CACD9" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="d-flex">
        <div class="col-6 px-0">
            <div class="d-flex justify-content-around p-2 col-12">
                <div class="col-3">
                    <div>
                        <label for="container_size" class="text-info font-style">Container Size</label>
                    </div>
                    <div>
                        <select name="container_size" id="container_size"
                            class="mx-2 form-control border border-info rounded col-10 input-style">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <label for="vehicle" class="text-info font-style">Vehicle</label>
                    </div>
                    <div>
                        <select name="vehicle" id="vehicle"
                            class="mx-2 form-control border border-info rounded col-10 input-style">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <label for="loading_port" class="text-info font-style">Loading Port</label>
                    </div>
                    <div>
                        <select name="loading_port" id="loading_port"
                            class="mx-2 form-control border border-info rounded col-10 input-style">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <label for="shipping_line" class="text-info font-style">Shipping Line</label>
                    </div>
                    <div>
                        <select name="shipping_line" id="shipping_line"
                            class="mx-2 form-control border border-info rounded col-10 input-style">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 px-0">
            <div class="d-flex justify-content-around p-2 col-12">
                <div class="col-6">
                    <div>
                        <label for="default" class="text-info font-style">Default</label>
                    </div>
                    <div>
                        <input type="text" class="form-control rounded btn col-12 input-style text-left"
                            name="default" id="default">
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <label for="special_rate" class="text-info font-style">Special Rate</label>
                    </div>
                    <div>
                        <input type="text" class="form-control rounded btn col-10 input-style text-left"
                            name="special_rate" id="special_rate">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2 px-0">
            <div class="d-flex justify-content-around align-items-end mt-4 p-2 col-12">
                <div class="col-3 d-flex icon-style">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M35.6248 21.8746C34.3748 28.1246 29.6623 34.0096 23.0498 35.3246C19.8248 35.9669 16.4794 35.5753 13.4898 34.2056C10.5003 32.8359 8.01913 30.558 6.39957 27.6961C4.78 24.8342 4.10463 21.5343 4.4696 18.2663C4.83458 14.9983 6.22131 11.9287 8.43233 9.49463C12.9673 4.49963 20.6248 3.12463 26.8748 5.62463"
                            stroke="#1CACD9" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M14.375 19.375L20.625 25.625L35.625 9.375" stroke="#1CACD9" stroke-width="4"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="col-3 d-flex icon-style mx-3">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.5 32.5H37.5V35H2.5V32.5ZM31.75 11.25C32.75 10.25 32.75 8.75 31.75 7.75L27.25 3.25C26.25 2.25 24.75 2.25 23.75 3.25L5 22V30H13L31.75 11.25ZM25.5 5L30 9.5L26.25 13.25L21.75 8.75L25.5 5ZM7.5 27.5V23L20 10.5L24.5 15L12 27.5H7.5Z"
                            fill="#1CACD9" />
                    </svg>
                </div>
                <div class="col-3 d-flex icon-style">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.6663 8.33333H23.333C23.333 7.44928 22.9818 6.60143 22.3567 5.97631C21.7316 5.35119 20.8837 5 19.9997 5C19.1156 5 18.2678 5.35119 17.6427 5.97631C17.0175 6.60143 16.6663 7.44928 16.6663 8.33333ZM14.1663 8.33333C14.1663 7.56729 14.3172 6.80875 14.6104 6.10101C14.9035 5.39328 15.3332 4.75022 15.8749 4.20854C16.4166 3.66687 17.0596 3.23719 17.7674 2.94404C18.4751 2.65088 19.2336 2.5 19.9997 2.5C20.7657 2.5 21.5243 2.65088 22.232 2.94404C22.9397 3.23719 23.5828 3.66687 24.1245 4.20854C24.6661 4.75022 25.0958 5.39328 25.389 6.10101C25.6821 6.80875 25.833 7.56729 25.833 8.33333H35.4163C35.7479 8.33333 36.0658 8.46503 36.3002 8.69945C36.5346 8.93387 36.6663 9.25181 36.6663 9.58333C36.6663 9.91485 36.5346 10.2328 36.3002 10.4672C36.0658 10.7016 35.7479 10.8333 35.4163 10.8333H33.2163L31.2663 31.0183C31.1168 32.565 30.3964 34.0004 29.2458 35.0447C28.0952 36.089 26.5969 36.6673 25.043 36.6667H14.9563C13.4028 36.6668 11.9048 36.0884 10.7546 35.0442C9.60434 33.9999 8.88423 32.5647 8.73467 31.0183L6.78301 10.8333H4.58301C4.25149 10.8333 3.93354 10.7016 3.69912 10.4672C3.4647 10.2328 3.33301 9.91485 3.33301 9.58333C3.33301 9.25181 3.4647 8.93387 3.69912 8.69945C3.93354 8.46503 4.25149 8.33333 4.58301 8.33333H14.1663ZM17.4997 16.25C17.4997 15.9185 17.368 15.6005 17.1336 15.3661C16.8991 15.1317 16.5812 15 16.2497 15C15.9182 15 15.6002 15.1317 15.3658 15.3661C15.1314 15.6005 14.9997 15.9185 14.9997 16.25V28.75C14.9997 29.0815 15.1314 29.3995 15.3658 29.6339C15.6002 29.8683 15.9182 30 16.2497 30C16.5812 30 16.8991 29.8683 17.1336 29.6339C17.368 29.3995 17.4997 29.0815 17.4997 28.75V16.25ZM23.7497 15C24.0812 15 24.3991 15.1317 24.6336 15.3661C24.868 15.6005 24.9997 15.9185 24.9997 16.25V28.75C24.9997 29.0815 24.868 29.3995 24.6336 29.6339C24.3991 29.8683 24.0812 30 23.7497 30C23.4182 30 23.1002 29.8683 22.8658 29.6339C22.6314 29.3995 22.4997 29.0815 22.4997 28.75V16.25C22.4997 15.9185 22.6314 15.6005 22.8658 15.3661C23.1002 15.1317 23.4182 15 23.7497 15ZM11.223 30.7783C11.3129 31.7061 11.7451 32.5671 12.4353 33.1935C13.1255 33.8199 14.0243 34.1669 14.9563 34.1667H25.043C25.9751 34.1669 26.8739 33.8199 27.5641 33.1935C28.2543 32.5671 28.6864 31.7061 28.7763 30.7783L30.7063 10.8333H9.29301L11.223 30.7783Z"
                            fill="#1CACD9" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex">
        <div class="col-6 px-0">
            <div class="d-flex justify-content-around p-2 col-12">
                <div class="col-3">
                    <div>
                        <label for="container_size" class="text-info font-style">Container Size</label>
                    </div>
                    <div>
                        <select name="container_size" id="container_size"
                            class="mx-2 form-control border border-info rounded col-10 input-style">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <label for="vehicle" class="text-info font-style">Vehicle</label>
                    </div>
                    <div>
                        <select name="vehicle" id="vehicle"
                            class="mx-2 form-control border border-info rounded col-10 input-style">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <label for="loading_port" class="text-info font-style">Loading Port</label>
                    </div>
                    <div>
                        <select name="loading_port" id="loading_port"
                            class="mx-2 form-control border border-info rounded col-10 input-style">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <label for="shipping_line" class="text-info font-style">Shipping Line</label>
                    </div>
                    <div>
                        <select name="shipping_line" id="shipping_line"
                            class="mx-2 form-control border border-info rounded col-10 input-style">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 px-0">
            <div class="d-flex justify-content-around p-2 col-12">
                <div class="col-6">
                    <div>
                        <label for="default" class="text-info font-style">Default</label>
                    </div>
                    <div>
                        <input type="text" class="form-control rounded btn col-12 input-style text-left"
                            name="default" id="default">
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <label for="special_rate" class="text-info font-style">Special Rate</label>
                    </div>
                    <div>
                        <input type="text" class="form-control rounded btn col-10 input-style text-left"
                            name="special_rate" id="special_rate">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2 px-0">
            <div class="d-flex justify-content-around align-items-end mt-4 p-2 col-12">
                <div class="col-3 d-flex icon-style">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M35.6248 21.8746C34.3748 28.1246 29.6623 34.0096 23.0498 35.3246C19.8248 35.9669 16.4794 35.5753 13.4898 34.2056C10.5003 32.8359 8.01913 30.558 6.39957 27.6961C4.78 24.8342 4.10463 21.5343 4.4696 18.2663C4.83458 14.9983 6.22131 11.9287 8.43233 9.49463C12.9673 4.49963 20.6248 3.12463 26.8748 5.62463"
                            stroke="#1CACD9" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M14.375 19.375L20.625 25.625L35.625 9.375" stroke="#1CACD9" stroke-width="4"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="col-3 d-flex icon-style mx-3">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.5 32.5H37.5V35H2.5V32.5ZM31.75 11.25C32.75 10.25 32.75 8.75 31.75 7.75L27.25 3.25C26.25 2.25 24.75 2.25 23.75 3.25L5 22V30H13L31.75 11.25ZM25.5 5L30 9.5L26.25 13.25L21.75 8.75L25.5 5ZM7.5 27.5V23L20 10.5L24.5 15L12 27.5H7.5Z"
                            fill="#1CACD9" />
                    </svg>
                </div>
                <div class="col-3 d-flex icon-style">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.6663 8.33333H23.333C23.333 7.44928 22.9818 6.60143 22.3567 5.97631C21.7316 5.35119 20.8837 5 19.9997 5C19.1156 5 18.2678 5.35119 17.6427 5.97631C17.0175 6.60143 16.6663 7.44928 16.6663 8.33333ZM14.1663 8.33333C14.1663 7.56729 14.3172 6.80875 14.6104 6.10101C14.9035 5.39328 15.3332 4.75022 15.8749 4.20854C16.4166 3.66687 17.0596 3.23719 17.7674 2.94404C18.4751 2.65088 19.2336 2.5 19.9997 2.5C20.7657 2.5 21.5243 2.65088 22.232 2.94404C22.9397 3.23719 23.5828 3.66687 24.1245 4.20854C24.6661 4.75022 25.0958 5.39328 25.389 6.10101C25.6821 6.80875 25.833 7.56729 25.833 8.33333H35.4163C35.7479 8.33333 36.0658 8.46503 36.3002 8.69945C36.5346 8.93387 36.6663 9.25181 36.6663 9.58333C36.6663 9.91485 36.5346 10.2328 36.3002 10.4672C36.0658 10.7016 35.7479 10.8333 35.4163 10.8333H33.2163L31.2663 31.0183C31.1168 32.565 30.3964 34.0004 29.2458 35.0447C28.0952 36.089 26.5969 36.6673 25.043 36.6667H14.9563C13.4028 36.6668 11.9048 36.0884 10.7546 35.0442C9.60434 33.9999 8.88423 32.5647 8.73467 31.0183L6.78301 10.8333H4.58301C4.25149 10.8333 3.93354 10.7016 3.69912 10.4672C3.4647 10.2328 3.33301 9.91485 3.33301 9.58333C3.33301 9.25181 3.4647 8.93387 3.69912 8.69945C3.93354 8.46503 4.25149 8.33333 4.58301 8.33333H14.1663ZM17.4997 16.25C17.4997 15.9185 17.368 15.6005 17.1336 15.3661C16.8991 15.1317 16.5812 15 16.2497 15C15.9182 15 15.6002 15.1317 15.3658 15.3661C15.1314 15.6005 14.9997 15.9185 14.9997 16.25V28.75C14.9997 29.0815 15.1314 29.3995 15.3658 29.6339C15.6002 29.8683 15.9182 30 16.2497 30C16.5812 30 16.8991 29.8683 17.1336 29.6339C17.368 29.3995 17.4997 29.0815 17.4997 28.75V16.25ZM23.7497 15C24.0812 15 24.3991 15.1317 24.6336 15.3661C24.868 15.6005 24.9997 15.9185 24.9997 16.25V28.75C24.9997 29.0815 24.868 29.3995 24.6336 29.6339C24.3991 29.8683 24.0812 30 23.7497 30C23.4182 30 23.1002 29.8683 22.8658 29.6339C22.6314 29.3995 22.4997 29.0815 22.4997 28.75V16.25C22.4997 15.9185 22.6314 15.6005 22.8658 15.3661C23.1002 15.1317 23.4182 15 23.7497 15ZM11.223 30.7783C11.3129 31.7061 11.7451 32.5671 12.4353 33.1935C13.1255 33.8199 14.0243 34.1669 14.9563 34.1667H25.043C25.9751 34.1669 26.8739 33.8199 27.5641 33.1935C28.2543 32.5671 28.6864 31.7061 28.7763 30.7783L30.7063 10.8333H9.29301L11.223 30.7783Z"
                            fill="#1CACD9" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex">
        <div class="col-6 px-0">
            <div class="d-flex justify-content-around p-2 col-12">
                <div class="col-3">
                    <div>
                        <label for="container_size" class="text-info font-style">Container Size</label>
                    </div>
                    <div>
                        <select name="container_size" id="container_size"
                            class="mx-2 form-control border border-info rounded col-10 input-style">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <label for="vehicle" class="text-info font-style">Vehicle</label>
                    </div>
                    <div>
                        <select name="vehicle" id="vehicle"
                            class="mx-2 form-control border border-info rounded col-10 input-style">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <label for="loading_port" class="text-info font-style">Loading Port</label>
                    </div>
                    <div>
                        <select name="loading_port" id="loading_port"
                            class="mx-2 form-control border border-info rounded col-10 input-style">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <label for="shipping_line" class="text-info font-style">Shipping Line</label>
                    </div>
                    <div>
                        <select name="shipping_line" id="shipping_line"
                            class="mx-2 form-control border border-info rounded col-10 input-style">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 px-0">
            <div class="d-flex justify-content-around p-2 col-12">
                <div class="col-6">
                    <div>
                        <label for="default" class="text-info font-style">Default</label>
                    </div>
                    <div>
                        <input type="text" class="form-control rounded btn col-12 input-style text-left"
                            name="default" id="default">
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <label for="special_rate" class="text-info font-style">Special Rate</label>
                    </div>
                    <div>
                        <input type="text" class="form-control rounded btn col-10 input-style text-left"
                            name="special_rate" id="special_rate">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2 px-0">
            <div class="d-flex justify-content-around align-items-end mt-4 p-2 col-12">
                <div class="col-3 d-flex icon-style">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M35.6248 21.8746C34.3748 28.1246 29.6623 34.0096 23.0498 35.3246C19.8248 35.9669 16.4794 35.5753 13.4898 34.2056C10.5003 32.8359 8.01913 30.558 6.39957 27.6961C4.78 24.8342 4.10463 21.5343 4.4696 18.2663C4.83458 14.9983 6.22131 11.9287 8.43233 9.49463C12.9673 4.49963 20.6248 3.12463 26.8748 5.62463"
                            stroke="#1CACD9" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M14.375 19.375L20.625 25.625L35.625 9.375" stroke="#1CACD9" stroke-width="4"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="col-3 d-flex icon-style mx-3">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.5 32.5H37.5V35H2.5V32.5ZM31.75 11.25C32.75 10.25 32.75 8.75 31.75 7.75L27.25 3.25C26.25 2.25 24.75 2.25 23.75 3.25L5 22V30H13L31.75 11.25ZM25.5 5L30 9.5L26.25 13.25L21.75 8.75L25.5 5ZM7.5 27.5V23L20 10.5L24.5 15L12 27.5H7.5Z"
                            fill="#1CACD9" />
                    </svg>
                </div>
                <div class="col-3 d-flex icon-style">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.6663 8.33333H23.333C23.333 7.44928 22.9818 6.60143 22.3567 5.97631C21.7316 5.35119 20.8837 5 19.9997 5C19.1156 5 18.2678 5.35119 17.6427 5.97631C17.0175 6.60143 16.6663 7.44928 16.6663 8.33333ZM14.1663 8.33333C14.1663 7.56729 14.3172 6.80875 14.6104 6.10101C14.9035 5.39328 15.3332 4.75022 15.8749 4.20854C16.4166 3.66687 17.0596 3.23719 17.7674 2.94404C18.4751 2.65088 19.2336 2.5 19.9997 2.5C20.7657 2.5 21.5243 2.65088 22.232 2.94404C22.9397 3.23719 23.5828 3.66687 24.1245 4.20854C24.6661 4.75022 25.0958 5.39328 25.389 6.10101C25.6821 6.80875 25.833 7.56729 25.833 8.33333H35.4163C35.7479 8.33333 36.0658 8.46503 36.3002 8.69945C36.5346 8.93387 36.6663 9.25181 36.6663 9.58333C36.6663 9.91485 36.5346 10.2328 36.3002 10.4672C36.0658 10.7016 35.7479 10.8333 35.4163 10.8333H33.2163L31.2663 31.0183C31.1168 32.565 30.3964 34.0004 29.2458 35.0447C28.0952 36.089 26.5969 36.6673 25.043 36.6667H14.9563C13.4028 36.6668 11.9048 36.0884 10.7546 35.0442C9.60434 33.9999 8.88423 32.5647 8.73467 31.0183L6.78301 10.8333H4.58301C4.25149 10.8333 3.93354 10.7016 3.69912 10.4672C3.4647 10.2328 3.33301 9.91485 3.33301 9.58333C3.33301 9.25181 3.4647 8.93387 3.69912 8.69945C3.93354 8.46503 4.25149 8.33333 4.58301 8.33333H14.1663ZM17.4997 16.25C17.4997 15.9185 17.368 15.6005 17.1336 15.3661C16.8991 15.1317 16.5812 15 16.2497 15C15.9182 15 15.6002 15.1317 15.3658 15.3661C15.1314 15.6005 14.9997 15.9185 14.9997 16.25V28.75C14.9997 29.0815 15.1314 29.3995 15.3658 29.6339C15.6002 29.8683 15.9182 30 16.2497 30C16.5812 30 16.8991 29.8683 17.1336 29.6339C17.368 29.3995 17.4997 29.0815 17.4997 28.75V16.25ZM23.7497 15C24.0812 15 24.3991 15.1317 24.6336 15.3661C24.868 15.6005 24.9997 15.9185 24.9997 16.25V28.75C24.9997 29.0815 24.868 29.3995 24.6336 29.6339C24.3991 29.8683 24.0812 30 23.7497 30C23.4182 30 23.1002 29.8683 22.8658 29.6339C22.6314 29.3995 22.4997 29.0815 22.4997 28.75V16.25C22.4997 15.9185 22.6314 15.6005 22.8658 15.3661C23.1002 15.1317 23.4182 15 23.7497 15ZM11.223 30.7783C11.3129 31.7061 11.7451 32.5671 12.4353 33.1935C13.1255 33.8199 14.0243 34.1669 14.9563 34.1667H25.043C25.9751 34.1669 26.8739 33.8199 27.5641 33.1935C28.2543 32.5671 28.6864 31.7061 28.7763 30.7783L30.7063 10.8333H9.29301L11.223 30.7783Z"
                            fill="#1CACD9" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex">
        <div class="col-6 px-0">
            <div class="d-flex justify-content-around p-2 col-12">
                <div class="col-3">
                    <div>
                        <label for="container_size" class="text-info font-style">Container Size</label>
                    </div>
                    <div>
                        <select name="container_size" id="container_size"
                            class="mx-2 form-control border border-info rounded col-10 input-style">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <label for="vehicle" class="text-info font-style">Vehicle</label>
                    </div>
                    <div>
                        <select name="vehicle" id="vehicle"
                            class="mx-2 form-control border border-info rounded col-10 input-style">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <label for="loading_port" class="text-info font-style">Loading Port</label>
                    </div>
                    <div>
                        <select name="loading_port" id="loading_port"
                            class="mx-2 form-control border border-info rounded col-10 input-style">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <label for="shipping_line" class="text-info font-style">Shipping Line</label>
                    </div>
                    <div>
                        <select name="shipping_line" id="shipping_line"
                            class="mx-2 form-control border border-info rounded col-10 input-style">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 px-0">
            <div class="d-flex justify-content-around p-2 col-12">
                <div class="col-6">
                    <div>
                        <label for="default" class="text-info font-style">Default</label>
                    </div>
                    <div>
                        <input type="text" class="form-control rounded btn col-12 input-style text-left"
                            name="default" id="default">
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <label for="special_rate" class="text-info font-style">Special Rate</label>
                    </div>
                    <div>
                        <input type="text" class="form-control rounded btn col-10 input-style text-left"
                            name="special_rate" id="special_rate">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2 px-0">
            <div class="d-flex justify-content-around align-items-end mt-4 p-2 col-12">
                <div class="col-3 d-flex icon-style">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M35.6248 21.8746C34.3748 28.1246 29.6623 34.0096 23.0498 35.3246C19.8248 35.9669 16.4794 35.5753 13.4898 34.2056C10.5003 32.8359 8.01913 30.558 6.39957 27.6961C4.78 24.8342 4.10463 21.5343 4.4696 18.2663C4.83458 14.9983 6.22131 11.9287 8.43233 9.49463C12.9673 4.49963 20.6248 3.12463 26.8748 5.62463"
                            stroke="#1CACD9" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M14.375 19.375L20.625 25.625L35.625 9.375" stroke="#1CACD9" stroke-width="4"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="col-3 d-flex icon-style mx-3">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.5 32.5H37.5V35H2.5V32.5ZM31.75 11.25C32.75 10.25 32.75 8.75 31.75 7.75L27.25 3.25C26.25 2.25 24.75 2.25 23.75 3.25L5 22V30H13L31.75 11.25ZM25.5 5L30 9.5L26.25 13.25L21.75 8.75L25.5 5ZM7.5 27.5V23L20 10.5L24.5 15L12 27.5H7.5Z"
                            fill="#1CACD9" />
                    </svg>
                </div>
                <div class="col-3 d-flex icon-style">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.6663 8.33333H23.333C23.333 7.44928 22.9818 6.60143 22.3567 5.97631C21.7316 5.35119 20.8837 5 19.9997 5C19.1156 5 18.2678 5.35119 17.6427 5.97631C17.0175 6.60143 16.6663 7.44928 16.6663 8.33333ZM14.1663 8.33333C14.1663 7.56729 14.3172 6.80875 14.6104 6.10101C14.9035 5.39328 15.3332 4.75022 15.8749 4.20854C16.4166 3.66687 17.0596 3.23719 17.7674 2.94404C18.4751 2.65088 19.2336 2.5 19.9997 2.5C20.7657 2.5 21.5243 2.65088 22.232 2.94404C22.9397 3.23719 23.5828 3.66687 24.1245 4.20854C24.6661 4.75022 25.0958 5.39328 25.389 6.10101C25.6821 6.80875 25.833 7.56729 25.833 8.33333H35.4163C35.7479 8.33333 36.0658 8.46503 36.3002 8.69945C36.5346 8.93387 36.6663 9.25181 36.6663 9.58333C36.6663 9.91485 36.5346 10.2328 36.3002 10.4672C36.0658 10.7016 35.7479 10.8333 35.4163 10.8333H33.2163L31.2663 31.0183C31.1168 32.565 30.3964 34.0004 29.2458 35.0447C28.0952 36.089 26.5969 36.6673 25.043 36.6667H14.9563C13.4028 36.6668 11.9048 36.0884 10.7546 35.0442C9.60434 33.9999 8.88423 32.5647 8.73467 31.0183L6.78301 10.8333H4.58301C4.25149 10.8333 3.93354 10.7016 3.69912 10.4672C3.4647 10.2328 3.33301 9.91485 3.33301 9.58333C3.33301 9.25181 3.4647 8.93387 3.69912 8.69945C3.93354 8.46503 4.25149 8.33333 4.58301 8.33333H14.1663ZM17.4997 16.25C17.4997 15.9185 17.368 15.6005 17.1336 15.3661C16.8991 15.1317 16.5812 15 16.2497 15C15.9182 15 15.6002 15.1317 15.3658 15.3661C15.1314 15.6005 14.9997 15.9185 14.9997 16.25V28.75C14.9997 29.0815 15.1314 29.3995 15.3658 29.6339C15.6002 29.8683 15.9182 30 16.2497 30C16.5812 30 16.8991 29.8683 17.1336 29.6339C17.368 29.3995 17.4997 29.0815 17.4997 28.75V16.25ZM23.7497 15C24.0812 15 24.3991 15.1317 24.6336 15.3661C24.868 15.6005 24.9997 15.9185 24.9997 16.25V28.75C24.9997 29.0815 24.868 29.3995 24.6336 29.6339C24.3991 29.8683 24.0812 30 23.7497 30C23.4182 30 23.1002 29.8683 22.8658 29.6339C22.6314 29.3995 22.4997 29.0815 22.4997 28.75V16.25C22.4997 15.9185 22.6314 15.6005 22.8658 15.3661C23.1002 15.1317 23.4182 15 23.7497 15ZM11.223 30.7783C11.3129 31.7061 11.7451 32.5671 12.4353 33.1935C13.1255 33.8199 14.0243 34.1669 14.9563 34.1667H25.043C25.9751 34.1669 26.8739 33.8199 27.5641 33.1935C28.2543 32.5671 28.6864 31.7061 28.7763 30.7783L30.7063 10.8333H9.29301L11.223 30.7783Z"
                            fill="#1CACD9" />
                    </svg>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="col-12 py-2 px-5 d-flex justify-content-end">
        <input type="hidden" class="form-control-sm border border-0 rounded-pill bg col-6" name="customer_email"
            id="customer_email" value="{{ @$module['email'] }}"readonly>
        <input type="hidden" class="form-control-sm border border-0 rounded-pill bg col-6" name="added_by_role"
            id="added_by_email" value="{{ Auth::user()->id }}"readonly value="{{ @$user['added_by_email'] }}">
        <input type="button" value="Create" class="btn col-1 next-style text-white" onclick="createForm(this.id)"
            id="quotation" name="{{ $module['button'] }}">
    </div>
</form>