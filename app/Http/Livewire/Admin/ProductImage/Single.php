<?php

namespace App\Http\Livewire\Admin\ProductImage;

use App\Models\ProductImage;
use Livewire\Component;

class Single extends Component
{

    public $productimage;

    public function mount(ProductImage $ProductImage){
        $this->productimage = $ProductImage;
    }

    public function delete()
    {
        $this->productimage->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('ProductImage') ]) ]);
        $this->emit('productimageDeleted');
    }

    public function render()
    {
        return view('livewire.admin.productimage.single')
            ->layout('admin::layouts.app');
    }
}
