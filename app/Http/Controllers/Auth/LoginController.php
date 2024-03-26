<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        // Verificar el rol del usuario después de iniciar sesión
        if ($user->role === 'super_admin') {
            return redirect()->route('superadmin.dashboard');
        }

        // Si no es superadmin, redirigir al home
        return redirect($this->redirectTo);
    }
    
}
