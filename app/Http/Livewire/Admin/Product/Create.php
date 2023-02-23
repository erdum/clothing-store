<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $sub_category_id;
    public $name;
    public $description;
    public $unit_price;
    public $discount;
    public $quantity;
    
    protected $rules = [
        'sub_category_id' => 'required',
        'name' => 'required',
        'description' => 'required',
        'unit_price' => 'required',
        'discount' => 'required',
        'quantity' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Product') ])]);
        
        Product::create([
            'sub_category_id' => $this->sub_category_id,
            'name' => $this->name,
            'description' => $this->description,
            'unit_price' => $this->unit_price,
            'discount' => $this->discount,
            'quantity' => $this->quantity,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.product.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Product') ])]);
    }
}
