@if (Auth::user() !== null)

        @extends('thongtincanhan.master')
        @section('contentInfo')
                <div style="display:block;height:250px;    font-size: larger;">
                    <div style="font-size:50px;">Danh sách đơn hàng</div>
                    <div class="space40">&nbsp;</div>                  

                    @foreach ($id_bill as $l)
                    <div class="row" style="border:1px solid orange;margin-bottom:20px;" >
                            <div class="row" style="border-bottom: 1px solid #ccc; background: antiquewhite;padding: 10px;">
                                <div class="col-sm-5">Mã đơn hàng : 
                                    <span>#{{ $l->id_bill }}</span>
                                </div>
                                <div class="col-sm-7">Ngày :
                                    <span>
                                        @php
                                            $bills = DB::table('bills')->where('id',$l->id_bill)->get();
                                            foreach ($bills as $bills) {
                                                echo $bills->date_order;
                                            }
                                        @endphp
                                    </span>
                                </div>                      
                            </div>
                            <div class="row" style="    background: cornsilk;    font-weight: 700; padding: 10px;">
                                <div class="col-sm-7" >Sản phẩm</div>
                                <div class="col-sm-2">Số lượng</div>
                                <div class="col-sm-3">Giá 1 sản phẩm</div>
                            </div>
                            
            {{-- ------------ --}}
                        @php
                            $each_id_bill = DB::table('bill_details')->where('id_bill',$l->id_bill)->get();                                 
                        @endphp
                        @foreach ($each_id_bill as $each_id_bill)
                            <div class="row" style="padding: 5px;">
                                <div class="col-sm-2" >
                                    @php
                                        $products = DB::table('products')->where('id',$each_id_bill->id_product)->get();
                                        foreach ($products as $products) {
                                            $image_product = $products->image;
                                        }
                                    @endphp
                                    <img src="{{ $image_product }}" alt="loading ... " height='60px'>
                                </div>
                                <div class="col-sm-5" >
                                    @php
                                        $products = DB::table('products')->where('id',$each_id_bill->id_product)->get();
                                        foreach ($products as $products) {
                                            echo $products->name;
                                        }
                                    @endphp
                                </div>
                                <div class="col-sm-2">{{ $each_id_bill->quantity }}</div>
                                <div class="col-sm-3">{{ $each_id_bill->unit_price }}</div>
                            </div>
                        @endforeach
            {{-- ------------ --}}
                            <div class="row">
                                <div class="col-sm-2">Ghi chú</div>
                                <div class="col-sm-10">
                                        @php
                                            $bills = DB::table('bills')->where('id',$each_id_bill->id_bill)->get();
                                            foreach ($bills as $bills) {
                                                echo $bills->note;
                                            }
                                        @endphp
                                    </div>                                    
                            </div>
                            <div class="row" >
                                <div class="col-sm-8"></div>
                                <div class="col-sm-4">
                                    Tổng tiền
                                    <span>
                                        @php
                                            $bills = DB::table('bills')->where('id',$l->id_bill)->get();
                                            foreach ($bills as $bills) {
                                                echo $bills->total;
                                            }
                                        @endphp
                                    </span>
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


