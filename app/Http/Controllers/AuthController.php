<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Hash;

class AuthController extends Controller
{
    public function chart()
    {
        $cities = Employee::pluck('kota')->unique();
        $cityCount = [];
        // $citiess = Employee::select('kota', \DB::raw('COUNT(*) as count'))
        //     ->groupBy('kota')
        //     ->pluck('count', 'kota');
            // print("dataini  $citiess");
        foreach ($cities as $kota) {
            $cityCount[$kota] = Employee::where('kota', $kota)->count();
        }

        return response()->json($cityCount);
    }
    public function show()
    {
        $employees = Employee::orderBy('nama', 'ASC')->paginate(10);
        // $employees = Employee::all();
        return view('welcome', ['employees' => $employees]);
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' =>
            'required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Auth success
            auth()->login($user);

            $employees = Employee::all();
            return view('welcome', ['employees' => $employees]);
        }

        // Auth failed
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}
