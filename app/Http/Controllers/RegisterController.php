<?php

namespace App\Http\Controllers;
use Session;
use App\register;
use App\verify_email;
use App\shop_info;
use Mail;
use Cookie;
use Illuminate\Http\Request;

class RegisterController extends Controller
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
            return view('register')->with('shop_navbar_info',$get_shop_info_query_all);
        }
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail_set(Request $request)
    {
        $get_shop_info_query_all = shop_info::distinct('images')->pluck('images','specillaty_service');
        $data = request()->all();
        $manual_register_query = new register();
        $manual_register_query->email = $data['email'];
        $number_of_digits = 30;
        $rand_number =  substr(number_format(time() * mt_rand(),0,'',''),0,$number_of_digits);
        $manual_register_query->provider_user_id = $rand_number;
        $check_email = register::where('email',$data['email'])->exists();
        if($check_email){
            $manual_register_query->update();
        }else{
            $manual_register_query->save();
        }
        return view('register_complete_page')->with('user_detail',$manual_register_query)->with('shop_navbar_info',$get_shop_info_query_all);
       
    }
    public function email_ajax(Request $request){
        $data = request()->all();
        $email_check_query = register::where('email',$data['email'])->where('name','!=','')->where('password','!=','')->exists();
        print_r($email_check_query);
        // return  $email_check_query;
        
    }
    public function update(Request $request)
    {

            $data = request()->all();
            $token = str_random(5);
            // echo $token;
            // echo "<pre>";
            // print_r($data);
            // die();
            $manual_register_query = register::where('email',$data['email'])->update(['name'=>$data['name'],'password'=>$data['password'],'user_type'=>$data['user_type'],'contact'=>$data['contact']]);
            // $manual_register_query->email = $data['email'];
            // $manual_register_query->provider_user_id = $data['provider_user_id'];
            // $manual_register_query->name = $data['name'];
            // $manual_register_query->password = $data['password'];
            // $manual_register_query->user_type = $data['user_type'];
            // $manual_register_query->contact = $data['contact'];
            if($request->hasFile('image'))
            {
                $image = $request->file('image');
                $filename =  rand().time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path().'/profile_image/',$filename); 
                register::where('email',$data['email'])->update(['profile_image'=>$filename]);
            }
            
            $email_insert_query = new verify_email();
            $email_insert_query->user_id = $data['provider_user_id'];
            $email_insert_query->user_email = $data['email'];
            $email_insert_query->token = $token;
            $email_insert_query->save();


            
            // $manual_register_query->profile_image = $filename;
            // $manual_register_query->update();
            $mail_send_array = array('user_name'=>$data['name'],'user_mail'=>$data['email'],'token'=>$token);
            Mail::send('email_view.verify_email',$mail_send_array,function($m) use ($mail_send_array){
                $m->to($mail_send_array['user_mail'])->subject($mail_send_array['token']);
                $m->from('workproject906@gmail.com','Email Verification');
            });

            // $update_query = register::where('email',$data['email'])->update(['name'=>$data['name'],'password'=>$data['password'],'user_type'=>$data['user_type'],'contact'=>$data['contact'],'profile_image'=>$filename]);
            session()->flash('register_details_updated','Your Basics Details has been updated.Please check your Email to complete the registration by verification.');
            // Session::flush();
            return redirect('/');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\register  $register
     * @return \Illuminate\Http\Response
     */
    public function show(register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\register  $register
     * @return \Illuminate\Http\Response
     */
    public function edit(register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\register  $register
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\register  $register
     * @return \Illuminate\Http\Response
     */
    public function destroy(register $register)
    {
        //
    }
}
