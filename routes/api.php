<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/posts',function(){
//     return response()->json([
//         'posts' => [
//             [
//                 'title' => 'lupang hinirang',
//                 'content' => 'sheesh',
//                 'released_date' => 2022
//             ],
//             [
//                 'title' => 'what gon they say',
//                 'content' => 'ron suno song',
//                 'released_date' => 2021
//             ],
//         ]
//     ]);
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
