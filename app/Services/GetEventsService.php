<?php
namespace App\Services;

use App\Models\Event;
use App\Models\Organizations;
use Illuminate\Support\Facades\DB;

class GetEventsService
{
    public static function getEvents()
    {
//        $countries =  DB::connection('friendship')->table("organizations")->offset(1)->limit(2)->get();
        $countries =  new Organizations;
        $countries->offset(0)->limit(10)->get();
       foreach ($countries as $country){
           $count [] = [
               "client_id" => $country->client_id,
               "name" => $country->name,
               "image" => $country->image,
               "phone" => $country->phone,
               "address" => $country->address,
               "time_zone" => $country->time_zone,
               "sport_id" => $country->sport_id,
               "country_code" => $country->country_code,
               "domain" => $country->domain,
               "active" => $country->active,
               "created_at" => $country->created_at,
               "updated_at" => $country->updated_at,
               "partner_id" => $country->partner_id,
               "payment_type" => $country->payment_type,
               "pending_withdraw_count" => $country->pending_withdraw_count,
               "pending_withdraw_balance" => $country->pending_withdraw_balance,
               "balance" => $country->balance,
               "approve_status" => $country->approve_status,
               "is_enabled" => $country->is_enabled,
               "template_id" => $country->template_id,
               "partnership_type" => $country->partnership_type,
               "start_date" => $country->start_date,
               "end_date" => $country->end_date,
               "league_ids" => $country->league_ids,
               "sport_ids" => $country->sport_ids,
               "email" => $country->email,
               "is_api_partner" => $country->is_api_partner,
               "payment_balance" => $country->payment_balance,
               "scout_event_price" => $country->scout_event_price,
               "scout_payment_method" => $country->scout_payment_method,
               "payments_status" => $country->payments_status,
               "is_test" => $country->is_test,
               "website" => $country->website,
               "project_manager" => $country->project_manager,
               "account_manager" => $country->account_manager,
               "sales_manager" => $country->sales_manager,
               "bme_status" => $country->bme_status,

           ] ;
       }

//        try
//        {
//            DB::connection('pgsql')->table("organizations")->insert($count);
//        }catch (\Exception $exception){
//           echo $exception->getMessage();
//        }


       echo '<pre>';
       print_r($count);
      return true;




        $x =  DB::connection('friendship')->table("events")->orderByDesc('id')->limit(20)->offset(0)->get();
        $data = [];
        foreach ($x->toArray() as $val){
            $data[] = json_decode(json_encode($val), true);
        }


        try {
            DB::connection('pgsql')->table("events")->insert($data);
        }catch (\Exception $exception){
            echo $exception->getMessage();
        }

    }
}

