<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Alexaandrov\GraphQL\Facades\Client;


class TestController extends Controller
{
    public function index()
    {
         $query = <<<QUERY
         divisions{
            id,
            name
          }
QUERY;
$queryResponse = Client::fetch($query);
dd($queryResponse);

    
    }
}
