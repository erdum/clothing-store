<?php

namespace App\Http\Livewire\Admin\Image;

use App\Models\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $image;

    public $product_id;
    public $url;
    
    protected $rules = [
        'product_id' => 'required',
        'url' => 'required',        
    ];

    public function mount(Image $Image){
        $this->image = $Image;
        $this->product_id = $this->image->product_id;
        $this->url = $this->image->url;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Image') ]) ]);
        
        if($this->getPropertyValue('url') and is_object($this->url)) {
            $this->url = $this->getPropertyValue('url')->store('photos/products');
        }

        $this->image->update([
            'product_id' => $this->product_id,
            'url' => $this->url,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.image.update', [
            'image' => $this->image
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Image') ])]);
    }
}
