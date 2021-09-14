<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;


class Table extends Component
{
    use WithPagination;

    public $modelName;
    public $fields;
    public $searchable;
    public $searchTerm;
    public $actionLink;
    public $path;

    public function mount($modelName,$fields=null,$searchable=null,$actionLink=null,$path=null)
    {
        $this->modelName = $modelName;
        $this->fields = $fields; 
        $this->searchable = $searchable;
        $this->actionLink = $actionLink;
        $this->path = $path;
    }

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $query = $this->modelName::latest();
        foreach ($this->searchable as $value) {
            $query->orWhere($value, 'like', $searchTerm);
        }
        return view('livewire.table',[
            'data'=>$query->paginate(20)
        ]);


    }
}
