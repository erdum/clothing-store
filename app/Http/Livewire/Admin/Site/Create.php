<?php

namespace App\Http\Livewire\Admin\Site;

use App\Models\Site;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $discount_text;
    public $discount;
    public $delivery_charges;
    public $tax_charges;
    public $currency_multiplier;
    public $iban;
    public $address;
    public $phone;
    public $email;
    public $instagram;
    public $facebook;
    
    protected $rules = [
        'discount_text' => 'required',
        'discount' => 'required',
        'delivery_charges' => 'required',
        'tax_charges' => 'required',
        'currency_multiplier' => 'required',
        'iban' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'email' => 'required',
        'instagram' => 'required',
        'facebook' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Site') ])]);
        
        Site::create([
            'discount_text' => $this->discount_text,
            'discount' => $this->discount,
            'delivery_charges' => $this->delivery_charges,
            'tax_charges' => $this->tax_charges,
            'currency_multiplier' => $this->currency_multiplier,
            'iban' => $this->iban,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'instagram' => $this->instagram,
            'facebook' => $this->facebook,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.site.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Site') ])]);
    }
}
