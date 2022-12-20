<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=DB::table('students')
        ->join('courses','students.cid','=','cid')
        ->join('grades','students.gid','=','gid')
        ->select('students.name','students.phone','courses.courses','grades.grades')
        ->get();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'cid'=>'required|integer',
            'gid'=>'required|integer',
        ]);
        $student=Student::create($request->all());
        if($student){
            return response()->json([
                'Message'=>'Created Successfully',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Student::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Student=Student::find($id);
        $Student->update($request->all());
        return $Student;
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'gid' => 'required|integer',
            'cid' => 'required|integer',
        ]);
        $student = Student::find($id);
        $student->update($request->all());
        if ($student) {
            return response()->json([
                'Message' => ' Updated Successfully !',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student= Student::find($id)->delete();
        if($student){
            return response()->json([
                'Message'=>'Delete Successfully',
            ]);
    }
    }
}
