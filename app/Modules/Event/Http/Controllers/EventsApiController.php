<?php

namespace App\Modules\Event\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventsApiController extends Controller
{
    public function handleRegistration(Request $request)
    {
        return $request;
    }
}
