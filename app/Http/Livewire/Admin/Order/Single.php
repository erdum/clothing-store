<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use Livewire\Component;

class Single extends Component
{

    public $order;

    public function mount(Order $Order){
        $this->order = $Order;
    }

    public function delete()
    {
        $this->order->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Order') ]) ]);
        $this->emit('orderDeleted');
    }

    public function render()
    {
        return view('livewire.admin.order.single')
            ->layout('admin::layouts.app');
    }
}
