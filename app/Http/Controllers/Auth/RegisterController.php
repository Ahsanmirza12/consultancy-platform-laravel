<?php

// app/Http/Controllers/Auth/RegisterController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }
    

    public function showForm()
    {
        return view('auth.register');
    }
    public function index()
    {
        $users = $this->userRepo->getAllPaginated();
        
        return view('users.index', compact('users'));
    }

    public function store(RegisterRequest $request)
{
    $user = $this->userRepo->create($request->validated());

    Auth::login($user);
    $user->notify(new \App\Notifications\PackageSubscribed());
    if ($user->role === 'admin') {
        return redirect()->route('dashboard'); // admin ko dashboard pr bhejo
    } elseif ($user->role === 'user') {
        return redirect()->route('packages.create'); // user ko buy-package pr bhejo
    }

    // agar koi aur role hai to logout karke error dikhao
    Auth::logout();
    return redirect()->route('login')->withErrors('Only admins or users can register.');
}
public function destroy($id)
{
    $this->userRepo->delete($id);
    return redirect()->route('users.index')->with('success', 'User deleted successfully.');
}
}

