<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\News;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = News::paginate(10);
        return view('admin.news.index', ['list' => $list]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo view('admin.news.create');
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
            'title' => 'required',
            'content' => 'required',
            'updated_at' =>'',
            'created_at' => '',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        //Create image in folder
        $image = $request->file('image');
        $image_name = 'source/image/'.'tintuc'.'/'.time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('source/image/tintuc'),$image_name);

        //Create record in DB
        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;
        $news->image = $image_name;
        $news->save();
        return redirect()->route('news.create')->with('success','insert new record success');
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
        $news = News::find($id);
        $list = DB::table('news')->where('id',$id)->get();
        return view('admin.news.edit',compact('id','list'));
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
            'title' => 'required',
            'content' => 'required',
            'image'=>'max:2048|mimes:jpg,jpeg,png,gif'
        ]);

        if($request->file('image') == null){
            $news = News::find($id);
            $news->title = $request->title;
            $news->content = $request->content;
            $news->save();
            return redirect()->route('news.index')->with('success','update record success');
        }else{
            
        //delete old image to create new image
        $old_image = DB::table('news')->where('id',$id)->get();
        $old_image_path = public_path($old_image[0]->image);
        if(file_exists($old_image_path) && is_file($old_image_path)){
            unlink($old_image_path);
        }

        //Create new image in folder
        $image = $request->file('image');
        $image_name = 'source/image/'.'tintuc'.'/'.time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('source/image/tintuc'),$image_name);

        //Create new record in DB
        $news = News::find($id);
        $news->title = $request->title;
        $news->content = $request->content;
        $news->image = $image_name;
        $news->save();
        return redirect()->route('news.index')->with('success','update record success');
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
        $old_image = DB::table('news')->where('id',$id)->get();
        $old_image_path = public_path($old_image[0]->image);
        if(file_exists($old_image_path) && is_file($old_image_path)){
            unlink($old_image_path);
        }

        //delete record in DB
        $news = News::find($id);
        $news->delete();
        return redirect(url()->previous())->with('success','Delete success');
    }

}
