<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\RoomsController;
use App\Models\Room;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/rooms', [RoomsController::class, 'index'])->name('rooms.index');

Route::get('/rooms/{room}', function(Room $room){
    return view('rooms.chat', [
        'roomId' => $room->id,
        'room' => $room,
        'messages' => []
    ]);
})->name('rooms.show');

Route::post('/rooms/{roomId}/message', [ChatController::class, 'postMessage'])->name('api.rooms.message.post');
