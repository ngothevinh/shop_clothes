<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orhanerday\OpenAi\OpenAi;

class GenerateImageController extends Controller
{
    public function generate_image(){
        return view('admin.generate_image.index');
    }
    public function post_image(Request $request){
        $request->validate([
           'desc' => 'required|string|max:1000',
           'size' => Rule::in(['sm','lg','md'])
        ]);
        $description = $request->desc;
        switch ($request->size){
            case 'lg' :
                $size = '1024x1024';
                break;
            case 'md' :
                $size = '512x512';
                break;
            default :
                $size = '256x256';
        }
        $open_ai_key = getenv('OPENAI_API_KEY');
        $open_ai = new OpenAi($open_ai_key);
        $complete = $open_ai->image([
            'prompt' => $description,
            'n' => 2,
            'size' => $size,
            'response_format' => 'url',
        ]);
        $dataImage = json_decode($complete,TRUE);
        $image1 = $dataImage['data'][0]['url'];
        $image2 = $dataImage['data'][1]['url'];
        return view('admin.generate_image.show_image',compact('image1','image2','description'));
    }
}
