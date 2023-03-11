<?php

namespace App\Http\Livewire\Admin\OrderStatus;

use App\Models\OrderStatus;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $orderstatus;

    
    protected $rules = [
        
    ];

    public function mount(OrderStatus $OrderStatus){
        $this->orderstatus = $OrderStatus;
        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('OrderStatus') ]) ]);
        
        $this->orderstatus->update([
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.orderstatus.update', [
            'orderstatus' => $this->orderstatus
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('OrderStatus') ])]);
    }
}
