<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    
    protected $rules = [
        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Order') ])]);
        
        Order::create([
            
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.order.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Order') ])]);
    }
}
