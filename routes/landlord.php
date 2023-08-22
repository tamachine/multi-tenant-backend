<?php

use App\Models\Landlord\Tenant;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function() {
    echo "<h1>nave intergalactica</h1>";

    foreach(Tenant::all() as $tenant) {
        echo "<a href='".$tenant->login_url."'>".$tenant->url."</a><br>";
    }
})
->name('home');