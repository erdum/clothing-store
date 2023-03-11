<?php

namespace App\Http\Livewire\Admin\OrderStatus;

use App\Models\OrderStatus;
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

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('OrderStatus') ])]);
        
        OrderStatus::create([
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.orderstatus.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('OrderStatus') ])]);
    }
}
