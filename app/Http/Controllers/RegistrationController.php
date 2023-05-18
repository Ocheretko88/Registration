<?php

namespace App\Http\Controllers;

use App\Services\RegistrationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    protected RegistrationService $registrationService;

    public function __construct(RegistrationService $registrationService)
    {
        $this->registrationService = $registrationService;
    }

    public function register(Request $request, RegistrationService $userService): JsonResponse
    {
        $result = $userService->registerUser(
            $request->get('firstName'),
            $request->get('lastName'),
            $request->get('email'),
            $request->get('password'),
            $request->get('confirmPassword')
        );

        return response()->json($result);
    }

    public function index(): View
    {
        return view('index');
    }
}
