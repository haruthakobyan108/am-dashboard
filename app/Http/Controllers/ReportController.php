<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Http\Resources\ReportResource;
use App\Models\Report;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use JetBrains\PhpStorm\NoReturn;

class ReportController extends Controller
{
    /**
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    #[NoReturn] public function getStreamerReport(ReportRequest $request): AnonymousResourceCollection
    {
        $diff = Carbon::parse($request->input('from'))->diffInDays( $request->input('to'));
        if($diff > 31 ){
            return response()->json(['message' => 'the date interval can\'t be grader then 31 days ']);
        }
        return ReportResource::collection(Report::getStreamerReport($request->input('from'), $request->input('to')));
    }
}
