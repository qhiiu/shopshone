<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Bill;
use App\Bill_detail;

class Bill_detailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Bill_detail::paginate(10);
        return view('admin.bill_details.index', ['list' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo view('admin.bill_details.create');
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
            'id_bill' => 'required|numeric',
            'id_product' => 'required|numeric',
            'quantity' => 'required|numeric',
            'unit_price' => 'required|numeric',
        ]);

        $bill = new Bill_detail();
            $bill->id_bill = $request->id_bill;
            $bill->id_product = $request->id_product;
            $bill->quantity = $request->quantity;
            $bill->unit_price = $request->unit_price;
            $bill->save();

        return redirect()->route('bill_details.create')->with('success','insert new record success');
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
        $Customer = Bill_detail::find($id);
        $list = DB::table('bill_details')->where('id',$id)->get();
        echo view('admin.bill_details.edit',compact('id','list'));    
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
            'id_bill' => 'required',
            'id_product' => 'required',
            'quantity'=>'required',
            'unit_price' => 'required',
        ]);

        $Customer = Bill_detail::find($id);
        $Customer->id_bill = $request->id_bill;
        $Customer->id_product = $request->id_product;
        $Customer->quantity = $request->quantity;
        $Customer->unit_price = $request->unit_price;
        $Customer->save();
        return redirect()->route('bill_details.index')->with('success','update record success ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bill = Bill_detail::find($id);
        $bill->delete();

        return redirect(url()->previous())->with('success','Delete success');
    }
}
