<?php

namespace App\Http\Livewire\Admin\SubCategory;

use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $extra_text;
    public $cover_image;
    
    protected $rules = [
        'name' => 'required',
        'extra_text' => 'required',
        'cover_image' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('SubCategory') ])]);
        
        if($this->getPropertyValue('cover_image') and is_object($this->cover_image)) {
            $this->cover_image = $this->getPropertyValue('cover_image')->store('photos/sub-categories-images');
        }

        SubCategory::create([
            'name' => $this->name,
            'extra_text' => $this->extra_text,
            'cover_image' => $this->cover_image,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.subcategory.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('SubCategory') ])]);
    }
}
