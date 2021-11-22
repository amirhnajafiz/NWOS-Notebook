<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\RemoveUserRequest;
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
        $validated = $request->validated();
        $user = User::query()
            ->create($validated);

        return response()
            ->json([
                'user' => $user->id,
                'status' => 'successfully registered',
                'password' => $user->password,
            ]);
    }

    /**
     * Method for removing a user.
     *
     * @param RemoveUserRequest $request
     * @return JsonResponse
     */
    public function remove_user(RemoveUserRequest $request): JsonResponse
    {
        $validated = $request->validated();

        User::query()
            ->findOrFail($validated['id'])
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
            ->firstOrFail($request->get('to_id'));

        unlink($request->get('to_id'));

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
