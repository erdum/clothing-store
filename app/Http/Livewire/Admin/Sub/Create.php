<?php

namespace App\Http\Livewire\Admin\Sub;

use App\Models\Sub;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

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

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Sub') ])]);
        
        if($this->getPropertyValue('cover_image') and is_object($this->cover_image)) {
            $this->cover_image = $this->getPropertyValue('cover_image')->store('photos/sub-categories-images');
        }

        Sub::create([
            'category_id' => $this->category_id,
            'name' => $this->name,
            'extra_text' => $this->extra_text,
            'cover_image' => $this->cover_image,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.sub.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Sub') ])]);
    }
}
