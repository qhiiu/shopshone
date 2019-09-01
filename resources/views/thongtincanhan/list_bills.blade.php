@if (Auth::user() !== null)

        @extends('thongtincanhan.master')
        @section('contentInfo')
                <div style="display:block;height:250px;    font-size: larger;">
                    <div style="font-size:50px;">Danh sách đơn hàng</div>
                    <div class="space40">&nbsp;</div>

                    @foreach ($id_bill as $l)
                    <div class="row" style="border:1px solid black;margin-bottom:30px;" >
                            <div class="row" style="border-bottom: 1px solid #ccc; background: antiquewhite;padding: 10px;">
                                <div class="row">
                                <div class="col-sm-4">
                                        <span> Mã đơn hàng : </span>
                                        <span>#{{ $l->id_bill }}</span>
                                    </div>
                                </div>
                                <div class="row" style="padding: 10px 0px 0px 0px">
                                    <div class="col-sm-7"  style="color:gray">
                                        <span> Ngày :</span>
                                        <span>
                                            @php
                                                $bills = DB::table('bills')->where('id',$l->id_bill)->get();
                                                foreach ($bills as $bills) {
                                                    echo $bills->date_order;
                                                }
                                            @endphp
                                        </span>
                                    </div>
                                    <div class="col-sm-2">
                                            <span style="font-weight:600"> Tổng tiền : </span>
                                    </div>
                                    <div class="col-sm-3">
                                        <span style="    color: orange;">
                                            @php
                                                $bills = DB::table('bills')->where('id',$l->id_bill)->get();
                                                foreach ($bills as $bills) {
                                                    echo $bills->total;
                                                }
                                            @endphp
                                            <span>VND</span>
                                        </span>
                                    </div>

                                </div>
                            </div>
                            <div class="row" style="    background: cornsilk; font-weight: 700; padding: 10px;border-bottom: 1px solid #e8e8e8">
                                <div class="col-sm-7" >Sản phẩm</div>
                                <div class="col-sm-2">Số lượng</div>
                                <div class="col-sm-3">Giá sản phẩm</div>
                            </div>

            {{-- ------------ --}}
                        @php
                            $each_id_bill = DB::table('bill_details')->where('id_bill',$l->id_bill)->get();
                        @endphp
                        @foreach ($each_id_bill as $each_id_bill)
                            <div class="row" style="padding: 5px; border-bottom: 1px solid #e8e8e8;background-color: #f6f6f6">
                                <div class="col-sm-2" >
                                    @php
                                        $products = DB::table('products')->where('id',$each_id_bill->id_product)->get();
                                        foreach ($products as $products) {
                                            $image_product = $products->image;
                                            $id_product = $products->id;
                                        }
                                    @endphp
                                    <a href="{{ route('chitietsanpham',$id_product) }}"><img src="{{ $image_product }}" alt="loading ... " height='60px'></a>
                                </div>
                                <div class="col-sm-5" style="padding: 20px 0px;">
                                    <a href="{{ route('chitietsanpham',$id_product) }}">
                                    @php
                                        $products = DB::table('products')->where('id',$each_id_bill->id_product)->get();
                                        foreach ($products as $products) {
                                            echo $products->name;
                                        }
                                    @endphp
                                    </a>
                                </div>
                                <div class="col-sm-2" style="padding: 20px 15px;">{{ $each_id_bill->quantity }}</div>
                                <div class="col-sm-3" style="padding: 20px 15px;    color: orange;">{{ $each_id_bill->unit_price }}
                                        <span>VND</span>
                                </div>
                            </div>
                        @endforeach
            {{-- ------------ --}}
                            <div class="row" style="padding: 10px;background-color:;font-style: italic;">
                                <div class="col-sm-2" style="font-weight:600">Ghi chú :</div>
                                <div class="col-sm-10">
                                    @php
                                        $bills = DB::table('bills')->where('id',$each_id_bill->id_bill)->get();
                                        foreach ($bills as $bills) {
                                            echo $bills->note;
                                        }
                                    @endphp
                                </div>
                            </div>
                    </div>
                    @endforeach
                </div>
        @endsection

@else
    <script>window.location = "http://localhost:8080/shopphone/public/login";</script>
@endif
<style>

</style>


