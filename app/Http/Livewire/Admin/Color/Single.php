<?php

namespace App\Http\Livewire\Admin\Color;

use App\Models\Color;
use Livewire\Component;

class Single extends Component
{

    public $color;

    public function mount(Color $Color){
        $this->color = $Color;
    }

    public function delete()
    {
        $this->color->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Color') ]) ]);
        $this->emit('colorDeleted');
    }

    public function render()
    {
        return view('livewire.admin.color.single')
            ->layout('admin::layouts.app');
    }
}
