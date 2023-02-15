<?php

namespace App\Http\Livewire\Admin\SubCategory;

use App\Models\SubCategory;
use Livewire\Component;

class Single extends Component
{

    public $subcategory;

    public function mount(SubCategory $SubCategory){
        $this->subcategory = $SubCategory;
    }

    public function delete()
    {
        $this->subcategory->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('SubCategory') ]) ]);
        $this->emit('subcategoryDeleted');
    }

    public function render()
    {
        return view('livewire.admin.subcategory.single')
            ->layout('admin::layouts.app');
    }
}
