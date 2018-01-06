<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Events\MessageSent;
use LRedis;

class MessageController extends Controller
{
    public function store(Request $request){
		$user = auth()->user();
		$result = $user->messages()->create([
			'message' => $request['message']
		]);
    	
        $data = array(
            'username' => $user->name,
            'message' => $request['message']
        );
        $data = json_encode($data);
        $redis = LRedis::connection();
        $redis->publish('message',$data);
        return $data;
    }
}
