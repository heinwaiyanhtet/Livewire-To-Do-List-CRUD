<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Todos as Todos;


class ToDoLists extends Component
{

    public $todo;
    public $editableMessage;

    protected $rules = [
        'todo.*.todos' => 'required|not_null|min:1',
        'todo.*.priority' => 'nullable|in:high,medium,low',
        'todo.*.cateogry' => 'nullabe',
        'todo.*.sorting' => 'nullable|integer',
        'todo.*.message' => 'nullable',
        'todo.*.duedata' => 'required|data',
    ];

    // public function startEditing($index){
    //     $this->isEditing[$index] = true;
    // }


    public function updatePost()
    {
        return "Hello world";
    }


    public function resetFields(){
        $this->todo = '';
    }

    public function updateToDo($id,$message){
        $editableToDo = Todos::findOrFail($id);
        $editableToDo->update([
            'todos' => $message,
         ]);
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
            session()->flash('success','Post Created Successfully!!');
            $this->resetFields();
         }

        catch(Exception $ex)
        {
            session()->flash('error_create','Something goes wrong!');
        }

    }

    // public function editToDo($id)
    // {
    //     return "post ma shi bu lay";
    //     try {
    //         $toDoEditable = Todos::findOrFail($id);

    //         if(!$post){
    //             session()->flash('error','Post not found');
    //         }
    //         else
    //         {
    //             var_dump($toDoEditable);

    //             $this->todo = $toDoEditable->todos;
    //         }

    //     } catch (\Exception $ex) {

    //     }
    // }

    public function deleteToDo($id){
        try{
            Todos::find($id)->delete();
            session()->flash('success_delete','todo deleted succesfully!!');
        }

        catch(\Exception $e){
            session()->flash('error_delete',"Something goes wrong!!");
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
