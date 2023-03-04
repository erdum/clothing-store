<?php

namespace App\Http\Livewire\Admin\Size;

use App\Models\Size;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $size;

    public $product_id;
    public $name;
    
    protected $rules = [
        'product_id' => 'required',
        'name' => 'required',        
    ];

    public function mount(Size $Size){
        $this->size = $Size;
        $this->product_id = $this->size->product_id;
        $this->name = $this->size->name;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Size') ]) ]);
        
        $this->size->update([
            'product_id' => $this->product_id,
            'name' => $this->name,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.size.update', [
            'size' => $this->size
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Size') ])]);
    }
}
