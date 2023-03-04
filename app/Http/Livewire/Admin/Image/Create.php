<?php

namespace App\Http\Livewire\Admin\Image;

use App\Models\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $product_id;
    public $url;
    
    protected $rules = [
        'product_id' => 'required',
        'url' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Image') ])]);
        
        if($this->getPropertyValue('url') and is_object($this->url)) {
            $this->url = $this->getPropertyValue('url')->store('photos/products');
        }

        Image::create([
            'product_id' => $this->product_id,
            'url' => $this->url,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.image.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Image') ])]);
    }
}
