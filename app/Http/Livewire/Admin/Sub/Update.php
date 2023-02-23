<?php

namespace App\Http\Livewire\Admin\Sub;

use App\Models\Sub;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $sub;

    public $category_id;
    public $name;
    public $extra_text;
    public $cover_image;
    
    protected $rules = [
        'category_id' => 'required',
        'name' => 'required',
        'extra_text' => 'required',
        'cover_image' => 'required',        
    ];

    public function mount(Sub $Sub){
        $this->sub = $Sub;
        $this->category_id = $this->sub->category_id;
        $this->name = $this->sub->name;
        $this->extra_text = $this->sub->extra_text;
        $this->cover_image = $this->sub->cover_image;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Sub') ]) ]);
        
        if($this->getPropertyValue('cover_image') and is_object($this->cover_image)) {
            $this->cover_image = $this->getPropertyValue('cover_image')->store('photos/sub-categories-images');
        }

        $this->sub->update([
            'category_id' => $this->category_id,
            'name' => $this->name,
            'extra_text' => $this->extra_text,
            'cover_image' => $this->cover_image,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.sub.update', [
            'sub' => $this->sub
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Sub') ])]);
    }
}
