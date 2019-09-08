<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Mail;
use Session;
class ExampleController extends Controller
{
    public function basic(){
    	Mail::send([], [], function ($message) {
    	    $message->from('john@johndoe.com', 'John Doe');
    	
    	    $message->to('348c783952-fde293@inbox.mailtrap.io', 'Test User');
    	
    	    $message->subject('Test Email');
    	    $message->setBody('Hi From Laravel');
    	});
    	echo "Mail Sent Successfully";
    }
    public function htmlMail(){
    	$data = array(
    		'name'=>'Akib'
    	);
    	Mail::send('email.mail', $data , function ($message) {
    	    $message->from('john@johndoe.com', 'John Doe');
    	
    	    $message->to('348c783952-fde293@inbox.mailtrap.io', 'Test User');
    	
    	    $message->subject('Test Email');
    	});
    	echo "Mail Sent Successfully";
    }

    public function sendAttachment(){
    	$data = array(
    		'name'=>'Akib'
    	);
    	$img = asset('/public/others/user.png');
    	Mail::send('email.mail', $data, function ($message) use($img) {
    	    $message->from('john@johndoe.com', 'John Doe');
    	
    	    $message->to('john@johndoe.com', 'John Doe');
    	
    	    $message->subject('Attachment');
    	
    	    $message->attach($img);
    	});
    	echo "mail sent Successfully";
    }
    public function session_set(){
    	Session::put('name','akib');
    	echo "Session Set Successfully";
    }

    public function session_get(){
    	echo Session::get('name');
    }

    public function session_delete(){
    	Session::forget('name');
    	echo "Session Deleted Successfully";
    }

    public function cookie_set(){
    	$response = new Response('Set Cookie');
    	$response->withCookie(cookie('email','akibtanjim@gmail.com',30));
    	return $response;
    }

    public function cookie_get(Request $Request){
    	echo $Request->cookie('email');
    }
}
