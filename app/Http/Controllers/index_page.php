<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\verify_email;
use App\register;
use App\shop_info;
use App\comment;
use Session;
use Cookie;
use File;
class index_page extends Controller
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
        $get_shop_info_query_all = shop_info::where('user_type','sfh')->distinct('images')->pluck('images','specillaty_service');
        $get_shop_info_price = shop_info::latest('created_at')->take(3)->get();
        $get_shop_info_blog = shop_info::latest('created_at')->take(4)->get();
        $get_comment_query = comment::latest('created_at')->take(4)->get();
        // echo '<pre>';
        // print_r($get_shop_info_blog);
        // die();
        if((!$session_email) && (!$cookie_email)){
            session()->flash('Login_required','Please Login');
            return view('index')->with('shop_navbar_info',$get_shop_info_query_all)->with('shop_price',$get_shop_info_price)->with('comment_data',$get_comment_query)->with('shop_blog',$get_shop_info_blog);
        }else{
            $verify_email = verify_email::where(['status'=>'no_verified'])->where('user_email',$session_email)->orWhere('user_email',$cookie_email)->exists();
            if($verify_email == 1){
                Session::flush();
                Cookie::queue(Cookie::forget('register_email'));
                session()->flash('Please_verify_first','Your Email is not verified. Please verify it. We have send a verification mail to your registered mail.');
                return redirect('/')->with('shop_navbar_info',$get_shop_info_query_all)->with('shop_price',$get_shop_info_price)->with('comment_data',$get_comment_query)->with('shop_blog',$get_shop_info_blog);
            }else{
                $verify_email_delete = verify_email::where('user_email',$session_email)->orWhere('user_email',$cookie_email)->delete();
                $register_check = register::where('email',$session_email)->orWhere('email',$cookie_email)->first();
                if($register_check->user_type == 'user'){
                    return view('index')->with('shop_navbar_info',$get_shop_info_query_all)->with('shop_price',$get_shop_info_price)->with('comment_data',$get_comment_query)->with('shop_blog',$get_shop_info_blog);
                }else{
                    return redirect('s_p-index');
                }
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function change_password(Request $request)
    {

        $user_check_password = register::where(['email'=>$request->email_id,'provider_user_id'=>$request->id])->first();
        if($user_check_password->password == $request->old_password)
        {
            return 'same';
        }else
        {
            return 'different';
        }
        
    }

    public function password_change_url(Request $request)
    {
        print_r($request->all());
        $change_password_check = register::where(['email'=>$request->email,'provider_user_id'=>$request->id])->first();
        echo '<pre>';
        print_r($change_password_check);
        $change_password_check->password = $request->new_password;
        $change_password_check->save();
        Session::flush();
        Cookie::queue(Cookie::forget('register_email'));
        session()->flash('passsword_change_done','Password change successfully. Now login with your new password');
        return redirect('/');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function image_change(Request $request)
    {
        echo '<pre>';
        // print_r($request->all());
        // die();
        $check_image = register::where(['email'=>$request->email,'provider_user_id'=>$request->provider_user_id])->first();
        // print_r($check_image);
        // die();
        if($request->hasFile('image_change'))
        {
           $exists_image = public_path("/profile_image/".$check_image->profile_image);
        //    echo $exists_image;
           if (File::exists($exists_image))
           {
            File::delete($exists_image);
           }
           $new_image = $request->file('image_change');
           $filename =  rand().time().'.'.$new_image->getClientOriginalExtension();
           $destinationPath = public_path('/profile_image');
           $new_image->move($destinationPath, $filename);
           $check_image->profile_image = $filename;
           $check_image->save();
           session()->flash('Profile_image_changed','Your Profile Image is Changed Succesfully');
           return redirect('/');
        }
        else
        {
            session()->flash('no_image','Error in changing image.Try after some time.');
            return redirect('/');

        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function email_verify($id)
    {
        // echo $id;
        $verify_email_check_query = verify_email::where('token',$id)->first();
        $user_email = $verify_email_check_query->user_email;
        $provider_user_id = $verify_email_check_query->user_id;
        $register_table_email_verify_update_query = register::where(['email'=>$user_email,'provider_user_id'=>$provider_user_id])->update(['email_verify'=>'verified']);
        $verify_email_update_query = verify_email::where('token',$id)->update(['status'=>'verified']);
        // echo "<pre>";
        // print_r($register_table_email_verify_update_query);
        // die();
        session()->flash('verification_done','Your registration verification is completed. Now You can access our website fully with all the services');
        return redirect('/'); 
        // print_r($request()->all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
