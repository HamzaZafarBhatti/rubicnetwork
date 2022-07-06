<?php

namespace App\Http\Controllers;

use App\Mail\GeneralEmail;
use App\Models\Etemplate;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function dashboard()
    // {
    //     return view('user.dashboard');
    // }

    /*Language Translation*/
    // public function lang($locale)
    // {
    //     if ($locale) {
    //         App::setLocale($locale);
    //         Session::put('lang', $locale);
    //         Session::save();
    //         return redirect()->back()->with('locale', $locale);
    //     } else {
    //         return redirect()->back();
    //     }
    // }

    // public function updateProfile(Request $request, $id)
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email'],
    //         'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
    //     ]);

    //     $user = User::find($id);
    //     $user->name = $request->get('name');
    //     $user->email = $request->get('email');

    //     if ($request->file('avatar')) {
    //         $avatar = $request->file('avatar');
    //         $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
    //         $avatarPath = public_path('/images/');
    //         $avatar->move($avatarPath, $avatarName);
    //         $user->avatar =  $avatarName;
    //     }

    //     $user->update();
    //     if ($user) {
    //         Session::flash('message', 'User Details Updated successfully!');
    //         Session::flash('alert-class', 'alert-success');
    //         return response()->json([
    //             'isSuccess' => true,
    //             'Message' => "User Details Updated successfully!"
    //         ], 200); // Status code here
    //     } else {
    //         Session::flash('message', 'Something went wrong!');
    //         Session::flash('alert-class', 'alert-danger');
    //         return response()->json([
    //             'isSuccess' => true,
    //             'Message' => "Something went wrong!"
    //         ], 200); // Status code here
    //     }
    // }

    // public function updatePassword(Request $request, $id)
    // {
    //     $request->validate([
    //         'current_password' => ['required', 'string'],
    //         'password' => ['required', 'string', 'min:6', 'confirmed'],
    //     ]);

    //     if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
    //         return response()->json([
    //             'isSuccess' => false,
    //             'Message' => "Your Current password does not matches with the password you provided. Please try again."
    //         ], 200); // Status code
    //     } else {
    //         $user = User::find($id);
    //         $user->password = Hash::make($request->get('password'));
    //         $user->update();
    //         if ($user) {
    //             Session::flash('message', 'Password updated successfully!');
    //             Session::flash('alert-class', 'alert-success');
    //             return response()->json([
    //                 'isSuccess' => true,
    //                 'Message' => "Password updated successfully!"
    //             ], 200); // Status code here
    //         } else {
    //             Session::flash('message', 'Something went wrong!');
    //             Session::flash('alert-class', 'alert-danger');
    //             return response()->json([
    //                 'isSuccess' => true,
    //                 'Message' => "Something went wrong!"
    //             ], 200); // Status code here
    //         }
    //     }
    // }

    public function showLinkRequestForm()
    {
        return view('user.auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        // return $request;
        $validated = $request->validate([
            'email' => 'required|string|email',
        ]);
        $user = User::whereEmail($request->email)->first();
        if (!$user) {
            return back()->with('warning', 'We can\'t find a user with that e-mail address.');
        }
        $to = $user->email;
        $name = $user->name;
        $subject = 'Password Reset';
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        $code = substr(str_shuffle($data), 0, 30);
        $link = route('user.password.reset_token', $code);
        $message = "Use This Link to Reset Password: <br>";
        $message .= "<a href='" . $link . "'>" . $link . "</a>";
        // return $message;
        $is_html = 1;
        DB::table('password_resets')->insert(
            ['email' => $to, 'token' => $code,  'created_at' => date("Y-m-d h:i:s")]
        );
        // send_email($to,  $name, $subject,$message);
        $temp = Etemplate::first();
        Mail::to($to)->send(new GeneralEmail($temp->esender, $name, $message, $subject, $is_html));
        return back()->with('success', 'Password Reset Link Sent To Your E-mail');
    }

    public function showResetForm(Request $request, $token)
    {
        $tk = PasswordReset::where('token', $token)->first();
        // return $tk;
        if (!$tk) {
            return redirect()->route('user.password.reset')->with('error', 'Token Not Found!!');
        }
        $email = $tk->email;
        return view('user.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $email]
        );
    }


    public function reset(Request $request)
    {
        // $this->validate($request, $this->rules(), $this->validationErrorMessages());
        $validated = $request->validate([
            'password' => 'required|string|confirmed',
        ]);
        $tk = PasswordReset::where('token', $request->token)->first();
        $user = User::whereEmail($tk->email)->first();
        if (!$user) {
            return back()->with('warning', 'Email don\'t match!!');
        }
        $user->update(['password' => bcrypt($request->password)]);
        return back()->with('success', 'Successfully Password Reset.');
    }
}
