<?php

namespace App\Http\Controllers;

use App\ClassSection;
use App\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AllCourseController extends Controller
{
    public function getAllCourse()
    {
        $data_all_course = ClassSection::select(DB::raw('COUNT(class_section_id) as count_q'), 'class_section.*', 'c.qualtity as course_qualtity', 'c.name as course_name', 's.name as s_name')
            ->join('course as c', 'c.id', '=', 'class_section.course_id')
            ->join('semester as s', 's.id', '=', 'class_section.semester_id')
            ->leftJoin('course_regis as cr', 'cr.class_section_id', '=', 'class_section.id')
            ->groupBy('class_section.id')
            ->orderBy('class_section.day', 'asc')
            ->get();
        $data_all_semester = Semester::all();
        return view('page.allcourse')->with('data_all_course', $data_all_course)
            ->with('data_all_semester', $data_all_semester);
    }
}
