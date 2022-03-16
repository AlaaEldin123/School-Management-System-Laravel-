<?php

namespace App\Http\Controllers\Backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use App\Models\AssignSubject;

class AssignSubjectController extends Controller
{
    public function ViewAssignSubject()
    {
        $data['allData'] = AssignSubject::all();
        return view('backend.setup.assign_subject.view_assign_subject', $data);
    }

    public function AddAssignSubject()
    {
        $data['subjects'] = SchoolSubject::all();
        $data['classess'] =   StudentClass::all();
        return view('backend.setup.assign_subject.add_assign_subject', $data);
    }
}
