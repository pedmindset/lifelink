<?php

namespace App\Forms;

use Laraform\Laraform;

class FirstForm extends Laraform
{
  public function schema() {
    return [
      'hello_world' => [
        'type' => 'text',
        'label' => 'Hello',
        'default' => 'World'
      ]
    ];
  }
}