<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //Validate Inputs
        $request->validate([
            'first_name'      => 'required|string|max:255',
            'last_name'       => 'required|string|max:255',
            'email'           => 'required|email|unique:users,email',
            'password'        => 'required|confirmed|min:5|max:30',
            'mobile_number'   => 'required|string|min:10|max:25',
            'checkbox'        => 'required',
        ]);

        $user = new User();
        $user->first_name    = $request->first_name;
        $user->last_name     = $request->last_name;
        $user->email         = $request->email;
        $user->password      = Hash::make($request->password);
        $user->mobile_number = $request->mobile_number;
        $save                = $user->save();

        if ($save) {
            return redirect()->back()->with('success', 'تم إنشاء الحساب بنجاح');
        } else {
            return redirect()->back()->with('fail', 'حدث خطأ ما، فشل تسجيل الحساب');
        }
    }

    public function check(Request $request)
    {
        //Validate inputs
        $request->validate([
            'email'    => 'required|email|exists:users,email',
            'password' => 'required|min:5|max:30'
        ], [
            'email.exists'    => 'البريد الإلكتروني غير مطابق',
            'password'        => 'كلمة المرور غير صحيحية'
        ]);

        $creds = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($creds)) {
            return redirect()->route('user.home')->with('Ok',  'تم تسجيل الدخول بنجاح');
        } else {
            return redirect()->route('user.login')->with('fail', 'بيانات الاعتماد غير صحيحة');
        }
    }

    public function edit()
    {
        $user = User::find(Auth::user()->id);
        return view('User.Profile.editprofile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        Validator::make(
            $request->all(),
            [
                'first_name'      => 'required|string|max:255',
                'last_name'       => 'required|string|max:255',
                'email'           => 'required|string|email', Rule::unique('users')->ignore(Auth::user()->id),
                'password'        => 'required|confirmed|string|min:5|max:30',
                'mobile_number'   => 'required|string|min:10|max:25',
            ]
        );

        $user = User::find($id);
        $user->update([
            'first_name'     => $request->first_name,
            'last_name'      => $request->last_name,
            'email'          => $request->email,
            'mobile_number'  => $request->mobile_number,
            'password'       => Hash::make($request->password),
        ]);

        if ($user) {
            request()->session()->flash('success', 'تم تحديث بيانات المستخدم بنجاح');
            return redirect()->route('user.home');
        } else {
            // request()->session()->flash('danger', 'حدث خطأ ما، فشل تعديل بيانات المستخدم');
            // return redirect()->back()->with('fail', 'حدث خطأ ما، فشل تسجيل الحساب');
            return redirect()->route('user.editProfile')->with('fail', 'بيانات الاعتماد غير صحيحة');
        }
    }

    function logout()
    {
        Auth::logout();

        return redirect('/welcome');
    }
}
