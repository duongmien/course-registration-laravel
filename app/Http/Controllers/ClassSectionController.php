<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\ClassSection;
use App\Course;
use App\Semester;

class ClassSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_all_course = ClassSection::with('course', 'semester')->get();
        $manager_class_section = view('admin.class_section.list')->with('data_all_course', $data_all_course);
        return view('adminlayout')->with('admin.class_section.list', $manager_class_section);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_course = Course::orderBy('id', 'desc')->get();
        $data_semester = Semester::orderBy('id', 'desc')->get();
        $manager_class_section = view('admin.class_section.add')->with('data_course', $data_course)->with('data_semester', $data_semester);
        return view('adminlayout')->with('admin.class_section.add', $manager_class_section);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $class_section = new ClassSection();
        $class_section->course_id = $request->course_id;
        $class_section->quantity = $request->quantity;
        $class_section->name_teacher = $request->name_teacher;
        $class_section->classroom = $request->classroom;
        $class_section->day = $request->day;
        $class_section->period = $request->period;
        $class_section->start_date = $request->start_date;
        $class_section->semester_id = $request->semester_id;
        $class_section->save();
        Session::put('message', 'Add successful');
        return Redirect::to('/class_section');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_detail = ClassSection::with('course', 'semester')->findorFail($id);
        $data_count_qualtity = ClassSection::select(DB::raw('COUNT(class_section_id) as count_q'))
            ->join('course_regis as cr', 'cr.class_section_id', '=', 'class_section.id')
            ->where('class_section.id', '=', $id)
            ->groupBy('class_section.id')
            ->get();
        $data_student_regis = ClassSection::select('u.*', 'c.name as class_name')
            ->join('course_regis as cr', 'cr.class_section_id', '=', 'class_section.id')
            ->join('user as u', 'cr.user_id', '=', 'u.id')
            ->join('class as c', 'c.id', '=', 'u.class_id')
            ->where('class_section.id', '=', $id)
            ->get();
        $manager_class_section = view('admin.class_section.detail')->with('data_count_qualtity', $data_count_qualtity)->with('data_student_regis', $data_student_regis)->with('data_detail', $data_detail);
        return view('adminlayout')->with('admin.class_section.detail', $manager_class_section);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_course = Course::orderBy('id', 'desc')->get();
        $data_semester = Semester::orderBy('id', 'desc')->get();
        $data_class_section = ClassSection::findOrFail($id);
        $manager_class_section = view('admin.class_section.edit')->with('data_class_section', $data_class_section)->with('data_course', $data_course)->with('data_semester', $data_semester);
        return view('adminlayout')->with('admin.class_section.edit',  $manager_class_section);
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
        $class_section = ClassSection::findOrFail($id);
        $class_section->course_id = $request->course_id;
        $class_section->quantity = $request->quantity;
        $class_section->name_teacher = $request->name_teacher;
        $class_section->classroom = $request->classroom;
        $class_section->day = $request->day;
        $class_section->period = $request->period;
        $class_section->start_date = $request->start_date;
        $class_section->semester_id = $request->semester_id;
        $class_section->save();
        Session::put('message', 'Update successful');
        return Redirect::to('/class_section');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class_section = ClassSection::findOrFail($id);
        $class_section->delete();
        Session::put('message', 'Delete successful');
        return Redirect::to('/class_section');
    }
}
