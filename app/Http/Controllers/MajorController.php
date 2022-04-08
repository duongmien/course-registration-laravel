<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Major;
use App\Faculty;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_all_major = Major::with('faculty')->where('major.is_deleted', 0)->get();
        $manager_major = view('admin.major.list')->with('data_all_major', $data_all_major);
        return view('adminlayout')->with('admin.major.list', $manager_major);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_faculty = Faculty::orderBy('id', 'desc')->get();
        $manager_major = view('admin.major.add')->with('data_faculty', $data_faculty);
        return view('adminlayout')->with('admin.major.add', $manager_major);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $major = new Major();
        $major->name = $request->name;
        $major->faculty_id = $request->faculty_id;
        $major->is_deleted = 0;
        $major->save();
        Session::put('message', 'Add successful');
        return Redirect::to('/major');
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

        $data_faculty = Faculty::orderBy('id', 'desc')->get();
        $data_major = Major::findOrFail($id);
        $manager_major = view('admin.major.edit')->with('data_major', $data_major)->with('data_faculty', $data_faculty);
        return view('adminlayout')->with('admin.major.edit',  $manager_major);
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
        $major = Major::findOrFail($id);
        $major->name = $request->name;
        $major->faculty_id = $request->faculty_id;
        $major->is_deleted = 0;
        $major->save();
        Session::put('message', 'Update successful');
        return Redirect::to('/major');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $major = Major::findOrFail($id);
        $major->delete();
        Session::put('message', 'Delete successful');
        return Redirect::to('/major');
    }
}
