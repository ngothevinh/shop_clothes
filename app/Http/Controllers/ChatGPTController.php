<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
class ChatGPTController extends Controller
{
    public function chat_index(){
       return view('front.chat.chat');
    }
    public function sendChat(Request $request){
        $result = OpenAI::completions()->create([
            'max_tokens' => 100,
            'model' => 'text-davinci-003',
            'prompt' => $request->input
        ]);
        $response = array_reduce(
          $result->toArray()['choices'],
          fn(string $result , array $choice) => $result . $choice['text'],""
        );
        return $response;
    }
}
