<?php

namespace App\Http\Controllers\Backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;


class SchoolSubjectController extends Controller
{
    public function ViewSubject()
    {
        $data['allData'] = SchoolSubject::all();
        return view('backend.setup.school_subject.view_school_subject', $data);
    }

    public function SubjectAdd()
    {
        return view('backend.setup.school_subject.add_school_subject');
    }

    public function SubjectStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:school_subjects,name',

        ]);

        $data = new SchoolSubject();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'School Subject Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('school.subject.view')->with($notification);
    }
}
