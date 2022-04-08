<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Course;
use App\Http\Requests\CourseRequest;
use App\Major;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_all_course = Course::with('major')->where('course.is_deleted', 0)->get();
        $manager_course = view('admin.course.list')->with('data_all_course', $data_all_course);
        return view('adminlayout')->with('admin.course.list', $manager_course);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_major = Major::orderBy('id', 'desc')->get();
        $manager_course = view('admin.course.add')->with('data_major', $data_major);
        return view('adminlayout')->with('admin.course.add', $manager_course);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $course = new Course();
        $course->name = $request->name;
        $course->qualtity = $request->qualtity;
        $course->major_id = $request->major_id;
        $course->is_deleted = 0;
        $course->save();
        Session::put('message', 'Add successful');
        return Redirect::to('/course');
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
        $data_course = Course::findOrFail($id);
        $data_major = Major::orderBy('id', 'desc')->get();
        $manager_course = view('admin.course.edit')->with('data_course', $data_course)->with('data_major', $data_major);
        return view('adminlayout')->with('admin.course.edit',  $manager_course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->name = $request->name;
        $course->qualtity = $request->qualtity;
        $course->major_id = $request->major_id;
        $course->is_deleted = 0;
        $course->save();
        Session::put('message', 'Update successful');
        return Redirect::to('/course');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        Session::put('message', 'Delete successful');
        return Redirect::to('/course');
    }
}
