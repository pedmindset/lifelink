<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Fees extends Component
{
   public $feeData, $eventData, $selectedId;
   public $category = ['Aluminia', 'Event']; 
   public function render()
   {
      return view('livewire.fees');
   }
}
