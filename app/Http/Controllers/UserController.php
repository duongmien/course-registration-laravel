<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassModel;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_all_user = User::join('class', 'class.id', '=', 'user.class_id')
            ->join('role', 'role.id', '=', 'user.role_id')
            ->select('user.*', 'class.name as class_name', 'role.name as role_name')
            ->get();

        $manager_user = view('admin.user.list')->with('data_all_user', $data_all_user);
        return view('adminlayout')->with('admin.user.list', $manager_user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_class = ClassModel::orderBy('id', 'desc')->get();
        $data_role = DB::table('role')->orderBy('id', 'desc')->get();
        $manager_user = view('admin.user.add')->with('data_class', $data_class)->with('data_role', $data_role);
        return view('adminlayout')->with('admin.user.add', $manager_user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['DoB'] = $request->DoB;
        $data['sex'] = $request->sex;
        $data['class_id'] = $request->class_id;
        $data['username'] = $request->username;
        $data['password'] = bcrypt($request->password);
        $data['address'] = $request->address;
        $data['role_id'] = $request->role_id;
        DB::table('user')->insert($data);
        Session::put('message', 'Add successful');
        return Redirect::to('/user');
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
        $data_user = User::findOrFail($id);
        $data_class = ClassModel::orderBy('id', 'desc')->get();
        $data_role = DB::table('role')->orderBy('id', 'desc')->get();
        $manager_user = view('admin.user.edit')->with('data_user', $data_user)->with('data_class', $data_class)->with('data_role', $data_role);
        return view('adminlayout')->with('admin.user.edit', $manager_user);
    }
    public function edit2($id)
    {
        return 1;
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
        $data = array();
        $data['name'] = $request->name;
        $data['DoB'] = $request->DoB;
        $data['sex'] = $request->sex;
        $data['class_id'] = $request->class_id;
        $data['username'] = $request->username;
        $data['password'] = bcrypt($request->password);
        $data['address'] = $request->address;
        $data['role_id'] = $request->role_id;
        DB::table('user')->where('id', $id)->update($data);
        Session::put('message', 'Update successful');
        return Redirect::to('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('user')->where('id', $id)->delete();
        Session::put('message', 'Delete successful');
        return Redirect::to('/user');
    }
}
