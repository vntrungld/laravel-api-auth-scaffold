<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use Illuminate\Support\Facades\Password;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ForgotPasswordController extends Controller
{
    /**
     * Send a reset link to the given user.
     *
     * @param ForgotPasswordRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(ForgotPasswordRequest $request)
    {
        $response = Password::broker()->sendResetLink(
            $request->only('email')
        );

        if ($response !== Password::RESET_LINK_SENT) {
            throw new BadRequestHttpException(trans($response));
        }

        return response()->json(['message' => trans($response)]);
    }
}
