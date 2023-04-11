<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $match_id
 * @property string $region
 * @property string $league
 * @property string $date
 * @property string $status
 * @property int $streamer_name
 * @property string $streamer_lastname
 * @property string $sport_name
 * @property string $team_1_name
 * @property string $team_2_name
 * @property string $provider
 */
class ReportResource extends JsonResource
{


    final public function toArray($request): array
    {
        return  [
            'match_id' => $this->match_id,
            'sport_name' => $this->sport_name,
            'region' => $this->region,
            'league' => $this->league,
            'date' => $this->date,
            'status' => $this->status,
            'streamer_name' => $this->streamer_name,
            'streamer_lastname' => $this->streamer_lastname,
            'team_1_name' => $this->team_1_name,
            'team_2_name' => $this->team_1_name,
            'provider' => $this->provider
        ];
    }

}
