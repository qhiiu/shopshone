<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Customer::paginate(10);
        return view('admin.customer.index', ['list' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'gender' => 'required',
            'email' => '',
            'address'=>'',
            'phone_number' => '',
            'note' => ''
        ]);

        $Customer = new Customer();
        $Customer->name = $request->name;
        $Customer->gender = $request->gender;

        $Customer->email = $request->email;
        $Customer->address = $request->address;
        $Customer->phone_number = $request->phone_number;
        $Customer->note = $request->note;

        $Customer->save();

        return redirect()->route('customer.create')->with('success','insert new record success ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Customer = Customer::find($id);
        $list = DB::table('customer')->where('id',$id)->get();
        echo view('admin.customer.edit',compact('id','list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name' => 'required',
            'gender' => 'required',
            // 'email' => '',
            'address'=>'',
            'phone_number' => '',
            'note' => ''
        ]);

        $Customer = Customer::find($id);
        $Customer->name = $request->name;
        $Customer->gender = $request->gender;
        // $Customer->email = $request->email;
        $Customer->address = $request->address;
        $Customer->phone_number = $request->phone_number;
        $Customer->note = $request->note;

        $Customer->save();

        return redirect()->route('customer.index')->with('success','update record success ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Customer = Customer::find($id);
        $Customer->delete();

        return redirect(url()->previous())->with('success','Delete success');
    }
}
