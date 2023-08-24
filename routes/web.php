<?php

use App\Models\Division;
use Softonic\GraphQL\ClientBuilder;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UpazilaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $client = ClientBuilder::build('http://laravel-graphql.test/graphql');
    $query = '
     query{
        divisions{
          id,
          name,
          districts{
            id,
            name,
            upazilas{
                id,
                name
            }
          }
        }
      }
    ';
    $response = $client->query($query);
    return $response->getData();
});

Route::get('/upazila',[UpazilaController::class,'index']);
Route::get('/get-data',[UpazilaController::class,'getData'])->name('upazilas.index');