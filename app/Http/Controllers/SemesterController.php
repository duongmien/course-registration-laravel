<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Semester;


class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_all_semester = Semester::all();
        $manager_semester = view('admin.semester.list')->with('data_all_semester', $data_all_semester);
        return view('adminlayout')->with('admin.semester.list', $manager_semester);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.semester.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $semester = new Semester();
        $semester->name = $request->name;
        $semester->start_date = $request->start_date;
        $semester->end_date = $request->end_date;
        $semester->is_deleted = 0;
        $semester->save();
        Session::put('message', 'Add successful');
        return Redirect::to('/semester');
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
        $data_semester = Semester::findOrFail($id);
        $manager_semester = view('admin.semester.edit')->with('data_semester', $data_semester);
        return view('adminlayout')->with('admin.semester.edit', $manager_semester);
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
        $semester = Semester::findOrFail($id);
        $semester->name = $request->name;
        $semester->start_date = $request->start_date;
        $semester->end_date = $request->end_date;
        $semester->is_deleted = 0;
        $semester->save();
        Session::put('message', 'Update successful');
        return Redirect::to('/semester');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $semester = Semester::findOrFail($id);
        $semester::deleted();
        Session::put('message', 'Delete successful');
        return Redirect::to('/semester');
    }
}
