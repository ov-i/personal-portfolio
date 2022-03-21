<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use phpDocumentor\Reflection\Types\Collection;

class AuthController extends Controller
{
    /**
     * return view for auth
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function login(): View|Factory|RedirectResponse|Application
    {
        if (auth()->check())
            return redirect()->route('blog.index');

        return view('auth.login');
    }

    /**
     * authenticates user
     *
     * @param AuthRequest $request
     * @return RedirectResponse
     */
    public function authenticate(AuthRequest $request): RedirectResponse
    {
        $email = htmlentities($request['email']);
        $password = htmlentities($request['password']);
        $remember = $request->boolean('remember');

        $user = User::where('email', '=', $email)->first();
        if (!$user)
            return redirect()->route('auth.login')
                ->with('notFound', "Nie można odanelźć użytkownika o adresie {$email}");

        $logged_in = auth()->attempt(['email' => $email, 'password' => $password], $remember);
        if (!$logged_in)
            return redirect()->route('auth.login')
                ->with('badCredentials', 'Nieprawidłowe dane logowania');

        return redirect()->route('blog.index');
    }

    /**
     * logouts the user
     *
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        if (auth()->check())
            auth()->logout();

        return redirect()->route('blog.index');
    }

    /**
     * gets logged in user roles
     *
     * @return null | array
     */
    public function getUserRole(): ?array
    {
        if (!auth()->check())
            return null;

        return auth()->user()->roles()->get()->toArray();
    }

    /**
     * checks if user is admin
     *
     * @return bool|null
     */
    public function isAdmin(): ?bool
    {
        if (!auth()->check())
            return null;

        $isAdmin = false;
        foreach ($this->getUserRole() as $key => $roles) {
            if (isset($roles['name']) && $roles['name'] === 'Administrator')
                $isAdmin = true;
        }

        return $isAdmin;
    }
}
