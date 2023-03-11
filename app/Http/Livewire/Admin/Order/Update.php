<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $order;

    
    protected $rules = [
        
    ];

    public function mount(Order $Order){
        $this->order = $Order;
        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Order') ]) ]);
        
        $this->order->update([
            
        ]);
    }

    public function render()
    {
        return view('livewire.admin.order.update', [
            'order' => $this->order
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Order') ])]);
    }
}
