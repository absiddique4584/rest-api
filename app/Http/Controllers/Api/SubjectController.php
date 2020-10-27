<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use DB;
class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subject = Subject::all();
        return response()->json($subject);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData =$request->validate([
            'class_id' =>  'required',
            'subject_name' =>  'required|unique:subjects|max:25',
        ]);


        $subject = Subject::create($request->all());
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
        $show =DB::table('subjects')->where('id',$id)->first();
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
        $validateData =$request->validate([
            'class_id' =>  'required',
            'subject_name' =>  'required|unique:subjects|max:25',
        ]);


        $data = array();
        $data['class_id'] = $request->class_id;
        $data['subject_name'] = $request->subject_name;
        $data['subject_code'] = $request->subject_code;
        $insert = DB::table('subjects')->where('id',$id)->update($data);
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
        DB::table('subjects')->where('id',$id)->delete();
        return response('Yah! Deleted Successfully !');
    }
}
