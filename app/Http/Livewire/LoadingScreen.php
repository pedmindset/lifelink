<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LoadingScreen extends Component
{
    public $loading = false;
    public $displayLoading = true;


    protected $listeners = ['setLoading', 'setDisplayLoading'];

    public function setLoading(Boolean $boolean)
    {
        $this->loading = $boolean;
    }

    public function setDisplayLoading(Boolean $boolean)
    {
        $this->loading = $boolean;
        $this->displayLoading = $boolean;
    }

    public function render()
    {
        return view('livewire.loading-screen');
    }
}
