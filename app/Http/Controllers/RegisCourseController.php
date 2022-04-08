<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\ClassSection;
use App\Semester;



class RegisCourseController extends Controller
{
    public function getCourseInRegis()
    {
        $data_all_course = ClassSection::select(DB::raw('COUNT(class_section_id) as count_q'), 'class_section.*', 'c.qualtity as course_qualtity', 'c.name as course_name', 's.name as s_name')
            ->join('course as c', 'c.id', '=', 'class_section.course_id')
            ->join('semester as s', 's.id', '=', 'class_section.semester_id')
            ->leftJoin('course_regis as cr', 'cr.class_section_id', '=', 'class_section.id')
            ->groupBy('class_section.id')
            ->orderBy('class_section.day', 'asc')
            ->get();
        $data_allsemester = Semester::all();
        $data_currentsemester = Semester::latest('id')->first();
        return view('page.allcourse')->with('data_all_course', $data_all_course)
            ->with('data_allsemester', $data_allsemester)->with('data_currentsemester', $data_currentsemester);
    }
}
