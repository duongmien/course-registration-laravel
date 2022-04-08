<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\ClassModel;
use App\Major;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_all_class = ClassModel::with('major')->where('class.is_deleted', 0)->paginate(2);
        $manager_class = view('admin.class.list')->with('data_all_class', $data_all_class);
        return view('adminlayout')->with('admin.class.list', $manager_class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_major = Major::orderBy('id', 'desc')->get();
        $manager_class = view('admin.class.add')->with('data_major', $data_major);
        return view('adminlayout')->with('admin.class.add', $manager_class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $class = new ClassModel();
        $class->name = $request->name;
        $class->major_id = $request->major_id;
        $class->is_deleted = 0;
        $class->save();
        Session::put('message', 'Add successful');
        return Redirect::to('/class');
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
        $data_major = Major::orderBy('id', 'desc')->get();
        $data_class = ClassModel::findOrFail($id);
        $data_class_2 = ClassModel::findOrFail($id);
        $manager_class = view('admin.class.edit')->with('data_class', $data_class)->with('data_major', $data_major);
        return view('adminlayout')->with('admin.class.edit',  $manager_class);
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
        $class = ClassModel::findOrFail($id);
        $class->name = $request->name;
        $class->major_id = $request->major_id;
        $class->is_deleted = 0;
        $class->save();
        Session::put('message', 'Update successful');
        return Redirect::to('/class');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = ClassModel::findOrFail($id);
        $class->delete();
        Session::put('message', 'Delete successful');
        return Redirect::to('/class');
    }
}
