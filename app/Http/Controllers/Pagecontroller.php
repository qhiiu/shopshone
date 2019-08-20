<?php

namespace App\Http\Controllers;

use App\Slides;
use App\Product;
use App\ProductType;
use App\Cart;
use App\Customer;
use App\Bill;
use Session;

use Illuminate\Http\Request;
 //use Symfony\Component\HttpFoundation\Session\Session;

class Pagecontroller extends Controller
{
    public function getIndex(){
        $slide = Slides::all();//Slides là tên lớp trong model slide

        $new_product = Product::where('new',1)->paginate(4);//phaan trang
        $sanpham_khuyenmai= Product::where('promotion_price','<>',0)->paginate(8);
        // $sanpham_khuyenmai= Product::where('new',0)->paginate(8);
        //  return view('page/trangchu',['slide'=>$slide]);
        //  return view('page/trangchu',['new_product'=>$new_product]);
        return view('page/trangchu',compact('slide','new_product','sanpham_khuyenmai'));
    }
    public function getLoaiSp($type){
        $sp_theoloai = Product::where('id_type',$type)->get();
        $sp_khac= Product::where('id_type','<>',$type)->paginate();
        $loai =ProductType::all();
        $loai_sp=ProductType::where ('id',$type)->first();
        return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
     }
     public function getChitiet($id){
         $sanpham=Product::where('id',$id)->first();//moi sp có 1 id duy nhat
         $sp_tt= Product::where('id_type',$sanpham->id_type)->paginate(3);
        return view('page.chitiet_sp',compact('sanpham','sp_tt'));
     }
     public function getLienhe(){
        return view('page.lienhe');
     }
     public function getGioithieu(){
        return view('page.gioithieu');
     }
     public function getAddtoCart(Request $req, $id){
         $product=Product::find($id);//tìm xem sản phẩm có id hay không
         $oldCart = Session('cart')?Session::get('cart'):null;//ktra xem session có sp chưa
         $cart = new Cart($oldCart);//tạo gio mới
        $cart -> add ($product , $id);//add vào giỏ cũ nữa
        $req->session()->put('cart',$cart);
        // return Session::get('cart');
        return redirect()->back();
     }
     public function getMuahang(){
        return view('page.muahang');
     }
    public function getlogin(){
        return view('page.dangnhap');
     }
     public function getsigup(){
        return view('page.dangki');
     }
     public function getDelItemcart($id){
         $oldCart=Session::has('cart')?Session::get('cart'):null;
         $cart=new Cart($oldCart);
         $cart ->removeItem($id);
         if(count($cart->items)>0){
            Session::put('cart',$cart);
         }else{
             Session::forget('cart');
         }

         return redirect()->back();

     }
     public function getCheckout(){
         if(Session::has('cart')){
             $oldCart=Session::get('cart');
             $cart=new Cart($oldCart);
             return view('page.dathang',['product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
         }
         else{
            return view('page.dathang');
          }

     }
     public function getpostCheckout( Request $req){
         $cart=Session::get('cart');
         $customer=new Customer;
         $customer ->name=$req->name;
         $customer ->gender=$req->gender;
         $customer ->email=$req->email;
         $customer ->address=$req->address;
         $customer ->phone_number=$req->phone;
         $customer ->note=$req->notes;
         $customer->save();
         $bill=new Bill;

         $bill->id_customer=$customer->id_customer;
         $bill->date_order=date('Y-m-d');
        $bill->total=$cart->totalPrice;
        $bill->payment=$req->payment_method;
        $bill ->note=$req->notes;
        $bill->id_product=$customer->id_product;
        $bill->quantity=$customer->quantity;
        $bill->unit_price=$customer->unit_price;
        $bill->save();
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
        // return view('page.dathang');
    }

}
