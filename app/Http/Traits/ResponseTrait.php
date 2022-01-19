<?php

namespace App\Http\Traits;

trait ResponseTrait {
   //success output
   protected function success($payload, $message)
   {
    return response()->json(array(
         'error' => false,
         'message' => $message,
         'payload' => $payload,
      ));
   }

   //failure output
   protected function fail($message)
   {
      return response()->json(array(
         'error' => true,
         'message' => $message,
      ));
   }
}