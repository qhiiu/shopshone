@if (Auth::user() !== null)

        @extends('thongtincanhan.master')
        @section('contentInfo')

                <div style="display:block;height:250px;    font-size: larger;">

                        <div class="row"  style=" font-size: larger;">
                            <div class="col-sm-3">Họ tên</div>
                            <div class="col-sm-7">
                                <input type="text"  class="form-control " name="name" value="{{ Auth::user()->name }}" readonly style="    font-size: large;">
                            </div>
                        </div>
                        <div class="row"  style=" margin-top: 10px; font-size: larger;">
                            <div class="col-sm-3">Email  </div>
                            <div class="col-sm-7">
                                <input type="email"  class="form-control" name="email" value="{{ Auth::user()->email }}" readonly style="    font-size: large;">
                            </div>
                        </div>
                        <div class="row"  style=" margin-top: 10px; font-size: larger;">
                            <div class="col-sm-3">Số điện thoại  </div>
                            <div class="col-sm-7">
                                <input type="number"  class="form-control " name="phone" value="{{ Auth::user()->phone }}" readonly style="    font-size: large;">
                            </div>
                        </div>
                        <div class="row"  style=" margin-top: 10px; font-size: larger;">
                            <div class="col-sm-3">Địa chỉ  </div>
                            <div class="col-sm-7">
                                <input type="text"  class="form-control " name="address" value="{{ Auth::user()->address }}" readonly style="    font-size: large;">
                            </div>
                        </div>
                        <div class="row"  style=" margin-top: 10px; font-size: larger;">
                            <div class="col-sm-3">Giới tính  </div>
                            <div class="col-sm-7">
                                    <div class="input-wrap">
                                                <div class="col-xs-4">
                                                    <span>
                                                        <input type="radio" name="gender" value="" checked style="    font-size: large;">
                                                        @if (Auth::user()->gender == 'nam')    {{ 'Nam' }}   @endif
                                                        @if (Auth::user()->gender == 'nữ')    {{ 'Nữ' }}   @endif
                                                    </span>
                                                </div>
                                    </div>
                                {{-- <input type="text"  class="form-control " name="phone" value="{{ Auth::user()->gender }}">    --}}
                            </div>
                        </div>
                        <div class="row"  style=" margin-top: 18px; font-size: larger;">
                            <div class="col-sm-3">Ngày sinh</div>
                            <div class="col-sm-7">
                                <input type="date"  class="form-control " name="dob" value="{{ Auth::user()->dob }}" readonly  style="    font-size: large;">
                            </div>
                        </div>
                        <div class="row"  style=" margin-top: 10px">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-7">
                                <a class="btn btn-primary" href="{{ route('thongtincanhan._edit') }}">Cập nhật thông tin</a>
                            </div>
                        </div>
                    </div>
        @endsection

@else
    <script>window.location = "http://localhost:8080/shop_phone/public/index";</script>
@endif
