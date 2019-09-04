<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = DB::table('products')->paginate(12);
        return view('admin.products.index', ['list' => $list]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_type_products = DB::table('type_products')->paginate();
        echo view('admin.products.create',['list_type_products' => $list_type_products]);
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
            'name' => 'required|unique:products,name',
            'id_type' => 'required',
            'description' => '',
            'unit_price' =>'required|numeric',
            'promotion_price' => 'required|numeric',
            'unit' => 'required|string',
            'new' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);
        //Create image in folder
        $image = $request->file('image');
        $image_name = 'source/image/'.'dienthoai'.'/'.time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('source/image/dienthoai'),$image_name);

        //Create record in DB
        $product = new Product();
        $product->name = $request->name;
        $product->id_type = $request->id_type;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->image = $image_name;
        $product->unit = $request->unit;
        $product->new = $request->new;
        $product->save();
        return redirect()->route('products.create')->with('success','insert new record success');
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
        $products = Product::find($id);
        $list_type_products = DB::table('type_products')->paginate();
        $list = DB::table('products')->where('id',$id)->get();
        // dd($list);
        echo view('admin.products.edit',compact('id','list_type_products','list'));
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
            'name' => 'required|unique:products,name,'.$id,
            'id_type' => 'required',
            'description' => '',
            'unit_price' =>'required|numeric',
            'promotion_price' => 'required|numeric',
            'unit' => 'required|string',
            'new' => 'required',
            'image'=>'max:2048|mimes:jpg,jpeg,png,gif'

        ]);

        if($request->file('image') == null){
            $product = Product::find($id);
            $product->name = $request->name;
            $product->id_type = $request->id_type;
            $product->description = $request->description;
            $product->unit_price = $request->unit_price;
            $product->promotion_price = $request->promotion_price;
            $product->unit = $request->unit;
            $product->new = $request->new;
            $product->save();
            return redirect()->route('products.index')->with('success','update record success');
        }else{

        //delete old image to create new image
        $old_image = DB::table('products')->where('id',$id)->get();
        $old_image_path = public_path($old_image[0]->image);
        if(file_exists($old_image_path) && is_file($old_image_path)){
            unlink($old_image_path);
        }

        //Create new image in folder
        $image = $request->file('image');
        $image_name = 'source/image/'.'dienthoai'.'/'.time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('source/image/dienthoai'),$image_name);

        //Create record in DB
        $product = Product::find($id);
        $product->name = $request->name;
        $product->id_type = $request->id_type;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->image = $image_name;
        $product->unit = $request->unit;
        $product->new = $request->new;
        $product->save();
        return redirect()->route('products.index')->with('success','update record success');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete image in folder
        $old_image = DB::table('products')->where('id',$id)->get();
        $old_image_path = public_path($old_image[0]->image);
        if(file_exists($old_image_path) && is_file($old_image_path)){
            unlink($old_image_path);
        }

        //delete record in DB
        $Product = Product::find($id);
        $Product->delete();
        return redirect(url()->previous())->with('success','Delete success');
    }

    public function type_product($id_type){
        $list = DB::table('products')->where('id_type',$id_type)->paginate(12);
        return view('admin.products.index', ['list' => $list]);
    }

}
