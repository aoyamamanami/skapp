<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class TranslateController extends Controller
{
    public function translation()
    {
        // $client = new \GuzzleHttp\Client();
        // $url =  'https://api-free.deepl.com/v2/translate';
        
        $sentence = "猫";
        
        $key = env('DEEPL_KEY');
        
        

        $response = Http::get(
            'https://api-free.deepl.com/v2/translate',
            [
                'auth_key' => $key,
                'target_lang' => 'EN',
                'source_lang' => 'JA',
                'text' => $sentence,
            ]
            );
            
            $translated_text = $response->json('translations')[0]['text'];
            return $translated_text;
    }    
}
