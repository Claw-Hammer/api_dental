<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use League\Flysystem\Config;
use Psy\Util\Json;

class FetchController extends Controller
{
    public function fetch(): Json
    {
        $response = Http::get('https://quizapi.io/api/v1/questions', [
            'apiKey' => config('services.questions_api.key'),
            'category' => 'linux',
            'limit' => 3,

        ]);

        $myJsonResponse = json_decode($response->body());
        dd($myJsonResponse);
    }
}
