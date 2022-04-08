<?php

namespace App\Http\Controllers;

use App\Semester;
use App\CourseRegis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();

class ScheduleController extends Controller
{
    public function getSchedule()
    {
        $id_user = Auth::id();
        $data_currentsemester = Semester::orderBy('id', 'desc')
            ->limit(1)->get();
        $id_se = $data_currentsemester->id;
        $data_schedule = CourseRegis::select('cls.*,cls.id as cls_id', 'c.qualtity as course_qualtity', 'c.name as course_name', 's.name as s_name')
            ->join('class_section as cls', 'cls.id', '=', 'course_regis.class_section_id')
            ->join('semester as s', 's.id', '=', 'cls.semester_id')
            ->join('course as s', 's.id', '=', 'cls.course_id')
            ->where([
                ['course_regis.user_id', '=', $id_user],
                ['s.id', '=', $id_se],
            ])
            ->orderBy('cls.day', 'asc')
            ->get();

        return view('page.schedule')->with('data_currentsemester', $data_currentsemester)
            ->with('data_schedule', $data_schedule);
    }
}
