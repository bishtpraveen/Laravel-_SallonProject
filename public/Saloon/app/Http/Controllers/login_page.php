<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\register;
use App\shop_info;
use Cookie;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Mail;
class login_page extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session_email = Session::get('register_email');
        $cookie_email = Cookie::get('register_email');
        $get_shop_info_query_all = shop_info::distinct('images')->pluck('images','specillaty_service');
        if(($session_email) || ($cookie_email)){
            session()->flash('Already_Login','Already Login');
            return redirect('/');
        }else{
            return view('login_page')->with('shop_navbar_info',$get_shop_info_query_all);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login_check(Request $request)
    {
        $data = request()->all();
        $login_check_query = register::where(['email'=>$data['email'],'password'=>$data['password']])->first();
        $login_check_query_exists = register::where(['email'=>$data['email'],'password'=>$data['password']])->exists();
        // echo $login_check_query;
        // die();
        if(!$login_check_query_exists == ''){
            if($login_check_query->user_type == 'user'){
                if($request->has('remember-me')){
                    Cookie::queue(Cookie::make('register_email',$login_check_query->email,900)); 
                    Cookie::queue(Cookie::make('contact',$login_check_query->contact,900)); 
                    Cookie::queue(Cookie::make('register_name',$login_check_query->name,900)); 
                    Cookie::queue(Cookie::make('provider_user_id',$login_check_query->provider_user_id,900)); 
                    Cookie::queue(Cookie::make('user_type',$login_check_query->user_type,900)); 
                    // Session::put('register_email',$login_check_query->email);   
                    // Session::put('provider_user_id',$login_check_query->provider_user_id);
                    return redirect('/');
                }else{
                    Session::put('register_email',$login_check_query->email);  
                    Session::put('register_name',$login_check_query->name);  
                    Session::put('contact',$login_check_query->contact);  
                    Session::put('provider_user_id',$login_check_query->provider_user_id);
                    Session::put('user_type',$login_check_query->user_type);
                    return redirect('/');
                }
            }
            else{
                if($request->has('remember-me')){
                    Cookie::queue(Cookie::make('register_email',$login_check_query->email,900)); 
                    Cookie::queue(Cookie::make('register_name',$login_check_query->name,900)); 
                    Cookie::queue(Cookie::make('provider_user_id',$login_check_query->provider_user_id,900)); 
                    Cookie::queue(Cookie::make('user_type',$login_check_query->user_type,900)); 
                    // Session::put('register_email',$login_check_query->email);   
                    // Session::put('provider_user_id',$login_check_query->provider_user_id);
                    return redirect('s_p-index');
                }else{
                    Session::put('register_email',$login_check_query->email);  
                    Session::put('register_name',$login_check_query->name);  
                    Session::put('provider_user_id',$login_check_query->provider_user_id);
                    Session::put('user_type',$login_check_query->user_type);
                    return redirect('s_p-index');
                }
            }
        }
        else{
            session()->flash('login_error','Your credentials are wrong. Check it again');
            return redirect('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function password_reset(Request $request)
    {
        // $email_check_exists = register::where('email',$request->input('email'))->exists();
        $email_check_first = register::where('email',$request->email)->first();
        if(!$email_check_first) return 'no_email';

            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => str_random(60), //change 60 to any length you want
                'created_at' => Carbon::now()
            ]);
            $tokenData = DB::table('password_resets')->where('email', $request->email)->first();
            $token = $tokenData->token;
            $email = $request->email; // or $email = $tokenData->email;
            $mail_data = array('token'=>$token,'email'=>$email);
            Mail::send('email_view.password_reset_mail',$mail_data,function($m) use ($mail_data){
                $m->to($mail_data['email'])->subject($mail_data['token']);
                $m->from('xyz@gmail.com','Appointment Desk');
            });
            return 'valid';   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function token_check_new_pass_page($token)
    {
        $tokenData = DB::table('password_resets')->where('token', $token)->first();
        session()->flash('token_expire','Your token is expired , Please apply again for forget password to change the password. ');
        if (!$tokenData ) return redirect('/'); //redirect them anywhere you want if the token does not exist.
        session()->flash('token_received');
        return view('password_reset_page')->with('tt',$tokenData->token);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function new_password_set(Request $request, $token)
    {
        $data=request()->all();
        
        $password = $data['new_pass'];
        $tokenData = DB::table('password_resets')->where('token', $token)->first();
        $user = register::where('email', $tokenData->email)->first();
        // $user->password = Hash::make($password);
        $user->password = $password ;
        $user->update();
        DB::table('password_resets')->where('email', $user->email)->delete();
        session()->flash('pass_chng_success','You need to login again with new password.');
        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Session::flush();
        Cookie::queue(Cookie::forget('register_email'));
        return redirect('/');
    }
    public function destroy($id)
    {
        //
    }
}
