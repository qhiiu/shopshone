<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
class ThongtincanhanController extends Controller
{
   public function index()
    {
      return view('thongtincanhan.show');
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
}
