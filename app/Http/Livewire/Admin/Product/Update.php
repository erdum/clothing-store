<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $product;

    public $sub_id;
    public $name;
    public $description;
    public $unit_price;
    public $discount;
    public $quantity;
    
    protected $rules = [
        'sub_id' => 'required',
        'name' => 'required',
        'description' => 'required',
        'unit_price' => 'required',
        'discount' => 'required',
        'quantity' => 'required',        
    ];

    public function mount(Product $Product){
        $this->product = $Product;
        $this->sub_id = $this->product->sub_id;
        $this->name = $this->product->name;
        $this->description = $this->product->description;
        $this->unit_price = $this->product->unit_price;
        $this->discount = $this->product->discount;
        $this->quantity = $this->product->quantity;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Product') ]) ]);
        
        $this->product->update([
            'sub_id' => $this->sub_id,
            'name' => $this->name,
            'description' => $this->description,
            'unit_price' => $this->unit_price,
            'discount' => $this->discount,
            'quantity' => $this->quantity,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.product.update', [
            'product' => $this->product
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Product') ])]);
    }
}
