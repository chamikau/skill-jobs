<?php

namespace App\Services;

use Carbon\Carbon;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class WherebyMeetingService
{
    private string $accessToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJodHRwczovL2FjY291bnRzLmFwcGVhci5pbiIsImF1ZCI6Imh0dHBzOi8vYXBpLmFwcGVhci5pbi92MSIsImV4cCI6OTAwNzE5OTI1NDc0MDk5MSwiaWF0IjoxNjU3Mjc5MjkxLCJvcmdhbml6YXRpb25JZCI6MTY0MTE1LCJqdGkiOiI5ZDhlZjM0MC00ZTc0LTRlOWQtYTRiNS04ZTdlZWJiOTIyYTcifQ.GeUFjgocS6bLO3eUMpjSfEXWudexOVdYvvWsD9WBQ90';
    private string $_baseUrl = 'https://api.whereby.dev/v1/meetings';

    public function __construct()
    {
        //$this->accessToken = $accessToken;
    }

    /**
     * @param $data
     * @return PromiseInterface|Response
     */
    public function create($start_date_time): PromiseInterface|Response
    {
        $data = [
            "isLocked" => false,
            "roomNamePrefix" => "",
            "roomNamePattern" => "uuid",
            "roomMode" => "normal",
            "endDate" => Carbon::parse($start_date_time)->addDay(5),
            "fields" => ["hostRoomUrl", "viewerRoomUrl"]
        ];
        return Http::withToken($this->accessToken)->post($this->_baseUrl, $data);
    }

    /**
     * @param $meeting_id
     * @return PromiseInterface|Response
     */
    public function delete($meeting_id): PromiseInterface|Response
    {
        return Http::withToken($this->accessToken)
            ->delete($this->_baseUrl .'/'. $meeting_id);
    }

}
