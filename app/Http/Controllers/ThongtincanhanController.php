<?php
namespace App\Http\Controllers;

use App\Bill_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
class ThongtincanhanController extends Controller
{
   public function index()
    {
      return view('thongtincanhan.show');
    }
    public function show($id)
    {
        return 'show';
    }
    public function _edit()
    {
      return view('thongtincanhan.edit');
    }
    public function update(Request $request, $id)
    {
      $this->validate($request,[
         'phone' => '',
         'address' =>'',
         'name' => 'required',
         'gender'=>'required',
         'dob'=>''
      ],[
          'name.required' => 'Họ tên không được trống !',
          'gender.required' => 'mời bạn chọn giới tính'
      ]);
     $user = User::find($id);
     $user->phone = $request->phone;
     $user->address = $request->address;
     $user->name = $request->name;
     $user->gender = $request->gender;
     $user->dob = $request->dob;
     $user->save();
     return redirect()->route('thongtincanhan.index')->with('success','update record success ');
    }
    // public function destroy($id)
    // {
    //     $Slides = Slides::find($id);
    //     $Slides->delete();
    //     ;
    //     return redirect(url()->previous())->with('success','Delete success');
    // }

    public function list_bills(){
      //get id_bill
      if(\Auth::user() !== null){
        $id_bill = DB::table('bill_details')->where('id_user',\Auth::user()->id)->distinct()->orderBy('id_bill','desc')->get('id_bill');
        return view('thongtincanhan.list_bills',compact('id_bill'));
      }else{
          return redirect()->route('login');
      }
    }
}
