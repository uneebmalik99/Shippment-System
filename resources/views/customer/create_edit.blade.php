@extends('layouts.partials.mainlayout')
@section('body')
    <div class="d-flex justify-content-center mt-3">
        <div class="col-10 card border-light rounded mt-3">
            <form action={{ $action }} method="POST">
                @csrf
                <div>
                    <div class="d-flex py-3">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <label for="customer_name" class="col-4">Name:</label>
                                <input type="text" class="form-control col-8" name="customer_name" id="customer_name"
                                    value="{{ @$user['customer_name'] }}">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('customer_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <label for="company_name" class="col-4">Company:</label>
                                <input type="text" class="form-control col-8" name="company_name" id="company_name"
                                    value="{{ @$user['company_name'] }}">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('company_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex py-3">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <label for="phone" class="col-4">Phone:</label>
                                <input type="tel" class="form-control col-8" name="phone" id="phone"
                                    value="{{ @$user['phone'] }}" placeholder="0000-0000000" pattern="[0-9]{4}-[0-9]{7}">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-6 d-flex align-items-center">
                            <label for="address_1" class="col-4">Address_1:</label>
                            <input type="text" class="form-control col-8" name="address_line1" id="address_1"
                                value="{{ @$user['address_line1'] }}">
                        </div>
                    </div>
                    <div class="d-flex py-3">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <label for="address_2" class="col-4">Address_2:</label>
                                <input type="text" class="form-control col-8" name="address_line2" id="address_2"
                                    value="{{ @$user['address_line2'] }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <label for="added_by_email" class="col-4">Added By:</label>
                                <input type="email" class="form-control col-8" name="added_by_email" id="added_by_email"
                                    value="{{ Auth::user()->email }}"readonly value="{{ @$user['added_by_email'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex py-3">
                        <div class="col-6">
                            <div class=" d-flex align-items-center">
                                <label for="email" class="col-4">Email:</label>
                                <input type="email" class="form-control col-8" name="email" id="email"
                                    value="{{ @$user['email'] }}">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <label for="city" class="col-4">City:</label>
                                <input type="text" class="form-control col-8" name="city" id="city"
                                    value="{{ @$user['city'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex py-3">
                        <div class="col-6">
                            <div class=" d-flex align-items-center">
                                <label for="state" class="col-4">State:</label>
                                <input type="text" class="form-control col-8" name="state" id="state"
                                    value="{{ @$user['state'] }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <label for="zip_code" class="col-4">Zip Code:</label>
                                <input type="number" class="form-control col-8" name="zip_code" id="zip_code"
                                    value="{{ @$user['zip_code'] }}">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('zip_code')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex py-3">
                        <div class="col-6">
                            <div class=" d-flex align-items-center">
                                <label for="country" class="col-4">Country:</label>
                                <input type="text" class="form-control col-8" name="country" id="country"
                                    value="{{ @$user['country'] }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <label for="tax_id" class="col-4">Tax ID:</label>
                                <input type="number" class="form-control col-8" name="tax_id" id="tax_id"
                                    value="{{ @$user['tax_id'] }}">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('tax_id')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex py-3">
                        <div class="col-6">
                            <div class=" d-flex align-items-center">
                                <label for="phone_two" class="col-4">Phone_2:</label>
                                <input type="tel" class="form-control col-8" name="phone_two" id="phone_two"
                                    value="{{ @$user['phone_two'] }}" placeholder="0000-0000000"
                                    pattern="[0-9]{4}-[0-9]{7}">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('phone_two')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <label for="note" class="col-4">Note:</label>
                                <input type="text" class="form-control col-8" name="note" id="note"
                                    value="{{ @$user['note'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-6 py-2">
                        <input type="hidden" class="form-control col-8" name="added_by_role" id="added_by_email"
                            value="{{ Auth::user()->id }}"readonly value="{{ @$user['added_by_email'] }}">
                        <input type="submit" value="{{ $module['button'] }}" class="btn btn-primary rounded"
                            name="{{ $module['button'] }}">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
