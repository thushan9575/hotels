<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index()
    {
        $authUser = Auth::user();

        if($authUser?->usertype === 'admin'){
            return Inertia::render('Home/admin', ['auth_user' => $authUser]);
        }

        return Inertia::render('Home/index', ['auth_user' => $authUser]);
    }
}