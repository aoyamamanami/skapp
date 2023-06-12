<?php

namespace App\Libs;

use Illuminate\Support\Facades\Http;

class Common
{
    public static function deepl($source, $target, $sentence)
    {
        $key = env('DEEPL_KEY');
        
        $response = Http::get(
            'https://api-free.deepl.com/v2/translate',
            [
                'auth_key' => $key,
                'target_lang' => $target,
                'source_lang' => $source,
                'text' => $sentence,
            ]
        );
        
        $translation = $response->json('translations')[0]['text'];
        
        return $translation;
    }
}