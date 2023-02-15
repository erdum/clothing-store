<?php

namespace App\Http\Livewire\Admin\SubCategory;

use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $subcategory;

    public $name;
    public $extra_text;
    public $cover_image;
    
    protected $rules = [
        'name' => 'required',
        'extra_text' => 'required',
        'cover_image' => 'required',        
    ];

    public function mount(SubCategory $SubCategory){
        $this->subcategory = $SubCategory;
        $this->name = $this->subcategory->name;
        $this->extra_text = $this->subcategory->extra_text;
        $this->cover_image = $this->subcategory->cover_image;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('SubCategory') ]) ]);
        
        if($this->getPropertyValue('cover_image') and is_object($this->cover_image)) {
            $this->cover_image = $this->getPropertyValue('cover_image')->store('photos/sub-categories-images');
        }

        $this->subcategory->update([
            'name' => $this->name,
            'extra_text' => $this->extra_text,
            'cover_image' => $this->cover_image,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.subcategory.update', [
            'subcategory' => $this->subcategory
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('SubCategory') ])]);
    }
}
