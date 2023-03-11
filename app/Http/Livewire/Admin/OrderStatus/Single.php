<?php

namespace App\Http\Livewire\Admin\OrderStatus;

use App\Models\OrderStatus;
use Livewire\Component;

class Single extends Component
{

    public $orderstatus;

    public function mount(OrderStatus $OrderStatus){
        $this->orderstatus = $OrderStatus;
    }

    public function delete()
    {
        $this->orderstatus->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('OrderStatus') ]) ]);
        $this->emit('orderstatusDeleted');
    }

    public function render()
    {
        return view('livewire.admin.orderstatus.single')
            ->layout('admin::layouts.app');
    }
}
