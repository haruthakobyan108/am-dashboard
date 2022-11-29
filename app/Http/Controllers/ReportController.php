<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Http\Resources\EmptyResource;
use App\Http\Resources\ReportResource;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use JetBrains\PhpStorm\NoReturn;

class ReportController extends Controller
{
    /**
     * @param ReportRequest $request
     * @return AnonymousResourceCollection|EmptyResource
     */
    #[NoReturn] public function getStreamerReport(ReportRequest $request): ReportResource|EmptyResource
    {
        $diff = Carbon::parse($request->input('from'))->diffInDays( $request->input('to'));
        if($diff > 31 ){
            return new EmptyResource(['message' => 'report interval can\'t  be more then 31 days']);
        }
        return ReportResource::collection(Report::getStreamerReport($request->input('from'), $request->input('to')));
    }
}
