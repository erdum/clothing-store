<?php

namespace App\Http\Livewire\Admin\Size;

use App\Models\Size;
use Livewire\Component;

class Single extends Component
{

    public $size;

    public function mount(Size $Size){
        $this->size = $Size;
    }

    public function delete()
    {
        $this->size->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Size') ]) ]);
        $this->emit('sizeDeleted');
    }

    public function render()
    {
        return view('livewire.admin.size.single')
            ->layout('admin::layouts.app');
    }
}
