<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $newComment;
    public $comments;
    public function mount($initialComments)
    {
        $this->comments = $initialComments;
    }

    public function addcm()
    {
        if (empty($this->newComment)) {
            return;
        }else{

            array_unshift($this->comments,[
               'body'=>$this->newComment,
               'created_at'=>Carbon::now()->diffForHumans(),
               'creator'=>"dipta"
   
            ]);
        }
         $this->newComment = "";
    }
    public function render()
    {
        return view('livewire.comments');
    }
}
