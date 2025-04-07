<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AgentLoginController extends LoginController
{
    /**
     * Show the agent login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.agent-login');
    }

    /**
     * Attempt to log the agent into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['role'] = 'agent';
        $credentials['is_active'] = true;

        return Auth::attempt($credentials, $request->boolean('remember'));
    }

    /**
     * Get the post login redirect path.
     *
     * @return string
     */
    protected function redirectPath()
    {
        return '/agent/dashboard';
    }
} 