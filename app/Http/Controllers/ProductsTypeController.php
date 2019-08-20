<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;
use Illuminate\Support\Facades\DB;

class ProductsTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = DB::table('type_products')->paginate(12);
        return view('admin.productsType.index', ['list' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo view('admin.productsType.create');
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
            'description' => '',
            'image' => '',
        ]);

        $ProductType = new ProductType();
        $ProductType->name = $request->name;
        $ProductType->description = $request->description;
        $ProductType->image = $request->image;

        $ProductType->save();

        return redirect()->route('productsType.create')->with('success','insert new record success');
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
        $products = ProductType::find($id);
        $list = DB::table('type_products')->where('id',$id)->get();
        echo view('admin.productsType.edit',compact('id','list'));

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
            'description' => '',
            'image' => '',
        ]);

        $ProductType = ProductType::find($id);
        $ProductType->name = $request->name;
        $ProductType->description = $request->description;
        $ProductType->image = $request->image;

        $ProductType->save();

        return redirect()->route('productsType.index')->with('success','update record success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ProductType = ProductType::find($id);
        $ProductType->delete();

        return redirect(url()->previous())->with('success','Delete success');
    }
}
