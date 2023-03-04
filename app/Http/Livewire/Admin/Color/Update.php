<?php

namespace App\Http\Livewire\Admin\Color;

use App\Models\Color;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $color;

    public $product_id;
    public $name;
    
    protected $rules = [
        'product_id' => 'required',
        'name' => 'required',        
    ];

    public function mount(Color $Color){
        $this->color = $Color;
        $this->product_id = $this->color->product_id;
        $this->name = $this->color->name;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Color') ]) ]);
        
        $this->color->update([
            'product_id' => $this->product_id,
            'name' => $this->name,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.color.update', [
            'color' => $this->color
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Color') ])]);
    }
}
