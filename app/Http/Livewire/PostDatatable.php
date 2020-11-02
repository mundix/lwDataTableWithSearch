<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class PostDatatable extends Component
{

    use WithPagination;
    public $headers;
    public $searchTerm;
    public $sortColumn = 'created_at';
    public $sortDirection = 'asc';

    public function headerConfig()
    {
        return [
            'id' => '#',
            'title' => 'Title',
            'content' => 'Content',
            'created_at' => 'Created At',
        ];
    }

    public function mount()
    {
        $this->headers = $this->headerConfig();
    }

    public function hydrate()
    {
        $this->headers = $this->headerConfig();
    }

    private function resultData()
    {
        return Post::where(function($query){
            $query->where('id', '>', 0);
            if($this->searchTerm != '')
            {
                $query->where('title', 'like', '%'.$this->searchTerm.'%');
                $query->orWhere('content', 'like', '%'.$this->searchTerm.'%');
            }

        })
        ->orderBy($this->sortColumn, $this->sortDirection)
        ->paginate(5);
    }

    public function render()
    {
        return view('livewire.post-datatable', [
            'data' => $this->resultData()
        ]);
    }

    public function sort($column)
    {
        $this->sortColumn = $column;
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
    }
}
