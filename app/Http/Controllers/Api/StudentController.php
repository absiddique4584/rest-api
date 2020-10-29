<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = DB::table('students')->get();
        return response()->json($student);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      /**  $validateData =$request->validate([
            'class_id' =>  'required',
            'section_id' =>  'required',
            'name' =>  'required',
            'phone' =>  'required',
            'email' =>  'required|unique:students',
            'password' =>  'required',
            'photo' =>  'required|',
            'address' =>  'required',
            'gender' =>  'required',
        ]); */


        $data = array();
        $data['class_id'] = $request->class_id;
        $data['section_id'] = $request->section_id;
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password) ;
        $data['photo'] = $request->photo;
        $data['address'] = $request->address;
        $data['gender'] = $request->gender;
        $insert = DB::table('students')->insert($data);
        return response('Data Inserted Successfully ! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show =DB::table('students')->where('id',$id)->first();
        return response()->json($show);
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
        /**  $validateData =$request->validate([
        'class_id' =>  'required',
        'section_id' =>  'required',
        'name' =>  'required',
        'phone' =>  'required',
        'email' =>  'required|unique:students',
        'password' =>  'required',
        'photo' =>  'required|',
        'address' =>  'required',
        'gender' =>  'required',
        ]); */



        $data = array();
        $data['class_id'] = $request->class_id;
        $data['section_id'] = $request->section_id;
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password) ;
        $data['photo'] = $request->photo;
        $data['address'] = $request->address;
        $data['gender'] = $request->gender;
        $insert = DB::table('students')->where('id',$id)->update($data);
        return response('Data Updated Successfully ! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = DB::table('students')->where('id',$id)->first();
        $image_path = $image->photo;
        unlink($image_path);
        DB::table('students')->where('id',$id)->delete();
        return response('Yah! Deleted Successfully !');
    }
}
