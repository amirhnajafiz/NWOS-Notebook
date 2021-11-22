<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Jobs\NotifyUser;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * This method creates a notification for a user.
     *
     * @param User $user
     * @param Notification $notification
     * @return JsonResponse
     */
    private function call_user(User $user, Notification $notification): JsonResponse
    {
        NotifyUser::dispatch(['user' => $user, 'notification' => $notification])
            ->delay(now()->addMinutes(5));

        return response()
            ->json([
                'user' => $user->id,
                'notify' => 'success'
            ]);
    }
}
