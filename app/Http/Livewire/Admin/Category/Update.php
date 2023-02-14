<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $category;

    public $name;
    public $extra_text;
    public $cover_image;
    
    protected $rules = [
        'name' => 'required',
        'extra_text' => 'required',
        'cover_image' => 'required',        
    ];

    public function mount(Category $Category){
        $this->category = $Category;
        $this->name = $this->category->name;
        $this->extra_text = $this->category->extra_text;
        $this->cover_image = $this->category->cover_image;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Category') ]) ]);
        
        if($this->getPropertyValue('cover_image') and is_object($this->cover_image)) {
            $this->cover_image = $this->getPropertyValue('cover_image')->store('public/categories-images');
        }

        $this->category->update([
            'name' => $this->name,
            'extra_text' => $this->extra_text,
            'cover_image' => $this->cover_image,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.category.update', [
            'category' => $this->category
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Category') ])]);
    }
}
