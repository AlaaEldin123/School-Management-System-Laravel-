<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public  function StudentView()
    {
        $data['allDate'] = StudentClass::all();
        return view('backend.setup.student_class.view_class', $data);
    }
}
