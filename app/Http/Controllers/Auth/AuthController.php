<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function loginForm()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ], [
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Email harus dalam format yang valid.',
            'password.required' => 'Password tidak boleh kosong.',
            'password.min' => 'Password minimal 8 karakter.',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Periksa level pengguna dan tentukan redirect yang sesuai
            $redirectPath = $this->getRedirectPath(Auth::user()->level);

            return redirect()->intended($redirectPath)->with('toast_success', 'Anda berhasil login!');
        } else {
            // Jika autentikasi gagal, tampilkan pesan error
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        // return view('pelanggan.dahsboard.index');
        return redirect('/');
    }

    protected function getRedirectPath($userLevel)
    {
        switch ($userLevel) {
            case 'Merchant':
                return '/dashboard';
            default:
                return '/';
        }
    }

    public function showRegistrationFormMerchant()
    {
        return view('auth.registerM');
    }

    public function registerMerchant(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        // Create a new user with role 'Merchant'
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => 'Merchant',
        ]);

        // Log the user in after registration
        Auth::login($user);

        return redirect('/')->with('toast_success', 'Registrasi berhasil!');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle registration form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        // Create a new user with level 'pelanggan'
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'level' => 'Customer',
        ]);


        // Log the user in after registration
        Auth::login($user);

        return redirect('/')->with('toast_success', 'Registrasi berhasil!');
    }
}
