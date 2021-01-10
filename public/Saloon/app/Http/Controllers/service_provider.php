<?php

namespace App\Http\Controllers;
use App\verify_email;
use App\register;
use App\comment;
use App\appointment;
use App\shop_info;
use App\service_from_home;
use Session;
use Cookie;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class service_provider extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $session_email = Session::get('register_email');
        // $cookie_email = Cookie::get('register_email');
        // if((!$session_email) && (!$cookie_email)){
        //     session()->flash('Login_required','Please Login');
        //     return redirect('/');
        // }else{
        //     $verify_email = verify_email::where(['status'=>'no_verified'])->where('user_email',$session_email)->orWhere('user_email',$cookie_email)->exists();
        //     if($verify_email == 1){
        //         Session::flush();
        //         Cookie::queue(Cookie::forget('register_email'));
        //         session()->flash('Please_verify_first','Your Email is not verified. Please verify it. We have send a verification mail to your registered mail.');
        //         return redirect('/');
        //     }else{
        //         $verify_email_delete = verify_email::where('user_email',$session_email)->orWhere('user_email',$cookie_email)->delete();
        //         $register_check = register::where('email',$session_email)->orWhere('email',$cookie_email)->first();
        //         if($register_check->user_type == 'user'){
        //             return redirect('/');
        //         }else{
        //             return view('service_provider.sp_index');
        //         }
        //     }
        // }
            
        // queries for shop user only 
        
            // query for all users
                $get_profile_data = register::where('email',Session::get('register_email'))->orWhere('email',Cookie::get('register_email'))->first();
                
                    $get_shop_count = shop_info::where('user_email',Session::get('register_email'))->orWhere('user_email',Cookie::get('register_email'))->count();
                    $get_service_from_home = shop_info::where('user_email',Session::get('register_email'))->orWhere('user_email',Cookie::get('register_email'))->get();
                    $get_comment_service_from_home = comment::where('shop_email',Session::get('register_email'))->orWhere('shop_email',Cookie::get('register_email'))->get();
                    $appointment_get_query = appointment::where('shop_appoint_email',Session::get('register_email'))->orWhere('shop_appoint_email',Cookie::get('register_email'))->get();
                    $shop_get_query = shop_info::where('user_email',Session::get('register_email'))->orWhere('user_email',Cookie::get('register_email'))->get();
                    // end
                    // echo "<pre>";
                    // print_r($get_comment_service_from_home);
                    // die();
                    return view('service_provider.sp_index')->with('shop_count',$get_shop_count)
                                                            ->with('get_service_from_home',$get_service_from_home)
                                                            ->with('get_comment_service_from_home',$get_comment_service_from_home)
                                                            ->with('appointment_data',$appointment_get_query)
                                                            ->with('shop_data',$shop_get_query)
                                                            ->with('profile_data',$get_profile_data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shop()
    {
        return view('service_provider.make_shop_page');
    }
    public function create_shop(Request $request)
    {
        // $this->validate($request, [
        //     'filenames' => 'required',
        //     'filenames.*' => 'mimes:doc,pdf,docx,zip'
        // ]);
        $store_query = new shop_info();
        $data = request()->all();
        $store_query->user_type = $data['user_type'];
        $store_query->owner_name = $data['owner_name']; 
        $store_query->shop_name = $data['shop_name']; 
        $store_query->address = $data['address']; 
        $store_query->user_email = $data['user_email']; 
        $store_query->provider_user_id = $data['provider_user_id']; 
        $store_query->shop_type = $data['shop_type']; 
        $store_query->employ_number = $data['employ_number']; 
        $store_query->specillaty_service = $data['specillaty_service']; 
        $store_query->specillaty_service_amount = $data['specillaty_service_amount']; 
        $shop_services = $data['shop_services'];
        $shop_services_amount = $data['shop_services_amount'];
        $ppp = array_pop($shop_services);
        $pp = array_pop($shop_services_amount);
        // print_r($mm);
        // print_r($mum);
        $store_query->shop_services = implode(',',$shop_services);
        $store_query->shop_services_amount = implode(',',$shop_services_amount);
        if($request->hasfile('filenames'))
         {
            foreach($request->file('filenames') as $file)
            {
                $name=$file->getClientOriginalName();   
                $file->move(public_path().'/shop_files/', $name);  
                $image_path[] = $name;  
            }
        }
        // print_r(implode(",", $image_path));   
        // die();
        $store_query->images =implode(",", $image_path);
        // echo '<pre>';
        // print_r($store_query);
        // die();
        $store_query->save();
        session()->flash('shop_data_update','Your Shop Details are updated');
        return redirect('s_p-index');
    }

    public function show_shop()
    {
        $im = [];
        $session_email = Session::get('register_email');
        $cookie_email = Cookie::get('register_email');
        $get_shop_data_query = shop_info::where('user_email',$session_email)->orWhere('user_email',$cookie_email)->get();
        // print_r($get_shop_data_query);
        // if($get_shop_data_query->id = ' '){
        //     echo 'dfd';
        // }else{
        //     echo 'sss';
        // }
        // echo '<pre>';
        // print_r($get_shop_data_query);
        // die();
        return view('service_provider.show_shop_page')->with('shop_data',$get_shop_data_query);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function comment_get()
    {
        $comment_get_query = comment::where('shop_email',Session::get('register_email'))->orWhere('shop_email',Cookie::get('register_email'))->get();
        $shop_get_query = shop_info::where('user_email',Session::get('register_email'))->orWhere('user_email',Cookie::get('register_email'))->get();
        // echo "<pre>";
        // print_r($shop_get_query);
        // die();
        return view('service_provider.comment_page')->with('comment_data',$comment_get_query)->with('shop_data',$shop_get_query);
    }

    public function appointment_view()
    {
        $appointment_get_query = appointment::where('shop_appoint_email',Session::get('register_email'))->orWhere('shop_appoint_email',Cookie::get('register_email'))->get();
        $shop_get_query = shop_info::where('user_email',Session::get('register_email'))->orWhere('user_email',Cookie::get('register_email'))->get();
        // echo "<pre>";
        // print_r($shop_get_query);
        // die();
        return view('service_provider.appointment_view_page')->with('appointment_data',$appointment_get_query)->with('shop_data',$shop_get_query);
    }
 
    public function comments_count()
    {
        $comment_get_query = comment::where('shop_email',Session::get('register_email'))->orWhere('shop_email',Cookie::get('register_email'))->count();
        // echo '<pre>';
        print_r($comment_get_query);    
        // die();    
    }

    public function latest_appointment()
    {
        $latest_appointment_get_query = appointment::where('shop_appoint_email',Session::get('register_email'))->orWhere('shop_appoint_email',Cookie::get('register_email'))->take(4)->get();
        return $latest_appointment_get_query;
    }

    public function payment_request(Request $request)
    {
        // echo '<pre>';
        // print_r(request()->all());
        $appointment_update_query = appointment::where('appoint_user_email',$request->user_email)->where('appoint_user_contact',$request->user_contact)->where('shop_appoint_id',$request->shop_id)->update(['amount'=>$request->amount]);
        // print_r($appointment_update_query);
        // die();
        // Nexmo::message()->send([
        //     'to'   => '+91'.$request->user_contact,
        //     'from' => '8427167507',
        //     'text' => 'Saloon-Admin - Message :-'.$request->message.'. Amount'.$request->amount
        // ]);
        session()->flash('payment_request_done','Your payment Request for the appointment is successfully send to the user.');
        return redirect('s_p-index');


    }

    // Service FROM HOME

    public function sfh_add_home(Request $request)
    {
        echo "<pre>";
        // print_r(request()->all());
        // die();
        $store_query = new shop_info();
        $data = request()->all();
        $store_query->user_type = $data['user_type']; 
        $store_query->owner_name = $data['owner_name']; 
        $store_query->shop_name = $data['shop_name']; 
        $store_query->address = $data['shop_location']; 
        $store_query->user_email = $data['user_email']; 
        $store_query->shop_contact = $data['shop_contact']; 
        $store_query->provider_user_id = $data['provider_user_id']; 
        $store_query->shop_type = $data['shop_type']; 
        $store_query->employ_number = $data['employee']; 
        $store_query->specillaty_service = $data['specillaty_service']; 
        $store_query->specillaty_service_amount = $data['specillaty_service_amount']; 
        $shop_services = $data['shop_services'];
        $shop_services_amount = $data['shop_services_amount'];
        $ppp = array_pop($shop_services);
        $pp = array_pop($shop_services_amount);
        // print_r($mm);
        // print_r($mum);
        $store_query->shop_services = implode(',',$shop_services);
        $store_query->shop_services_amount = implode(',',$shop_services_amount);
        if($request->hasfile('filenames'))
         {
            foreach($request->file('filenames') as $file)
            {
                $name=$file->getClientOriginalName();   
                $file->move(public_path().'/home_shop_files/', $name);  
                $image_path[] = $name;  
            }
        }

        $store_query->images =implode(",", $image_path);
        // echo '<pre>';
        // print_r($store_query);
        // die();
        $store_query->save();
        session()->flash('shop_data_update','Your Work Space Details are updated');
        return redirect('s_p-index');
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
