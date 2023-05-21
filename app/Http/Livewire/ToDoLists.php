<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Todos as Todos;


class ToDoLists extends Component
{

    public $todo;

    protected $rules = [
        'todo.*.todos' => 'required|not_null|min:1',
        'todo.*.priority' => 'nullable|in:high,medium,low',
        'todo.*.cateogry' => 'nullabe',
        'todo.*.sorting' => 'nullable|integer',
        'todo.*.message' => 'nullable',
        'todo.*.duedata' => 'required|data',
    ];

    public function resetFields(){
        $this->todo = '';
    }


    public function mount(){
        // $this->todos = $todo->todos
    }

    public function storeToDo(){
        $this->validate();
        try
        {
            Todos::create([
                'todos' => $this->todo,
            ]);
            session()->flash('success','Post Updated Successfully!!');
            $this->resetFields();
         }

        catch(Exception $ex)
        {
            session()->flash('error','Something goes wrong!');
        }

    }

    // public function mount(){
    //     $this->todos = Todos::all();
    // }

    public function render()
    {

        return view('livewire.to-do-lists',[
            'todos' => Todos::all()
        ]);
    }
}
