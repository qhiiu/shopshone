<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $checkAdmin = session('checkAdmin');
        // if($checkAdmin == true){
            $list = User::paginate(10);
            return view('admin.users.index', ['list' => $list]);
        // }else{
        //     return redirect()->route('login');
        // }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'role' => '',
            'name' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email|unique:users,email',
            'phone' => '',
            'address' =>'',
            'remember_token' => '',
            'gender'=>'required',
            'dob'=>''
        ]);
        $user = new User();
        $user->role = $request->role;
        $user->name = $request->name;
            if($request->role == null){
                $password_encode =  \Hash::make($request->password);
            }
            if($request->role == 'admin'){
                $password_encode =  md5($request->password);
            }
            $user->password = $password_encode;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->dob = $request->dob;
        $user->remember_token = $request->remember_token;
        $user->save();
        return redirect()->route('users.create')->with('success','insert new record success ');
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
        $user = User::find($id);
        $list = DB::table('users')->where('id',$id)->get();
        echo view('admin.users.edit',compact('id','list'));
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
        return redirect()->route('users.index')->with('success','update record success ');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect(url()->previous())->with('success','Delete success');
    }
}
