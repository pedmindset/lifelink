<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Event;
use App\Models\Payment;
use App\Models\Profile;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardView extends Component
{
   public $monthPayment, $monthEvents, $monthUsers, $barData;
   public $conferences, $aluminias, $totalUsers;
   public function render()
   {
      return view('livewire.dashboard-view');
   }

   public function mount()
   {
      $pays = Payment::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->sum('amount');
      $paysin = Payment::latest()->get();
      $this->monthEvents = Event::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
      $this->monthUsers = User::role('customer')->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
      $this->monthPayment = round($pays, 2);
      $this->barData = $this->createMonthlyArray($paysin);

      $this->aluminias = Profile::where('aluminia', 1)->get()->count();
      $this->totalUsers = User::get()->count();
      $this->conferences = Event::get()->count();
      // dd($this->barData);
   }

   private function createMonthlyArray($data)
   {
      $inv = $data->groupBy(function ($d)
      {
         return Carbon::parse($d->created_at)->format('m');
      });
      $datas = [];
      $invs = array();
      foreach ($inv as $key => $monthPay) {
         // $datas[(int)$key] = count($value);
         $sum = [];
         foreach ($monthPay as $k => $item) {
            array_push($sum,$item->amount);
         }

         $val = array_sum($sum) / 10;

         $datas[(int)$key] = $val;
      }

      for ($i=1; $i <= 12; $i++) {
         if (isset($datas[$i])) {
            // $array_data = [
               // 'month' => date('M', mktime(0,0,0,$i,10)),
               // 'value' => $datas[$i],
            //    $datas[$i],
            // ];
            array_push($invs,$datas[$i]);
         }
         else {
            array_push($invs, 0);
         }
      }
      return $invs;
   }

}
