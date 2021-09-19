<?php

namespace App\Http\Livewire;

use App\Models\Catagory;
use Livewire\Component;

class Admincats extends Component
{
    public $ids;
    public $cat_name;
    public function resetInputField()
    {
        $this->cat_name='';
      
    }
    public function store()
    {
        $validateData = $this->validate([
            'cat_name'=> 'required',
            

        ]);
        Catagory::create($validateData);
        session()->flash('message','cat Created');

        $this->resetInputField();
        $this->emit('catAdded');
    }
    public function edit($id)
    {
        $cat = Catagory::where('id',$id)->first();
        $this->ids = $cat->id;
        $this->cat_name = $cat->cat_name;
 

    }

    public function update()
    {
        $this->validate([
            'cat_name'=> 'required',
           

        ]);
        if ($this->ids) {
            $cat = Catagory::find($this->ids);
            $cat->update([
                'cat_name'=>$this->cat_name,
            ]);
            session()->flash('message','cat Update');
            $this->resetInputField();
            $this->emit('catUpdated');

        }
    }

    public function delete($id)
    {
        if ($id) {
            Catagory::where('id',$id)->delete();
            session()->flash('message','Student Deleted');

        }
    }
    public function render()
    {
        $cats = Catagory::orderBy('id','DESC')->get();
        return view('livewire.admincats',['cats'=>$cats]);
    }
}
