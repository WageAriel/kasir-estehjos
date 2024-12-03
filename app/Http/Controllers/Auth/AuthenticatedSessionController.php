<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'), // Menampilkan pesan status dari sesi jika ada
            'isAuthenticated' => auth()->check(), // Mengirim status autentikasi
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Autentikasi pengguna
        $request->authenticate();

        // Regenerasi sesi untuk keamanan
        $request->session()->regenerate();

        // Menyimpan data pengguna di sesi
        session([
            'user_id' => Auth::id(), // Menyimpan ID pengguna dalam sesi
            'user_name' => Auth::user()->name, // Menyimpan nama pengguna dalam sesi
            'user_email' => Auth::user()->email, // Menyimpan email pengguna dalam sesi
        ]);

        // Menyimpan status login sukses di sesi
        session()->flash('status', 'You are logged in successfully!');

        // Mengarahkan ke dashboard atau rute yang dimaksud
        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Logout pengguna
        Auth::guard('web')->logout();

        // Menghapus data sesi
        $request->session()->invalidate();

        // Regenerasi token sesi untuk keamanan
        $request->session()->regenerateToken();

        // Menyimpan pesan status logout di sesi
        session()->flash('status', 'You have logged out successfully!');

        // Mengarahkan ke halaman login
        return redirect('/login');
    }

    
}
