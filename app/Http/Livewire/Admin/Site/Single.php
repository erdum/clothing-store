<?php

namespace App\Http\Livewire\Admin\Site;

use App\Models\Site;
use Livewire\Component;

class Single extends Component
{

    public $site;

    public function mount(Site $Site){
        $this->site = $Site;
    }

    public function delete()
    {
        $this->site->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Site') ]) ]);
        $this->emit('siteDeleted');
    }

    public function render()
    {
        return view('livewire.admin.site.single')
            ->layout('admin::layouts.app');
    }
}
