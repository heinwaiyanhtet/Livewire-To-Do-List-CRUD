<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ToDoLists extends Component
{
    
    public function submitToDo(){
        
        // event.prevent
    }

    public function render()
    {
        return view('livewire.to-do-lists');
    }
}
