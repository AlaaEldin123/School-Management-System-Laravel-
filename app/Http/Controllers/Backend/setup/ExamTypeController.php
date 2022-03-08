<?php

namespace App\Http\Controllers\Backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;

class ExamTypeController extends Controller
{
    public function ViewExamType()
    {
        $data['allData'] = ExamType::all();
        return view('backend.setup.exam_type.view_exam_type', $data);
    }

    public function ExamTypeAdd()
    {
        return view('backend.setup.exam_type.add_exam_type');
    }

    public function ExamTypeStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:exam_types,name',

        ]);

        $data = new ExamType();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Exam Type Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('exam.type.view')->with($notification);
    }
}
