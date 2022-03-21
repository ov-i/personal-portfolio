<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use http\Message;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use MongoDB\Driver\Session;
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

        $user = User::query()->where('email', '=', $email);
        if (!$user->first()) {
            \Illuminate\Support\Facades\Session::flash('notFound', "Nie można odnaleźć użytkownika o adresie {$email}");
            return redirect()->route('auth.login');
        }

        if ($user->first()->banned) {
            \Illuminate\Support\Facades\Session::flash('userBanned', "To konto jest zablokowane.");
            return redirect()->route('auth.login');
        }

        $logged_in = auth()->attempt(['email' => $email, 'password' => $password], $remember);
        if (!$logged_in) {
            \Illuminate\Support\Facades\Session::flash('loginFailed', "Podano błędne dane.");
            return redirect()->route('auth.login');
        }

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
