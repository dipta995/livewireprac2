<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class Students extends Component
{   
    public $ids;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;

    public function resetInputField()
    {
        $this->firstname='';
        $this->lastname='';
        $this->email='';
        $this->phone='';
    }
    public function store()
    {
        $validateData = $this->validate([
            'firstname'=> 'required',
            'lastname'=> 'required',
            'email'=> 'required|email',
            'phone'=> 'required',

        ]);
        Student::create($validateData);
        session()->flash('message','Student Created');

        $this->resetInputField();
        $this->emit('studentAdded');
    }
    public function edit($id)
    {
        $student = Student::where('id',$id)->first();
        $this->ids = $student->id;
        $this->firstname = $student->firstname;
        $this->lastname = $student->lastname;
        $this->email = $student->email;
        $this->phone = $student->phone;

    }
    public function update()
    {
        $this->validate([
            'firstname'=> 'required',
            'lastname'=> 'required',
            'email'=> 'required|email',
            'phone'=> 'required',

        ]);
        if ($this->ids) {
            $student = Student::find($this->ids);
            $student->update([
                'cat_name'=>$this->cat_name,
               
            ]);
            session()->flash('message','Student Update');
            $this->resetInputField();
            $this->emit('studentUpdated');

        }
    }
    public function delete($id)
    {
        if ($id) {
            Student::where('id',$id)->delete();
            session()->flash('message','Student Deleted');

        }
    }
    public function render()
    {
        $students  = Student::orderBy('id','DESC')->get();
       

        return view('livewire.students',['students'=>$students]);
    }
}
