<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Add this line

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students= DB::table('students')->get();
        return view('home',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        DB::table('students')->insert([
            'name' => $request->name,
            'city' => $request->city,
            'marks' => $request->marks,
        ]);

        return redirect(route('index'))->with('status','Student Added!!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $student = DB::table('students')->find($id);
    return view('editform', ['student' => $student]);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('students')->where('id',$id)->update([
            'name' => $request->name,
            'city' => $request->city,
            'marks' => $request->marks,
        ]);
        return redirect(route('index'))->with('status','Student Updated!!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('students')->where('id',$id)->delete();
        return redirect(route('index'))->with('status','Student Deleted!!');

    }
}
