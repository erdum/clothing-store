<?php

namespace App\Http\Livewire\Admin\ProductSize;

use App\Models\ProductSize;
use Livewire\Component;

class Single extends Component
{

    public $productsize;

    public function mount(ProductSize $ProductSize){
        $this->productsize = $ProductSize;
    }

    public function delete()
    {
        $this->productsize->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('ProductSize') ]) ]);
        $this->emit('productsizeDeleted');
    }

    public function render()
    {
        return view('livewire.admin.productsize.single')
            ->layout('admin::layouts.app');
    }
}
