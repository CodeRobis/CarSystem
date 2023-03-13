<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class StudentController extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){

        $filter=$request->session()->get('filterStudents', (object)['name'=>null,'year'=>null]);

        $students=Student::with(['course','grades'])->filter($filter)->orderBy("name")->get();

        return view("students.index",[
            "students"=>$students,
             "filter"=>$filter
            ]
        );
    }

    public function create(){
        return view("students.create");
    }

    public function save(Request $request){
        $student=new Student();
        $student->name=$request->name;
        $student->surname=$request->surname;
        $student->year=$request->year;
        $student->save();
        return redirect()->route("students.index");

    }

    public function edit($id){
        return view("students.edit",[
            "student"=>Student::find($id)
        ]);
    }

    public function update($id, Request $request){
        $student=Student::find($id);
        $student->name=$request->name;
        $student->surname=$request->surname;
        $student->year=$request->year;
        $student->save();
        return redirect()->route("students.index");
    }

    public function delete($id){
        Student::destroy($id);
        return redirect()->route("students.index");
    }

    public function search(Request $request){
        $filterStudents=new \stdClass();
        $filterStudents->name=$request->name;
        $filterStudents->year=$request->year;

        $request->session()->put('filterStudents', $filterStudents);
        return redirect()->route('students.index');
    }

}
