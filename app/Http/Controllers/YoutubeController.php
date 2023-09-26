<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Google_Client;
use Google_Service_YouTube;

class YoutubeController extends Controller
{
    const MAX_SNIPPETS_COUNT = 50;
    const DEFAULT_ORDER_TYPE = 'viewCount';

   
}
