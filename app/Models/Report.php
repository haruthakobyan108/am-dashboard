<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Report extends Model
{
    use CrudTrait;

    protected $connection = 'pgsql';

    public function partnerCountEventCount(): \Illuminate\Support\Collection
    {
        return DB::connection('friendship')->table("events")
            ->select('events.sport_name','events.region_name','events.league_name','events.start_date',
                DB::raw('count(distinct product_mygames_map.organization_id) as "FS Total Booking Count"'))
            ->whereBetween('start_date', ['2021-08-01', '2021-09-01 00:00:00'])
            ->leftJoin('product_mygames_map','events.id','=','product_mygames_map.event_id')
            ->groupBy(['sport_name','region_name','league_name','start_date'])->get();
    }

    public static function getStreamerReport($from, $to): array
    {
        return DB::connection('friendship')->select("
            select
                e.id           as `match_id`,
                s.name         as `sport_name`,
                r.name         as `region`,
                l.name         as `league`,
                e.start_date   as `date`,
                e.match_status as `status`,
                u.first_name   as `streamer_name`,
                u.last_name    as `streamer_lastname`
            from product_event_maps
                join events e on product_event_maps.event_id = e.id
                join sports s on e.sport_id = s.id
                join leagues l on e.league_id = l.id and s.id = l.sport_id
                join users u on product_event_maps.content_providing_user_id = u.id
                join regions r on e.region_id = r.id
            where date(e.start_date) BETWEEN '".$from."' and '".$to."' and
            product_event_maps.organization_id = 10 and
            (
                product_event_maps.match_status = 3 or
                product_event_maps.match_status = 2
            ) order by e.match_status
       ");
    }
}
