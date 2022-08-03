@extends('layout_web.index')
@section('conten_web')
    <div class="site-wrap">
        <div class="bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <a
                            href="cart.html">Cart</a> <span class="mx-2 mb-0">/</span> <strong
                            class="text-black">Checkout</strong></div>
                </div>
            </div>
        </div>
        <div class="site-section">
            <div class=" container-fluid">
                {{-- <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="border p-4 rounded" role="alert">
                            Returning customer? <a href="#">Click here</a> to login
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-md-8 mb-5 mb-md-0">
                        <h2 class="h3 mb-3 text-black">Chi tiết hóa đơn</h2>

                        <div class="p-3 p-lg-5 border">
                            <div class="form-group">
                                <label for="c_classroom" class="text-black">Classroom <span
                                        class="text-danger">*</span></label>
                                @if (count($data->classRooms) > 0)
                                    <select id="c_classroom" class="form-control">
                                        <option value="null">Vui lòng chọn lớp</option>
                                        @foreach ($data->classRooms as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <span>Lớp chưa cập nhập</span>
                                @endif
                            </div>

                            <div id="loading">
                                <div class="loader">
                                    <div class="loader-square"></div>
                                    <div class="loader-square"></div>
                                    <div class="loader-square"></div>
                                    <div class="loader-square"></div>
                                    <div class="loader-square"></div>
                                    <div class="loader-square"></div>
                                    <div class="loader-square"></div>
                                </div>
                            </div>
                            <div id="calendars">



                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="name" class="text-black">Họ và tên </label>
                                    <input readonly='true' type="text" class="form-control" id="name" name="name"
                                        value="{{ auth()->user()->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="email" class="text-black">Email </label>
                                    <input readonly='true' type="text" class="form-control" id="email" name="email"
                                        value="{{ auth()->user()->email }}">
                                </div>
                            </div>
                        </div>




                        <h2 class="h3 mb-3 text-black mt-5">Vocher giảm giá</h2>
                        <div class="p-3 p-lg-5 border">

                            <label for="c_code" class="text-black mb-3">Nhập mã để được giảm giá khóa học</label>
                            <div class="input-group w-75">
                                <input type="text" class="form-control" id="c_code" placeholder=" Code"
                                    aria-label=" Code" aria-describedby="button-addon2">
                                <br>

                                <div class="input-group-append">
                                    <button class="btn btn-primary btn-sm" type="button" id="button-addon2">Áp dụng
                                    </button>
                                </div>
                            </div>
                            <small style="color: red " id="helpId_c_code" class="text-muted"></small>

                        </div>
                        {{-- <div class="p-3 p-lg-5 border">
                            <div class="form-group">
                                <label for="c_country" class="text-black">Country <span class="text-danger">*</span></label>
                                <select id="c_country" class="form-control">
                                    <option value="1">Select a country</option>
                                    <option value="2">bangladesh</option>
                                    <option value="3">Algeria</option>
                                    <option value="4">Afghanistan</option>
                                    <option value="5">Ghana</option>
                                    <option value="6">Albania</option>
                                    <option value="7">Bahrain</option>
                                    <option value="8">Colombia</option>
                                    <option value="9">Dominican Republic</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="c_fname" class="text-black">First Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_fname" name="c_fname">
                                </div>
                                <div class="col-md-6">
                                    <label for="c_lname" class="text-black">Last Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_lname" name="c_lname">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_companyname" class="text-black">Company Name </label>
                                    <input type="text" class="form-control" id="c_companyname" name="c_companyname">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_address" class="text-black">Address <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_address" name="c_address"
                                        placeholder="Street address">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    placeholder="Apartment, suite, unit etc. (optional)">
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="c_state_country" class="text-black">State / Country <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_state_country" name="c_state_country">
                                </div>
                                <div class="col-md-6">
                                    <label for="c_postal_zip" class="text-black">Posta / Zip <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_postal_zip" name="c_postal_zip">
                                </div>
                            </div>
                            <div class="form-group row mb-5">
                                <div class="col-md-6">
                                    <label for="c_email_address" class="text-black">Email Address <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_email_address" name="c_email_address">
                                </div>
                                <div class="col-md-6">
                                    <label for="c_phone" class="text-black">Phone <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_phone" name="c_phone"
                                        placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="c_create_account" class="text-black" data-toggle="collapse"
                                    href="#create_an_account" role="button" aria-expanded="false"
                                    aria-controls="create_an_account"><input type="checkbox" value="1"
                                        id="c_create_account"> Create an account?</label>
                                <div class="collapse" id="create_an_account">
                                    <div class="py-2">
                                        <p class="mb-3">Create an account by entering the information below. If you
                                            are a returning customer please login at the top of the page.</p>
                                        <div class="form-group">
                                            <label for="c_account_password" class="text-black">Account
                                                Password</label>
                                            <input type="email" class="form-control" id="c_account_password"
                                                name="c_account_password" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="c_ship_different_address" class="text-black" data-toggle="collapse"
                                    href="#ship_different_address" role="button" aria-expanded="false"
                                    aria-controls="ship_different_address"><input type="checkbox" value="1"
                                        id="c_ship_different_address"> Ship To A Different Address?</label>
                                <div class="collapse" id="ship_different_address">
                                    <div class="py-2">

                                        <div class="form-group">
                                            <label for="c_diff_country" class="text-black">Country <span
                                                    class="text-danger">*</span></label>
                                            <select id="c_diff_country" class="form-control">
                                                <option value="1">Select a country</option>
                                                <option value="2">bangladesh</option>
                                                <option value="3">Algeria</option>
                                                <option value="4">Afghanistan</option>
                                                <option value="5">Ghana</option>
                                                <option value="6">Albania</option>
                                                <option value="7">Bahrain</option>
                                                <option value="8">Colombia</option>
                                                <option value="9">Dominican Republic</option>
                                            </select>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="c_diff_fname" class="text-black">First Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="c_diff_fname"
                                                    name="c_diff_fname">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="c_diff_lname" class="text-black">Last Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="c_diff_lname"
                                                    name="c_diff_lname">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="c_diff_companyname" class="text-black">Company Name
                                                </label>
                                                <input type="text" class="form-control" id="c_diff_companyname"
                                                    name="c_diff_companyname">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="c_diff_address" class="text-black">Address <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="c_diff_address"
                                                    name="c_diff_address" placeholder="Street address">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="Apartment, suite, unit etc. (optional)">
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="c_diff_state_country" class="text-black">State / Country
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="c_diff_state_country"
                                                    name="c_diff_state_country">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="c_diff_postal_zip" class="text-black">Posta / Zip <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="c_diff_postal_zip"
                                                    name="c_diff_postal_zip">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-5">
                                            <div class="col-md-6">
                                                <label for="c_diff_email_address" class="text-black">Email Address
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="c_diff_email_address"
                                                    name="c_diff_email_address">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="c_diff_phone" class="text-black">Phone <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="c_diff_phone"
                                                    name="c_diff_phone" placeholder="Phone Number">
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="c_order_notes" class="text-black">Order Notes</label>
                                <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control"
                                    placeholder="Write your notes here..."></textarea>
                            </div>

                        </div> --}}
                    </div>
                    <div class="col-md-4">

                        {{-- <div class="row mb-5">
                            <div class="col-md-12">
                                <h2 class="h3 mb-3 text-black">Vocher giảm giá</h2>
                                <div class="p-3 p-lg-5 border">

                                    <label for="c_code" class="text-black mb-3">Nhập mã để được giảm giá khóa học</label>
                                    <div class="input-group w-75">
                                        <input type="text" class="form-control" id="c_code" placeholder=" Code"
                                            aria-label=" Code" aria-describedby="button-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary btn-sm" type="button" id="button-addon2">Áp dụng
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> --}}

                        <div class="row mb-5">
                            <div class="col-md-12">
                                <h2 class="h3 mb-3 text-black">Khóa học</h2>
                                <div style="position: relative;overflow: hidden;background-image: url({{ asset('images/' . $data->image) }});height: 600px; width: 100%; background-position: center; background-repeat: no-repeat;background-size: cover;"
                                    class="p-3 p-lg-5 border">

                                    <div class="conten_oder">

                                        <table class="table site-block-order-table mb-5">

                                            <tbody id="result_total">

                                                <tr>
                                                    <td>{{ $data->name }} </td>
                                                    <td> {{ number_format($data->price, 0, ',', '.') }} đ</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-black font-weight-bold"><strong>Giảm giá</strong>
                                                    </td>
                                                    <td class="text-black">0</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-black font-weight-bold"><strong>Tổng</strong>
                                                    </td>
                                                    <td class="text-black font-weight-bold">
                                                        <strong>{{ number_format($data->price, 0, ',', '.') }} đ</strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        {{-- <div class="border p-3 mb-3">
                                            <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank"
                                                    role="button" aria-expanded="false" aria-controls="collapsebank">Direct
                                                    Bank Transfer</a></h3>
    
                                            <div class="collapse" id="collapsebank">
                                                <div class="py-2">
                                                    <p class="mb-0">Make your payment directly into our bank account.
                                                        Please use your Order ID as the payment reference. Your order won’t
                                                        be shipped until the funds have cleared in our account.</p>
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div class="form-group">
                                            <button class="btn btn-primary btn-lg py-3 btn-block"
                                                onclick="window.location='thankyou.html'">Thanh toán ngay</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
@endsection

@section('js_web')
    <script>
        $(document).ready(function() {
            $(document).on('change', '#c_classroom', function(e) {
                e.preventDefault();
                if ($(this).val() == 'null') {
                    $('#calendars').empty();
                    return;
                }
                $('#calendars').empty();
                $('#loading').show();
                $.ajax({
                    type: "post",
                    url: "{{ route('class.calendar') }}",
                    data: {
                        id: $(this).val()
                    },
                    success: function(response) {
                        var _html = ``;
                        _html += ` <table class="table table-hover table-inverse">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>Ngày học </th>
                                            <th>Ca</th>
                                            <th>Thời gian</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
                        response.payload.map(function(val) {
                            _html += `
                                <tr>
                                    <td scope="row">${val.date}</td>
                                    <td>${val.class_time.name}</td>
                                    <td>${val.class_time.opening_hour} - ${val.class_time.closing_time}</td>
                                </tr>
                            `;
                        });
                        _html += `    </tbody>
                                </table>`;
                        $('#calendars').empty();
                        $('#loading').hide();
                        $('#calendars').html(_html);
                    }
                });
            });
            $(document).on('click', '#button-addon2', function(e) {
                e.preventDefault();
                var code = $('#c_code').val();
                if (code === '') {
                    $('#helpId_c_code').text('Chưa nhập code !!');
                    return;
                }
                $.ajax({
                    type: "post",
                    url: "{{ route('checkout.vocher') }}",
                    data: {
                        code: code
                    },
                    success: function(res) {
                        console.log(res);
                    }
                });


            });
        });
    </script>
@endsection
