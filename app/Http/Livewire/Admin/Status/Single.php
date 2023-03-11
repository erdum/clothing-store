<?php

namespace App\Http\Livewire\Admin\Status;

use App\Models\Status;
use Livewire\Component;

class Single extends Component
{

    public $status;

    public function mount(Status $Status){
        $this->status = $Status;
    }

    public function delete()
    {
        $this->status->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Status') ]) ]);
        $this->emit('statusDeleted');
    }

    public function render()
    {
        return view('livewire.admin.status.single')
            ->layout('admin::layouts.app');
    }
}
