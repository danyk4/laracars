<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Sessions\StoreSessionsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Sessions extends Controller
{
    public function create()
    {
        return view('auth.sessions.create');
    }

    public function store(StoreSessionsRequest $request)
    {
        $request->tryAuthUser();
        $request->session()->regenerate();

        return redirect()->intended('/admin/cars');
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
