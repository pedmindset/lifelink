<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormView extends Component
{

   public $schema;

   public function __construct($schema)
   {
      $this->schema = $schema;
   }

   public function render()
   {
      return view('components.form-view');
   }
}
