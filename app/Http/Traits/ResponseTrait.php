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

   //fail output
   protected function fail($payload, $message)
   {
      return response()->json(array(
         'error' => true,
         'message' => $message,
         'payload' => $payload,
      ));
   }
}
