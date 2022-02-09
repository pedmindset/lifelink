<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MtnMomoApiController extends Controller
{
   public function createApiUser() {
      $uuidV4 = Str::uuid()->toString();
      $tempCallBackUrl = "https://webhook.site/6d8f355e-99c7-4289-8478-61a932959db4";

      $curl = curl_init();
      curl_setopt_array($curl, array(
         CURLOPT_URL => 'https://sandbox.momodeveloper.mtn.com/v1_0/apiuser',
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => '',
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 0,
         CURLOPT_FOLLOWLOCATION => true,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => 'POST',
         CURLOPT_POSTFIELDS =>'{
            "providerCallbackHost" : "https://webhook.site/6d8f355e-99c7-4289-8478-61a932959db4"
         }',   CURLOPT_HTTPHEADER => array(
            'X-Reference-Id: 45c1225a-87fd-499e-b811-8609b1574f45',
            'Ocp-Apim-Subscription-Key: f171a702275b4699bd4f99d0f69f1271',
            'Content-Type: application/json'
         ),
      ));

      $response = curl_exec($curl);
      curl_close($curl);
      return $response;
   }

   public function getApiUser()
   {
      $curl = curl_init();

      curl_setopt_array($curl, array(
         CURLOPT_URL => 'https://sandbox.momodeveloper.mtn.com/v1_0/apiuser/45c1225a-87fd-499e-b811-8609b1574f45',
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => '',
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 0,
         CURLOPT_FOLLOWLOCATION => true,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => 'GET',
         CURLOPT_HTTPHEADER => array(
            'Ocp-Apim-Subscription-Key: f171a702275b4699bd4f99d0f69f1271',
         ),
      ));

      $response = curl_exec($curl);

      curl_close($curl);
      return $response;
   }

   public function getApiKey()
   {
      $curl = curl_init();

      curl_setopt_array($curl, array(
         CURLOPT_URL => 'https://sandbox.momodeveloper.mtn.com/v1_0/apiuser/45c1225a-87fd-499e-b811-8609b1574f45/apikey',
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => '',
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 0,
         CURLOPT_FOLLOWLOCATION => true,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => 'POST',
         CURLOPT_HTTPHEADER => array(
            'Ocp-Apim-Subscription-Key: f171a702275b4699bd4f99d0f69f1271',
         ),
      ));

      $response = curl_exec($curl);

      curl_close($curl);
      return $response;
   }

   public function getApiToken()
   {

      $curl = curl_init();

      curl_setopt_array($curl, array(
         CURLOPT_URL => 'https://sandbox.momodeveloper.mtn.com/collection/token/',
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => '',
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 0,
         CURLOPT_FOLLOWLOCATION => true,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => 'POST',
         CURLOPT_HTTPHEADER => array(
            'Ocp-Apim-Subscription-Key: f171a702275b4699bd4f99d0f69f1271',
            'Authorization: Basic NDVjMTIyNWEtODdmZC00OTllLWI4MTEtODYwOWIxNTc0ZjQ1OjNiYmY1ZDM1NWVmYzQ3ZWZhYjliNmUxZDgyMWMxZDAw'
         ),
      ));

      $response = curl_exec($curl);

      curl_close($curl);
      return $response;

   }

   public function momoRequestPayment()
   {
      $curl = curl_init();

      curl_setopt_array($curl, array(
         CURLOPT_URL => 'https://sandbox.momodeveloper.mtn.com/collection/v1_0/requesttopay',
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => '',
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 0,
         CURLOPT_FOLLOWLOCATION => true,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => 'POST',
         CURLOPT_POSTFIELDS =>'{
            "amount": "2.0",
            "currency": "EUR",
            "externalId": "67648382",
            "payer": {
               "partyIdType": "MSISDN",
               "partyId": "0541013573"
            },
            "payerMessage": "Payment for goods",
            "payeeNote": "payment to UBA"
         }',
         CURLOPT_HTTPHEADER => array(
            'X-Reference-Id: 07468375-eb5c-4b21-bff3-83c328037853',
            'X-Target-Environment: sandbox',
            'Ocp-Apim-Subscription-Key: f171a702275b4699bd4f99d0f69f1271',
            'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSMjU2In0.eyJjbGllbnRJZCI6IjQ1YzEyMjVhLTg3ZmQtNDk5ZS1iODExLTg2MDliMTU3NGY0NSIsImV4cGlyZXMiOiIyMDIyLTAyLTA5VDA4OjU0OjQ1Ljg2MyIsInNlc3Npb25JZCI6IjYwNTViZmUwLWIwM2QtNGMzOC05Yjg4LTkyZGJiYThlMGU2NCJ9.PXtL-PzULu5Jh_zwGKr6qi_igzqHI-6KQ9xh7atGL-MF913WTkAe93lP9dJRupAyUXKxH1R0XDZ-HYEwSfa2DyFKIyGnW3vVIzK6dAlC7z1AvWTZ7bRioV75Sy9fD6PJ6TFN6N1rJetGxQ8fud5rAx7e_jr1S08wv9DNqugX2hNr8wMmJi0fjbFxpNz2cfpENFJQV0DQEEfJ6urcrBr0s9k6kRP_7Q3x5UiOkYcC_BKlGj-c3o4EDqHg0o6idVy0uHB71AKIJBCLkL--S1qeUdFhbS3GfmokagKtgAVt2z5t2PHecyu-Xy9rp3x3SXIpW2j3qLRuUHVTca1kqAgLuA',
            'Content-Type: application/json'
         ),
      ));

      $response = curl_exec($curl);

      curl_close($curl);
      return $response;

   }

   public function getPaymentStatus()
   {

      $curl = curl_init();

      curl_setopt_array($curl, array(
         CURLOPT_URL => 'https://sandbox.momodeveloper.mtn.com/collection/v1_0/requesttopay/07468375-eb5c-4b21-bff3-83c328037853',
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => '',
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 0,
         CURLOPT_FOLLOWLOCATION => true,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => 'GET',
         CURLOPT_HTTPHEADER => array(
            'Ocp-Apim-Subscription-Key: f171a702275b4699bd4f99d0f69f1271',
            'X-Target-Environment: sandbox',
            'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSMjU2In0.eyJjbGllbnRJZCI6IjQ1YzEyMjVhLTg3ZmQtNDk5ZS1iODExLTg2MDliMTU3NGY0NSIsImV4cGlyZXMiOiIyMDIyLTAyLTA5VDA4OjU0OjQ1Ljg2MyIsInNlc3Npb25JZCI6IjYwNTViZmUwLWIwM2QtNGMzOC05Yjg4LTkyZGJiYThlMGU2NCJ9.PXtL-PzULu5Jh_zwGKr6qi_igzqHI-6KQ9xh7atGL-MF913WTkAe93lP9dJRupAyUXKxH1R0XDZ-HYEwSfa2DyFKIyGnW3vVIzK6dAlC7z1AvWTZ7bRioV75Sy9fD6PJ6TFN6N1rJetGxQ8fud5rAx7e_jr1S08wv9DNqugX2hNr8wMmJi0fjbFxpNz2cfpENFJQV0DQEEfJ6urcrBr0s9k6kRP_7Q3x5UiOkYcC_BKlGj-c3o4EDqHg0o6idVy0uHB71AKIJBCLkL--S1qeUdFhbS3GfmokagKtgAVt2z5t2PHecyu-Xy9rp3x3SXIpW2j3qLRuUHVTca1kqAgLuA'
         ),
      ));

      $response = curl_exec($curl);

      curl_close($curl);
      return $response;
   }

}
