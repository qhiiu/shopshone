<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Slides;
use Faker\Provider\File;

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Slides::paginate(10);
        return view('admin.slides.index', ['list' => $list]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo view('admin.slides.create');
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
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'updated_at' =>'',
            'created_at' => ''
        ]);


        $image = $request->file('image');
        $image_name = 'source/image/'.'slide'.'/'.time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('source/image/slide'),$image_name);

        $Slides = new Slides();
        $Slides->image = $image_name;
        $Slides->save();
        return redirect()->route('slides.create')->with('success','insert new record success');
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
        $Slides = Slides::find($id);
        $list = DB::table('slide')->where('id',$id)->get();
        return view('admin.slides.edit',compact('id','list'));
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
            'image'=>'mimes:jpg,jpeg,png,gif'
        ]);

        if($request->file('image') == null){
            return redirect()->route('slides.index')->with('success','update record success');
        }else{
            //delete old image to create new image
            $old_image = DB::table('slide')->where('id',$id)->get();
            $old_image_path = public_path($old_image[0]->image);
            if(file_exists($old_image_path) && is_file($old_image_path)){
                unlink($old_image_path);
            }

            //Create new image in folder
            $image = $request->file('image');
            $image_name = 'source/image/'.'slide'.'/'.time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('source/image/slide'),$image_name);

            //Create record in DB
            $Slides = Slides::find($id);
            $Slides->image = $image_name;
            $Slides->save();
            return redirect()->route('slides.index')->with('success','update record success');
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
        $old_image = DB::table('slide')->where('id',$id)->get();
        $old_image_path = public_path($old_image[0]->image);
        if(file_exists($old_image_path) && is_file($old_image_path)){
            unlink($old_image_path);
        }

        //delete record in DB
        $Slides = Slides::find($id);
        $Slides->delete();
        ;
        return redirect(url()->previous())->with('success','Delete success');
    }
}
