<?php

namespace App\Http\Controllers;

use App\Events\MessageChanged;
use App\Models\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function create(Request $request): JsonResponse
    {
        $user = Auth::user();
        $message = Message::create([
            'user_id' => Auth::user()->id,
            'message' => $request->message,
        ]);
        broadcast(new MessageChanged($user, $message->message));

        return response()->json([
            'code' => 200,
        ], 200);
    }
}
