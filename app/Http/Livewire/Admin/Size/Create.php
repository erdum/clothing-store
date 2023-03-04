<?php

namespace App\Http\Livewire\Admin\Size;

use App\Models\Size;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $product_id;
    public $name;
    
    protected $rules = [
        'product_id' => 'required',
        'name' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Size') ])]);
        
        Size::create([
            'product_id' => $this->product_id,
            'name' => $this->name,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.size.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Size') ])]);
    }
}
