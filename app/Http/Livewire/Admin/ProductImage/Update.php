<?php

namespace App\Http\Livewire\Admin\ProductImage;

use App\Models\ProductImage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $productimage;

    public $product_id;
    public $url;
    
    protected $rules = [
        'product_id' => 'required',
        'url' => 'required',        
    ];

    public function mount(ProductImage $ProductImage){
        $this->productimage = $ProductImage;
        $this->product_id = $this->productimage->product_id;
        $this->url = $this->productimage->url;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('ProductImage') ]) ]);
        
        if($this->getPropertyValue('url') and is_object($this->url)) {
            $this->url = $this->getPropertyValue('url')->store('photos/products');
        }

        $this->productimage->update([
            'product_id' => $this->product_id,
            'url' => $this->url,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.productimage.update', [
            'productimage' => $this->productimage
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('ProductImage') ])]);
    }
}
