<?php

namespace App\Http\Middleware;
use App\verify_email;
use App\register;
use Session;
use Cookie;
use Closure;

class user_login_check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $session_email = Session::get('register_email');
        $cookie_email = Cookie::get('register_email');
        if((!$session_email) && (!$cookie_email)){
            session()->flash('Login_required','Please Login');
            return redirect('/');
        }else{
            $verify_email = verify_email::where(['status'=>'no_verified'])->where(['user_email'=>$cookie_email,'user_email'=>$session_email])->exists();
            if($verify_email == 1){
                Session::flush();
                Cookie::queue(Cookie::forget('register_email'));
                session()->flash('Please_verify_first','Your Email is not verified. Please verify it. We have send a verification mail to your registered mail.');
                return redirect('/');
            }else{
                $verify_email_delete = verify_email::where('user_email',$session_email)->orWhere('user_email',$cookie_email)->delete();
                $register_check = register::where('email',$session_email)->orWhere('email',$cookie_email)->first();
                // echo '<pre>';
                // print_r($register_check);
                // die();
                if($register_check->user_type == 'user'){
                    // return redirect('index');
                    return $next($request);
                }else{
                    return redirect('s_p-index');
                }
            }
        }
        
    }
}
