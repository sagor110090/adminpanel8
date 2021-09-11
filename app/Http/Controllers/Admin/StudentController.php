<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Session;
use Helper;
use Storage;

class StudentController extends Controller
{

     public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $student = Student::where('Name', 'LIKE', "%$keyword%")
                ->orWhere('Address', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $student = Student::latest()->paginate($perPage);
        }
         
        return view('admin.student.index', compact('student'));
    }


    public function create()
    {
       
        return view('admin.student.create');
    }


    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Student::create($requestData);
        Session::flash('success','Successfully Saved!');
        
        return redirect('admin/student');
    }


    public function show($id)
    {
        $student = Student::findOrFail($id);
        
        return view('admin.student.show', compact('student'));
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        
        return view('admin.student.edit', compact('student'));
    }


    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $student = Student::findOrFail($id);
        $student->update($requestData);
        Session::flash('success','Successfully Updated!');
        
        return redirect('admin/student');
    }


    public function destroy($id)
    {
        Student::destroy($id);
        Session::flash('success','Successfully Deleted!');
        return redirect('admin/student');
    }
}
