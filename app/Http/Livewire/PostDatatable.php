<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class PostDatatable extends Component
{

    use WithPagination;
    public $headers;

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

    private function resultData()
    {
        // return Post::where('user_id', '=', auth()->user()->id)->paginate(5);
        return Post::paginate(5);
    }

    public function render()
    {
        return view('livewire.post-datatable', [
            'data' => $this->resultData()
        ]);
    }
}
