<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Slides;

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
            'link' => '',
            'image' =>'required',
            'updated_at' =>'',
            'created_at' => ''
        ]);

        $Slides = new Slides();

        $Slides->link = $request->link;
        $Slides->image = $request->image;

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
            'link' => '',
            'image' => 'required',
        ]);

        $Slides = Slides::find($id);
        $Slides->link = $request->link;
        $Slides->image = $request->image;

        $Slides->save();

        return redirect()->route('slides.index')->with('success','update record success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Slides = Slides::find($id);
        $Slides->delete();

        ;
        return redirect(url()->previous())->with('success','Delete success');

    }
}
