<?php

use App\Models\ArchiveBoard;
use App\Models\Field;
use Illuminate\Support\Facades\Route;
use function Psy\debug;

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
    return view('home');
});
Route::get('/cupboard', function () {
    $archives=ArchiveBoard::all();

    return view('cupboard',compact('archives'));
});
Route::post('/list/{id}', function ($id) {
$fields=Field::where('archive_board_id', $id)->get();
return view('fields',compact('fields'));

});


Route::resource('folder', 'App\Http\Controllers\FolderController');
Route::resource('file', 'App\Http\Controllers\FileController');
Route::get('/home/search', 'App\Http\Controllers\FolderController@search');