<?php

namespace App\Http\Livewire\Admin\Sub;

use App\Models\Sub;
use Livewire\Component;

class Single extends Component
{

    public $sub;

    public function mount(Sub $Sub){
        $this->sub = $Sub;
    }

    public function delete()
    {
        $this->sub->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Sub') ]) ]);
        $this->emit('subDeleted');
    }

    public function render()
    {
        return view('livewire.admin.sub.single')
            ->layout('admin::layouts.app');
    }
}
