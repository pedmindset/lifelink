<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectSearch extends Component
{
   public $placeholder; 
   public $collection;
   public function __construct($placeholder, $collection)
   {
      $this->placeholder = $placeholder;
      $this->collection = $collection;
   }

   /**
    * Get the view / contents that represent the component.
    *
    * @return \Illuminate\Contracts\View\View|\Closure|string
    */
   public function render()
   {
      return view('components.select-search');
   }
}
