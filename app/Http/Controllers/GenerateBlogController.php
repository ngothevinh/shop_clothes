<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orhanerday\OpenAi\OpenAi;

class GenerateBlogController extends Controller
{
    public function generate_blog(){
        return view('generate_blog');
    }
    public function post_blog(Request $request){
        $topic = $request->topic;
        $open_ai_key = getenv('OPENAI_API_KEY');
        $open_ai = new OpenAi($open_ai_key);
        $promt = 'create 5 fake news topics about';
        $topic. " \n";

        $openAiOutput = $open_ai->completion([
            'engine' => 'davinci-instruct-beta-v3',
            'prompt' => $promt,
            'temperature' => 0.9,
            'max_tokens' => 150,
            'frequency_penalty' => 0,
            'presence_penalty' => 0.6,
        ]);
        dd($openAiOutput);
        $output = json_decode($openAiOutput,true);
        $outputText = $output["choices"][0]["text"];

        return view('generate_blog',[
            'result' => $outputText
        ]);
    }
}
