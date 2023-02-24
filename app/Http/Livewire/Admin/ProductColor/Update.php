<?php

namespace App\Http\Livewire\Admin\ProductColor;

use App\CRUD\ProductSize;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $productsize;

    public $product_id;
    public $name;
    
    protected $rules = [
        'product_id' => 'required',
        'name' => 'required',        
    ];

    public function mount(ProductSize $ProductSize){
        $this->productsize = $ProductSize;
        $this->product_id = $this->productcolor->product_id;
        $this->name = $this->productcolor->name;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('ProductSize') ]) ]);
        
        $this->productsize->update([
            'product_id' => $this->product_id,
            'name' => $this->name,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.productsize.update', [
            'productsize' => $this->productsize
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('ProductSize') ])]);
    }
}
