<?php

namespace App\Http\Controllers;
use App\verify_email;
use App\register;
use App\shop_info;
use App\comment;
use App\appointment;
use Session;
use Cookie;
use Mail;
use Illuminate\Http\Request;

class user_dashboard extends Controller
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
        //         $register_check = register::where('email',$session_email)->first();
        //         if($register_check->user_type == 'user'){
        //             return view('index');
        //         }else{
        //             return redirect('s_p-index');
        //         }
        //     }
        // }
        $get_shop_info_query_all = shop_info::distinct('images')->pluck('images','specillaty_service');
        return view('user_dashboard')->with('shop_navbar_info',$get_shop_info_query_all);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function special_service($id)
    {
        $get_shop_info_query = shop_info::where(['specillaty_service'=>$id])->get();
        $get_shop_info_query_all = shop_info::distinct('images')->pluck('images','specillaty_service');
        // echo '<pre>';
        // print_r($get_shop_info_query);
        // die();
        return view('special_service')->with('special_service',$get_shop_info_query)->with('shop_navbar_info',$get_shop_info_query_all);

    } 


    public function comment_form(Request $request)
    {
        $insert_query =new comment();
        $data = request()->all();
        // echo "<pre>";
        // print_r(request()->all());
        // die();
        $insert_query->user_name = $data['user_name']; 
        $insert_query->user_email = $data['user_email']; 
        $insert_query->subject = $data['subject']; 
        $insert_query->shop_id = $data['shop_id']; 
        $insert_query->shop_name = $data['shop_name']; 
        $insert_query->shop_email = $data['shop_email']; 
        $insert_query->message = $data['message']; 
        $insert_query->save();
        session()->flash('comment','Your Comment is successfully submitted');
        return redirect('/');
        
    }

    public function appoint_check(Request $request)
    {
        $data = request()->all();
        // print_r($data);
        // die();
        $date = $data['date'];
        $shop_appoint_email = $data['shop_appoint_email'];
        $shop_appoint_id = $data['shop_appoint_id'];
        $appoint_time = $data['appoint_time'];
        // echo $date;
        $appointment_check_query = appointment::where('shop_appoint_email',$shop_appoint_email)->where('appoint_date',$date)->where('appoint_time',$appoint_time)->where('shop_appoint_id',$shop_appoint_id)->exists();
        if($appointment_check_query == 1){
            return 'exists';
        }
        else{
            return 'new';
        }
    }


    public function appointment_form()
    {
        $this->validate(request(), [            
            'appoint_time' => 'required',
            'appoint_date' => 'required',
          ]);
        $appointment_query = new appointment();
        $data = request()->all();
        // echo "<pre>";
        // print_r($data);
        // die();
        $appointment_query->appoint_user_name = $data['appoint_user_name'];
        $appointment_query->appoint_user_email = $data['appoint_user_email'];
        $appointment_query->appoint_user_contact = $data['appoint_user_contact'];
        $appointment_query->appoint_date = $data['appoint_date'];
        $appointment_query->appoint_time = $data['appoint_time'];
        $appointment_query->shop_appoint_name = $data['shop_appoint_name'];
        $appointment_query->shop_appoint_id = $data['shop_appoint_id'];
        $appointment_query->shop_appoint_email = $data['shop_appoint_email'];
        $appointment_query->save();
        $mail_send_array = array(
                                    'username'=>$data['appoint_user_name'],
                                    'usermail'=>$data['appoint_user_email'],
                                    'appoint_date'=>$data['appoint_date'],
                                    'appoint_time'=>$data['appoint_time'],
                                    'shop_appoint_name'=>$data['shop_appoint_name'],);
        Mail::send('email_view.appointment_email',$mail_send_array,function($m) use ($mail_send_array){
            $m->to($mail_send_array['usermail'])->subject('Your Appointment Data is here');
            $m->from('workproject906@gmail.com','Appointment Data');
        });
        session()->flash('appointment_set','Your Appointment is set. Further Details are send to your mail');
        return redirect('/');
    }

    public function pricing_page()
    {
        $shop_get_all_query = shop_info::all();
        $get_shop_info_query_all = shop_info::distinct('images')->pluck('images','specillaty_service');
        return view('pricing_page')->with('shop_navbar_info',$get_shop_info_query_all)->with('all_shop',$shop_get_all_query);
    }

    public function gallery_page()
    {
        $shop_get_all_query = shop_info::all();
        $get_shop_info_query_all = shop_info::distinct('images')->pluck('images','specillaty_service');
        return view('gallery_page')->with('shop_navbar_info',$get_shop_info_query_all)->with('all_shop',$shop_get_all_query);
        
    }

    public function check_time(Request $request){
        $currenttime = time() + 100*100;
        $inpTime = strtotime($request->inputTime) ; 
        // echo $currenttime.'<br>';
        // echo $inpTime;
        if($currenttime > $inpTime){
            echo 'not_valid_time';
        }else{
            echo 'valid_time';
        }
    }


    public function comment_ajax_index(Request $request)
    {
        
        $get_comment_count_ajax = comment::where('shop_id',$request->value)->count();
        return $get_comment_count_ajax;
    }


    public function like_shop_user(Request $request)
    {

        $like_query = shop_info::where('id',$request->shop_id)->first();
        foreach(explode(',',$like_query->liked_user_email) as $dd)
        {
            if($dd == $request->email)
            {
                return 'existing';
            }
        }
            $update_like_query = shop_info::where('id',$request->shop_id)->first();
            if(!$update_like_query->liked_user_email)
            {
                $update_like_query->update(['liked_user_email'=>$request->email]);
            }else{
                $update_like_query->update(['liked_user_email'=>$update_like_query->liked_user_email .','.$request->email]); 
            }
            return 'likea_added';
    }

    public function like_ajax_index(Request $request)
    {
        $count = 0;
        $get_like_count_ajax = shop_info::where('id',$request->value)->first();
        if(!$get_like_count_ajax->liked_user_email){
            return '0';
        }else
        {
            foreach( explode(',',$get_like_count_ajax->liked_user_email) as $count_data )
            {
                $count ++;
            }
        //    ->count();
            return $count;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function latest_appointment_user()
    {

        $latest_appointment_get_query = appointment::where('appoint_user_email',Session::get('register_email'))->orWhere('appoint_user_email',Cookie::get('register_email'))->orderBy('id', 'DESC')->get();
            if($latest_appointment_get_query->count() == '0')
            {
                return 'noappointment';
            }else
            {
                return $latest_appointment_get_query;
            }


    }


    public function all_appoint()
    {
        $get_shop_info_query_all = shop_info::distinct('images')->pluck('images','specillaty_service');   
        $all_appointment_get_query = appointment::where('appoint_user_email',Session::get('register_email'))->orWhere('appoint_user_email',Cookie::get('register_email'))->get();
        return view('all_appoint')->with('shop_navbar_info',$get_shop_info_query_all)->with('all_appoint',$all_appointment_get_query);
    }


    public function view_profile()
    {
        $get_shop_info_query_all = shop_info::distinct('images')->pluck('images','specillaty_service');
        $get_user_details = register::where('email',Session::get('register_email'))->orWhere('email',Cookie::get('register_email'))->first();
        // echo '<pre>';
        // print_r($get_user_details);
        // die();   
        return view('view_profile')->with('user_data',$get_user_details)->with('shop_navbar_info',$get_shop_info_query_all);
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
    public function user_comment()
    {
        $get_shop_info_query_all = shop_info::distinct('images')->pluck('images','specillaty_service');   
        $get_shop_info_data = shop_info::all();   
        $user_comment = comment::where('user_email',Session::get('register_email'))->orWhere('user_email',Cookie::get('register_email'))->get();
        // echo '<pre>';
        // print_r($user_comment);
        return view('comment_page')->with('comment_data',$user_comment)->with('shop_navbar_info',$get_shop_info_query_all)->with('get_shop_info_data',$get_shop_info_data);

        
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
    public function make_payment(Request $request)
    {
        echo '<pre>';
        $order_id = uniqid();
        $insert_order_id_in_appointment = appointment::where('appoint_user_email',$request->user_email)->where('shop_appoint_email',$request->shop_appoint_email)->where('shop_appoint_id',$request->shop_id)->where('appoint_date',$request->appoint_date)->update(['payment_order_id'=>$order_id]);
        // print_r($insert_order_id_in_appointment);
        // print_r($request->all());
        // die();

        $data_for_request = $this->handlePaytmRequest($order_id , $request->amount);
	    $paytm_txn_url = 'https://securegw-stage.paytm.in/theia/processTransaction';
	    $paramList = $data_for_request['paramList'];
	    $checkSum = $data_for_request['checkSum'];
        return view( 'paytm-merchant-form', compact( 'paytm_txn_url', 'paramList', 'checkSum' ) );
    }

    public function handlePaytmRequest( $order_id, $amount ) {
		// Load all functions of encdec_paytm.php and config-paytm.php
		$this->getAllEncdecFunc();
		$this->getConfigPaytmSettings();

		$checkSum = "";
		$paramList = array();

		// Create an array having all required parameters for creating checksum.
		$paramList["MID"] = 'wSsmEN64869628261975';
		$paramList["ORDER_ID"] = $order_id;
		$paramList["CUST_ID"] = $order_id;
		$paramList["INDUSTRY_TYPE_ID"] = 'Retail';
		$paramList["CHANNEL_ID"] = 'WEB';
		$paramList["TXN_AMOUNT"] = $amount;
		$paramList["WEBSITE"] = 'WEBSTAGING';
		$paramList["CALLBACK_URL"] = url( '/paytm-callback' );
		$paytm_merchant_key = 'gVaH&G!#vttQ5h!8';

		//Here checksum string will return by getChecksumFromArray() function.
		$checkSum = getChecksumFromArray( $paramList, $paytm_merchant_key );

		return array(
			'checkSum' => $checkSum,
			'paramList' => $paramList
		);
	}


    // paytm fn
        function getAllEncdecFunc() {
            function encrypt_e($input, $ky) {
                $key   = html_entity_decode($ky);
                $iv = "@@@@&&&&####$$$$";
                $data = openssl_encrypt ( $input , "AES-128-CBC" , $key, 0, $iv );
                return $data;
            }

            function decrypt_e($crypt, $ky) {
                $key   = html_entity_decode($ky);
                $iv = "@@@@&&&&####$$$$";
                $data = openssl_decrypt ( $crypt , "AES-128-CBC" , $key, 0, $iv );
                return $data;
            }

            function pkcs5_pad_e($text, $blocksize) {
                $pad = $blocksize - (strlen($text) % $blocksize);
                return $text . str_repeat(chr($pad), $pad);
            }

            function pkcs5_unpad_e($text) {
                $pad = ord($text[strlen($text) - 1]);
                if ($pad > strlen($text))
                    return false;
                return substr($text, 0, -1 * $pad);
            }

            function generateSalt_e($length) {
                $random = "";
                srand((double) microtime() * 1000000);

                $data = "AbcDE123IJKLMN67QRSTUVWXYZ";
                $data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
                $data .= "0FGH45OP89";

                for ($i = 0; $i < $length; $i++) {
                    $random .= substr($data, (rand() % (strlen($data))), 1);
                }

                return $random;
            }

            function checkString_e($value) {
                if ($value == 'null')
                    $value = '';
                return $value;
            }

            function getChecksumFromArray($arrayList, $key, $sort=1) {
                if ($sort != 0) {
                    ksort($arrayList);
                }
                $str = getArray2Str($arrayList);
                $salt = generateSalt_e(4);
                $finalString = $str . "|" . $salt;
                $hash = hash("sha256", $finalString);
                $hashString = $hash . $salt;
                $checksum = encrypt_e($hashString, $key);
                return $checksum;
            }
            function getChecksumFromString($str, $key) {

                $salt = generateSalt_e(4);
                $finalString = $str . "|" . $salt;
                $hash = hash("sha256", $finalString);
                $hashString = $hash . $salt;
                $checksum = encrypt_e($hashString, $key);
                return $checksum;
            }

            function verifychecksum_e($arrayList, $key, $checksumvalue) {
                $arrayList = removeCheckSumParam($arrayList);
                ksort($arrayList);
                $str = getArray2StrForVerify($arrayList);
                $paytm_hash = decrypt_e($checksumvalue, $key);
                $salt = substr($paytm_hash, -4);

                $finalString = $str . "|" . $salt;

                $website_hash = hash("sha256", $finalString);
                $website_hash .= $salt;

                $validFlag = "FALSE";
                if ($website_hash == $paytm_hash) {
                    $validFlag = "TRUE";
                } else {
                    $validFlag = "FALSE";
                }
                return $validFlag;
            }

            function verifychecksum_eFromStr($str, $key, $checksumvalue) {
                $paytm_hash = decrypt_e($checksumvalue, $key);
                $salt = substr($paytm_hash, -4);

                $finalString = $str . "|" . $salt;

                $website_hash = hash("sha256", $finalString);
                $website_hash .= $salt;

                $validFlag = "FALSE";
                if ($website_hash == $paytm_hash) {
                    $validFlag = "TRUE";
                } else {
                    $validFlag = "FALSE";
                }
                return $validFlag;
            }

            function getArray2Str($arrayList) {
                $findme   = 'REFUND';
                $findmepipe = '|';
                $paramStr = "";
                $flag = 1;
                foreach ($arrayList as $key => $value) {
                    $pos = strpos($value, $findme);
                    $pospipe = strpos($value, $findmepipe);
                    if ($pos !== false || $pospipe !== false)
                    {
                        continue;
                    }

                    if ($flag) {
                        $paramStr .= checkString_e($value);
                        $flag = 0;
                    } else {
                        $paramStr .= "|" . checkString_e($value);
                    }
                }
                return $paramStr;
            }

            function getArray2StrForVerify($arrayList) {
                $paramStr = "";
                $flag = 1;
                foreach ($arrayList as $key => $value) {
                    if ($flag) {
                        $paramStr .= checkString_e($value);
                        $flag = 0;
                    } else {
                        $paramStr .= "|" . checkString_e($value);
                    }
                }
                return $paramStr;
            }

            function redirect2PG($paramList, $key) {
                $hashString = getchecksumFromArray($paramList, $key);
                $checksum = encrypt_e($hashString, $key);
            }

            function removeCheckSumParam($arrayList) {
                if (isset($arrayList["CHECKSUMHASH"])) {
                    unset($arrayList["CHECKSUMHASH"]);
                }
                return $arrayList;
            }

            function getTxnStatus($requestParamList) {
                return callAPI(PAYTM_STATUS_QUERY_URL, $requestParamList);
            }

            function getTxnStatusNew($requestParamList) {
                return callNewAPI(PAYTM_STATUS_QUERY_NEW_URL, $requestParamList);
            }

            function initiateTxnRefund($requestParamList) {
                $CHECKSUM = getRefundChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY,0);
                $requestParamList["CHECKSUM"] = $CHECKSUM;
                return callAPI(PAYTM_REFUND_URL, $requestParamList);
            }

            function callAPI($apiURL, $requestParamList) {
                $jsonResponse = "";
                $responseParamList = array();
                $JsonData =json_encode($requestParamList);
                $postData = 'JsonData='.urlencode($JsonData);
                $ch = curl_init($apiURL);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($postData))
                );
                $jsonResponse = curl_exec($ch);
                $responseParamList = json_decode($jsonResponse,true);
                return $responseParamList;
            }

            function callNewAPI($apiURL, $requestParamList) {
                $jsonResponse = "";
                $responseParamList = array();
                $JsonData =json_encode($requestParamList);
                $postData = 'JsonData='.urlencode($JsonData);
                $ch = curl_init($apiURL);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($postData))
                );
                $jsonResponse = curl_exec($ch);
                $responseParamList = json_decode($jsonResponse,true);
                return $responseParamList;
            }
            function getRefundChecksumFromArray($arrayList, $key, $sort=1) {
                if ($sort != 0) {
                    ksort($arrayList);
                }
                $str = getRefundArray2Str($arrayList);
                $salt = generateSalt_e(4);
                $finalString = $str . "|" . $salt;
                $hash = hash("sha256", $finalString);
                $hashString = $hash . $salt;
                $checksum = encrypt_e($hashString, $key);
                return $checksum;
            }
            function getRefundArray2Str($arrayList) {
                $findmepipe = '|';
                $paramStr = "";
                $flag = 1;
                foreach ($arrayList as $key => $value) {
                    $pospipe = strpos($value, $findmepipe);
                    if ($pospipe !== false)
                    {
                        continue;
                    }

                    if ($flag) {
                        $paramStr .= checkString_e($value);
                        $flag = 0;
                    } else {
                        $paramStr .= "|" . checkString_e($value);
                    }
                }
                return $paramStr;
            }
            function callRefundAPI($refundApiURL, $requestParamList) {
                $jsonResponse = "";
                $responseParamList = array();
                $JsonData =json_encode($requestParamList);
                $postData = 'JsonData='.urlencode($JsonData);
                $ch = curl_init($apiURL);
                curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_URL, $refundApiURL);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $headers = array();
                $headers[] = 'Content-Type: application/json';
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                $jsonResponse = curl_exec($ch);
                $responseParamList = json_decode($jsonResponse,true);
                return $responseParamList;
            }
        }

        function getConfigPaytmSettings() {
            define('PAYTM_ENVIRONMENT', 'TEST'); // PROD
            define('PAYTM_MERCHANT_KEY', 'gVaH&G!#vttQ5h!8'); //Change this constant's value with Merchant key downloaded from portal
            define('PAYTM_MERCHANT_MID', 'wSsmEN64869628261975'); //Change this constant's value with MID (Merchant ID) received from Paytm
            define('PAYTM_MERCHANT_WEBSITE', 'WEBSTAGING'); //Change this constant's value with Website name received from Paytm
    
            $PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/merchant-status/getTxnStatus';
            $PAYTM_TXN_URL='https://securegw-stage.paytm.in/theia/processTransaction';
            if (PAYTM_ENVIRONMENT == 'PROD') {
                $PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/merchant-status/getTxnStatus';
                $PAYTM_TXN_URL='https://securegw.paytm.in/theia/processTransaction';
            }
            define('PAYTM_REFUND_URL', '');
            define('PAYTM_STATUS_QUERY_URL', $PAYTM_STATUS_QUERY_NEW_URL);
            define('PAYTM_STATUS_QUERY_NEW_URL', $PAYTM_STATUS_QUERY_NEW_URL);
            define('PAYTM_TXN_URL', $PAYTM_TXN_URL);
        }

        public function paytmCallback( Request $request ) {
            $order_id = $request['ORDERID'];
            // return $request;
            if ( 'TXN_SUCCESS' === $request['STATUS'] ) {
                $transaction_id = $request['TXNID'];
                $order = appointment::where( 'payment_order_id', $order_id )->first();
                $order->status = '1';
                $order->transaction_id = $transaction_id;
                $order->save();
                // print_r($order);
                // die();
                return redirect( 'my_account' );
    
            } else if( 'TXN_FAILURE' === $request['STATUS'] ){
                return view( 'payment-failed' );
            }
        }

    // paytm fn end







}





