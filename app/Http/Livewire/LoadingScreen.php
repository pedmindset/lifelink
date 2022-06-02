<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LoadingScreen extends Component
{
    public $loading = false;

    protected $listeners = ['setLoading'];

    public function setLoading(Boolean $boolean)
    {
        $this->loading = $boolean;
    }

    public function render()
    {
        return view('livewire.loading-screen');
    }
}
