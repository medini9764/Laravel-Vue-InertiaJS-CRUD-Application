<?php

namespace domain\Services;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Request;

class StudentService
{
    protected $student;
    public function __Construct()
    {
        $this->student=new Student();
    }
    public function all(){
        return $this->student->all();
    }
    /*public function index()
    {
        
       
    }*/

    
    public function create()
    {
        //return Inertia::render('Student/Create');
    }

   
    public function store()
    {
       // $image='';
        $image = Request::file('image')->store('student','public');
        Student::create([
                'name' => Request::input('name'),
                'age' => Request::input('age'),
                'image' => $image,
                'status' => Request::input('status')
        ]);
        
    }

    
    /*public function show(Student $student)
    {
        return Inertia::render('Student/Show',[
                 'student' => $student,
                 'image' => asset('storage/'.$student->image),
        ]);
    }*/

    
   /* public function edit(Student $student)
    {
        return Inertia::render('Student/Edit',[
            'student' => $student,
            'image' => asset('storage/'.$student->image),
        ]);
    }*/

   public function update($student)
    {
        $image = $student->image;
        if(Request::file('image')){
            Storage::delete('public/'.$student->image);
            $image = Request::file('image')->store('student','public');
        }
        $student->update([
            'name' => Request::input('name'),
            'age' => Request::input('age'),
            'image' => $image,
            'status' => Request::input('status')
        ]);
     
    }

    
    public function destroy($student)
    {
        Storage::delete('public/'.$student->image);
        $student->delete();
       
    }
}
?>