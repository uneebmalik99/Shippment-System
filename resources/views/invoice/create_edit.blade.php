@extends('layouts.partials.mainlayout')
@section('body')
    <div class="container-fluid">
        <div class="card">
            <div class="card-head">
                <div class="container-fluid">
                    <div class="p-3">
                        <div class="bg-view p-3 ">
                            <span class="text-clr"><b>Create Invoice</b></span>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="d-flex pb-3">
                        <div class="col-4">
                            <label for="" class="create-label pb-2">Container AR number</label>
                            <select class="form-control create-input" aria-label="Default select example">
                                <option selected>Select AR number</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="" class="create-label pb-2">Customer Name</label>
                            <select class="form-control create-input" aria-label="Default select example">
                                <option selected>Select Customer Name</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="" class="create-label pb-2">Total Amount</label>
                            <input type="select" class="form-control create-input" placeholder="">
                        </div>
                    </div>

                    <div class="d-flex pb-3">
                        <div class="col-4">
                            <label for="" class="create-label pb-2">Paid Amount</label>
                            <input type="select" class="form-control create-input" placeholder="">
                        </div>
                        <div class="col-4">
                            <label for="" class="create-label pb-2">Damaged</label>
                            <input type="select" class="form-control create-input" placeholder="">
                        </div>
                        <div class="col-4">
                            <label for="" class="create-label pb-2">Storage</label>
                            <input type="select" class="form-control create-input" placeholder="">
                        </div>
                    </div>

                    <div class="d-flex pb-3">
                        <div class="col-4">
                            <label for="" class="create-label pb-2">Discount</label>
                            <input type="select" class="form-control create-input" placeholder="">
                        </div>
                        <div class="col-4">
                            <label for="" class="create-label pb-2">Other</label>
                            <input type="select" class="form-control create-input" placeholder="">
                        </div>
                        <div class="col-4">
                            <label for="" class="create-label pb-2">Note</label>
                            <input type="select" class="form-control create-input" placeholder="">
                        </div>
                    </div>

                    <div class="d-flex pb-3">
                        <div class="col-4">
                            <label for="" class="create-label pb-2">Upload Invoice</label>
                            <input type="file" class="form-control create-input" placeholder="select file">
                        </div>
                    </div>

                    <div class="d-block d-md-flex">
                        <div class="col-md-6">
                            <div class="col-12 col-lg-8 d-flex justify-content-between">
                                <div class="col-4">
                                    <button type="button" class="btn file-btn text-white d-flex px-4">

                                        <div class="col-6 d-flex align-items-center">
                                            <i class="d-flex align-items-center"><svg width="20" height="20"
                                                    viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.61563 4.61875L8.0675 3.07188C7.88618 2.89041 7.67085 2.74649 7.43383 2.64836C7.19682 2.55023 6.94278 2.49982 6.68625 2.5H2.57875C2.40429 2.49992 2.23151 2.53421 2.07031 2.60092C1.9091 2.66763 1.76261 2.76544 1.63922 2.88878C1.51583 3.01211 1.41794 3.15855 1.35116 3.31973C1.28437 3.48091 1.25 3.65366 1.25 3.82813V8.4375H18.75V6.33563C18.75 5.98339 18.6101 5.64557 18.361 5.3965C18.1119 5.14743 17.7741 5.0075 17.4219 5.0075H10.5544C10.2024 5.00756 9.86479 4.86798 9.61563 4.61938V4.61875Z"
                                                        fill="#FFB02E" />
                                                    <path
                                                        d="M17.4219 18.75H2.57812C2.40424 18.7506 2.23194 18.7169 2.07107 18.6509C1.9102 18.5848 1.76392 18.4877 1.64059 18.3652C1.51725 18.2426 1.41928 18.0969 1.35226 17.9364C1.28524 17.776 1.25049 17.6039 1.25 17.43V8.195C1.25 7.46563 1.84438 6.875 2.57812 6.875H17.4219C18.1556 6.875 18.75 7.46563 18.75 8.195V17.43C18.7495 17.6039 18.7148 17.776 18.6477 17.9364C18.5807 18.0969 18.4827 18.2426 18.3594 18.3652C18.2361 18.4877 18.0898 18.5848 17.9289 18.6509C17.7681 18.7169 17.5958 18.7506 17.4219 18.75Z"
                                                        fill="white" />
                                                </svg>
                                            </i>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <span>File..</span>
                                        </div>

                                    </button>
                                </div>
                                <div class="col-4 d-flex justify-content-end">
                                    <button type="button" class="btn file-btn d-flex text-white px-4">

                                        <div class="col-6 d-flex align-items-center">
                                            <i class="d-flex align-items-center"><svg width="18" height="20"
                                                    viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M15.2222 17H2.77778C2.30628 17 1.8541 16.8127 1.5207 16.4793C1.1873 16.1459 1 15.6937 1 15.2222V2.77778C1 2.30628 1.1873 1.8541 1.5207 1.5207C1.8541 1.1873 2.30628 1 2.77778 1H12.5556L17 5.44444V15.2222C17 15.6937 16.8127 16.1459 16.4793 16.4793C16.1459 16.8127 15.6937 17 15.2222 17Z"
                                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M13.4436 17V9.88889H4.55469V17M4.55469 1V5.44444H11.6658"
                                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <span>Save</span>

                                        </div>

                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 pt-4 pt-md-0">
                            <div class="col-md-10 text-center text-md-end">
                                <button type="button" class="btn file-btn text-white px-4">Back</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
@endsection