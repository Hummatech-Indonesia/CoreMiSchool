<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $fullDomain = request()->root();
        // dd($fullDomain);

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken($request->email)->plainTextToken;
                return response()->json([
                    'message' => 'Berhasil login',
                    'token' => $token,
                    'data' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'role' => $user->roles->first()->name,
                        'password' => $user->password,
                        'image' => $user->roles->first()->name == 'student' ? ($user->student->image ? asset($fullDomain.'/storage/'.$user->student->image) : asset($fullDomain.'/public/admin_assets/dist/images/profile/user-1.jpg')) : ($user->employee->image ? asset($fullDomain.'storage/'.$user->employee->image) : asset($fullDomain.'/public/admin_assets/dist/images/profile/user-1.jpg')),
                        'point' => $user->roles->first()->name == 'student' ? $user->student->point : 0,
                    ],
                ]);
            } else {
                return response()->json(['message' => 'Password salah'], 401);
            }
        } else {
            return response()->json(['message' => 'Email dan Password salah'], 401);
        }
    }
}
