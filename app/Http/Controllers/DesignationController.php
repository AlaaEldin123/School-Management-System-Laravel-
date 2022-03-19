<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function ViewDesignation()
    {
        $data['allData'] = Designation::all();
        return view('backend.setup.designation.view_designation', $data);
    }

    public function DesignationAdd()
    {
        return view('backend.setup.designation.add_designation');
    }
    public function DesignationStore(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|unique:designations,name',

        ]);

        $data = new Designation();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Designation Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('designation.view')->with($notification);
    }
}
