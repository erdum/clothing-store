<?php

namespace App\Http\Livewire\Admin\Status;

use App\Models\Status;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    
    protected $rules = [
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

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Status') ])]);
        
        Status::create([
            'name' => $this->name,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.status.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Status') ])]);
    }
}
