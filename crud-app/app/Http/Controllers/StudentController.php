<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
use domain\Facades\StudentFacade;
use Illuminate\Support\Facades\Facade;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $students['students'] = Student::all() -> map(function($student){
                
                return[
                    'id' => $student->id,
                    'name' => $student->name,
                    'image' =>asset('storage/'.$student->image),
                    'age' => $student->age,
                    'status' => $student->status
                ];
            });
            
        return Inertia::render('Student',$students);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Student/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        StudentFacade::store();
        return Redirect::route('student');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return Inertia::render('Student/Show',[
                 'student' => $student,
                 'image' => asset('storage/'.$student->image),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return Inertia::render('Student/Edit',[
            'student' => $student,
            'image' => asset('storage/'.$student->image),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update( Student $student)
    {
        
        StudentFacade::update($student);
        return Redirect::route('student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    { 
        StudentFacade::destroy($student);
        return Redirect::route('student');
    }
    
}
