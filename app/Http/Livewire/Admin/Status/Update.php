<?php

namespace App\Http\Livewire\Admin\Status;

use App\Models\Status;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $status;

    
    protected $rules = [
        
    ];

    public function mount(Status $Status){
        $this->status = $Status;
        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Status') ]) ]);
        
        $this->status->update([
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.status.update', [
            'status' => $this->status
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Status') ])]);
    }
}
