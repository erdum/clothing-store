<?php

namespace App\Http\Livewire\Admin\Site;

use App\Models\Site;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $site;

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

    public function mount(Site $Site){
        $this->site = $Site;
        $this->discount_text = $this->site->discount_text;
        $this->discount = $this->site->discount;
        $this->delivery_charges = $this->site->delivery_charges;
        $this->tax_charges = $this->site->tax_charges;
        $this->currency_multiplier = $this->site->currency_multiplier;
        $this->iban = $this->site->iban;
        $this->address = $this->site->address;
        $this->phone = $this->site->phone;
        $this->email = $this->site->email;
        $this->instagram = $this->site->instagram;
        $this->facebook = $this->site->facebook;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Site') ]) ]);
        
        $this->site->update([
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
    }

    public function render()
    {
        return view('livewire.admin.site.update', [
            'site' => $this->site
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Site') ])]);
    }
}
