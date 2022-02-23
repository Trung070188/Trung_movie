<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;

class TagIndex extends Component
{
    public $showTagModal=false;
    public $tagName;
    public $tags=[];

    public function showCreateModal()
    {
        $this->showTagModal=true;
    }
    public function createTag()
    {
        Tag::create([
            'tag_name'=>$this->tagName,
            'slug'   =>Str::slug($this->tagName)
        ]);
        $this->reset();
    }
    public function closetagModal()
    {
        $this->showTagModal=false;
    }
    public function mount()
    {
        $this->tags=Tag::all();
    }

    public function render()
    {
        return view('livewire.tag-index');
    }
}
