<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{

    public function index()
    {
        $student = Student::all();
        return response()->json($student);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:191',
            'email'=> 'required|email|max:191',
            'phone'=> 'required'
        ]);
        if ($validator -> fails()) {
            return response()->Json($validator->errors());
        }else{
            $student = Student::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
            $student->save();
            return response()->json( $student,201);
        }
    }

    /**
     * git one student as a second end point..
     */
    public function show(string $id)
    {
        //first-> search for student 
        $product = Student::find($id);
        return response()->json($product,200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:191',
            'email'=> 'required|email|max:191',
            'phone'=> 'required'
        ]);
        if ($validator -> fails()) {
            return response()->Json($validator->errors());
        }else{
            $student = Student::find($id);
            $student ->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
            $student->save();
            return response()->json(['message'=>'Student Updated Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        // return $student->delete();
        if($student){
            $student->delete();
            return response()->json(['message'=>'Student Deleted Successfully']);
        }else{
            return response()->json(['message'=>'Student Not Found']);
        }
        
    }
}
