<?php

namespace App\Http\Controllers;

use App\Faculty;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_all_faculty = Faculty::all();
        $manager_faculty = view('admin.faculty.list')->with('data_all_faculty', $data_all_faculty);
        return view('adminlayout')->with('admin.faculty.list', $manager_faculty);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faculty.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faculty = new Faculty();
        $faculty->name =  $request->name;
        $faculty->save();
        // Thông qua 1 thể hiện của Request
        $request->session()->put('message', 'Add successful');
        return Redirect::to('/faculty');
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
        $data_faculty = Faculty::findOrFail($id);
        $manager_faculty = view('admin.faculty.edit')->with('data_faculty', $data_faculty);
        return view('adminlayout')->with('admin.faculty.edit', $manager_faculty);
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
        $faculty = Faculty::findOrFail($id);
        $faculty->name =  $request->name;
        $faculty->save();
        $request->session()->put('message', 'Upadate successful');
        return Redirect::to('/faculty');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faculty = Faculty::findOrFail($id);
        $faculty->delete();
        Session::put('message', 'Delete successful');
        return Redirect::to('/faculty');
    }
}
