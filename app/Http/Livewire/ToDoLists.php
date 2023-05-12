<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Todos as Todos;


class ToDoLists extends Component
{

    public $todos;

    protected $rules = [
        'todos.*.todos' => 'required|not_null|min:1',
        'todos.*.priority' => 'nullable|in:high,medium,low',
        'todos.*.cateogry' => 'nullabe',
        'todos.*.sorting' => 'nullable|integer',
        'todos.*.message' => 'nullable',
        'todos.*.duedata' => 'required|data',
    ];
    
    public function resetFields(){
        $this->todos = '';
    }



    public function storeToDo(){
        $this->validate();
        try
        {
            Todos::create([
                'todos' => $this->todos,
            ]);
            session()->flash('success','Post Updated Successfully!!');
            $this->resetFields();
         }

        catch(Exception $ex)
        {
            session()->flash('error','Something goes wrong!');
        }
       
    }



    public function render()
    {
        return view('livewire.to-do-lists');
    }
}
