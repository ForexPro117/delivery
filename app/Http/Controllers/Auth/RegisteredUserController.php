<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\EmployerData;
use App\Models\User;
use App\Models\UserData;
use Composer\Util\Http\Response;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('reg');
    }

    public function createUser()
    {
        return view('registrationUser');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => ['required','integer', 'between:10000000,99999999','unique:users,user_code'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'name' => 'required|string|min:10|max:255',
        ]);

        $user = new User();
        $user->user_code = $request->code;
        $user->name = $request->name;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();



        event(new Registered($user));

        Auth::login($user);

        return redirect('/');
    }
    public function storeUser(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'name' => 'required|string|max:60',
            'lastname' => 'required|string|max:60',
            'phoneNumber' => 'required|integer|min:100000|max:89999999999',
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->role = 'user';
        $user->password = Hash::make($request->password);
        $user->save();

        $userdata = new UserData();
        $userdata->user_id = $user->id;
        $userdata->name = $request->name;
        $userdata->lastname = $request->lastname;
        $userdata->phone_number = $request->phoneNumber;
        $userdata->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect('/');
    }
}
