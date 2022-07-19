<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;

class StudentController extends Controller
{
    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * List all the students.
     *
     * @return App\Traits\ApiResponser
     */
    public function index(Request $request)
    {
        //dd($request->name);
        $students = Student::when(isset($request->name), function($query) use($request) {
            $query->where('Name', 'like', '%'.$request->name.'%');
        })
        ->get();

        return $this->success(null, 200, $students);
    }

    /**
     * Retrieve the student.
     *
     * @param  String $id
     * @return App\Traits\ApiResponser
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);

        return $this->success(null, 200, $student);
    }

    /**
     * Add new student.
     *
     * @param  Illuminate\Http\Request $request
     * @return App\Traits\ApiResponser
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'                  => 'required',
            'surname'               => 'required',
            'indentification_no'    => 'required',
            'country'               => 'required',
            'dob'                   => 'required',
            'registered_on'         => 'required'
        ]);

        $student = Student::create([
            'Name'              =>  $request->name,
            'Surname'           =>  $request->surname,
            'IndentificationNo' =>  $request->indentification_no,
            'Country'           =>  $request->country,
            'DateOfBirth'       =>  $request->dob,
            'RegisteredOn'      =>  $request->registered_on,
        ]);

        return $this->success('Record Inserterd', 200, $student);
    }

    /**
     * Update a student.
     *
     * @param  Illuminate\Http\Request $request
     * @param  App\Models\Student  $student
     * @return App\Traits\ApiResponser
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $student->Name              = $request->name;
        $student->Surname           = $request->surname;
        $student->IndentificationNo = $request->indentification_no;
        $student->Country           = $request->country;
        $student->DateOfBirth       = $request->dob;
        $student->RegisteredOn      = $request->registered_on;

        $student->save();

        return $this->success('Record Updated', 200, $student);
    }

    //
}
