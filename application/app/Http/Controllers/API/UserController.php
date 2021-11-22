<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Jobs\NotifyUser;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class UserController handles the user features.
 *
 * @package App\Http\Controllers\API
 */
class UserController extends Controller
{
    /**
     * Creating a user method.
     *
     * @param CreateUserRequest $request
     * @return JsonResponse
     */
    public function create_user(CreateUserRequest $request): JsonResponse
    {
        $user = User::query()
            ->create($request->all());

        return response()
            ->json([
                'user' => $user->id,
                'status' => 'Success',
                'password' => $user->password,
            ]);
    }

    /**
     * Method for removing a user.
     *
     * @param $id
     * @return JsonResponse
     */
    public function remove_user($id): JsonResponse
    {
        User::query()
            ->findOrFail($id)
            ->delete();

        return response()
            ->json([
                'status' => 'Deleted'
            ]);
    }

    /**
     * This method creates a notification for a user.
     *
     * @param Request $request
     * @return JsonResponse
     */
    private function call_user(Request $request): JsonResponse
    {
        $user = User::query()
            ->firstOrFail($request->get('user_id'));

        $notification = Notification::query()
            ->create($request->all());

        NotifyUser::dispatch(['user' => $user, 'notification' => $notification])
            ->delay(now()->addMinutes(5));

        return response()
            ->json([
                'user' => $user->id,
                'notify' => 'success',
                'id' => $notification->id,
            ]);
    }
}
