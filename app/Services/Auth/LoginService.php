<?php

namespace App\Services\Auth;

use App\Http\Requests\LoginRequest;
use Illuminate\Validation\ValidationException;
use SebastianBergmann\Type\VoidType;

class LoginService
{
    /**
     * Handle a login request to the application.
     *
     * @param LoginRequest $request
     * @return void
     *
     * @throws ValidationException
     */

    public function handleLogin(LoginRequest $request)
    {
        $data = $request->validated();
        if (auth()->attempt(['email' => $data['email'], 'password' => $data['password']])) {
        auth()->user();

        $role = auth()->user()->roles->pluck('name')[0];
            switch ($role) {
                case "admin":
                    return to_route('admin.dashboard');
                    break;
                case "student":
                    return to_route('student.dashboard');
                    break;
                case "teacher":
                    return redirect('home');
                    break;
                case "school":
                    return to_route('school.index');
                    break;
                case "staff":
                    return redirect('home');
                    break;
                default:
                    return redirect()->back()->withErrors("Ada Yang Salah");
                    break;
            }
        } else {
            return redirect()->back()->withErrors(trans('auth.login_failed'))->withInput();
        }
    }
}
