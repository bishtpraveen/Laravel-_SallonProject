<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\verify_email;
use App\register;
use App\shop_info;
use App\contact_form;
use Illuminate\Support\Facades\Mail;

class layout_page extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $get_shop_info_query_navbar = shop_info::all();
        $get_shop_info_query_all = shop_info::distinct('images')->pluck('images','specillaty_service');
        // foreach($get_shop_info_query_navbar as $a){
            // echo "<pre>";
            // print_r($get_shop_info_query_navbar);
            // if($a->specillaty_service == $a->specillaty_service){
            // }else{
            //     echo 'not working';
            // }
        // }
        // die();
        return view('layout.layout')->with('shop_navbar_info',$get_shop_info_query_all);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about_page()
    {
        $get_shop_info_query_all = shop_info::distinct('images')->pluck('images','specillaty_service');
        $get_shop_all = shop_info::all();
        return view('about')->with('shop_navbar_info',$get_shop_info_query_all)->with('all_shop',$get_shop_all);
    }
     public function contact_page()
     {
        $get_shop_info_query_all = shop_info::distinct('images')->pluck('images','specillaty_service');
        $all_shop = shop_info::all();
         return view('contact_page')->with('shop_navbar_info',$get_shop_info_query_all)->with('all_shop',$all_shop);
     }

     public function contact_form(Request $request)
     {
        //  print_r($request->all());
         $shop_data = explode(',',$request->shop_data);
        //  echo $shop_data[1];
        //  die();
         $contact_form_insert_query = new contact_form();
         $contact_form_insert_query->name = $request->name;
         $contact_form_insert_query->email = $request->email;
         $contact_form_insert_query->subject = $request->subject;
         $contact_form_insert_query->message = $request->message;
         $contact_form_insert_query->shop_id = $shop_data[0];
         $contact_form_insert_query->shop_name = $shop_data[1];
        // echo '<pre>';
        //  print_r($contact_form_insert_query);
        //  die();
         $contact_form_insert_query->save();
         $mail_array = array('name'=>$request->name,'email'=>$request->email,'subject'=>$request->subject,'shop_name'=>$shop_data[1],'email_message'=>$request->message);
         Mail::send('email_view.contact_email',$mail_array,function($m) use ($mail_array){
            $m->to($mail_array['email'])->subject('We delivered your concern to shop'.$mail_array['shop_name']);
            $m->from('goodlookadmin@gmail.com','Your Contact Data');
         });
         session()->flash('Contact_Send','Your Concern data is successfully delivered to the specific shop.');
         return redirect('/');
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search_link(Request $request)
    {
        // echo '<pre>';
        $search_query = shop_info::where('shop_name','LIKE','%'.$request->value.'%')->orWhere('address','LIKE','%'.$request->value.'%')->get();
        return $search_query;

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
