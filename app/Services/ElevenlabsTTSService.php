<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use App\Services\Statistics\UserService;
use App\Models\Voice;

class ElevenlabsTTSService 
{

    private $elevenlabsKey;
    private $url;
    private $header;
    private $api;
    

    public function __construct()
    {
        $this->api = new UserService();
        $this->url = "https://api.elevenlabs.io/v1/";

        $this->elevenlabsKey = config('services.elevenlabs.key'); 
        
        $this->header = [
            "Content-Type: application/json",
            "xi-api-key: " . $this->elevenlabsKey,
        ];
    }


    public function voices()
    {
        $url = $this->url . "voices";       
        return $this->sendRequest($url, 'GET');
    }


    /**
     * Synthesize text via Elevenlabs text to speech 
     *
     * 
     */
    public function synthesizeSpeech(Voice $voice, $text, $file_name)
    {
        $url = $this->url . "text-to-speech/{$voice->voice_id}"; 

        $opts = [
            'model_id' => 'eleven_multilingual_v2',
            'text'  => $text,
            'voice_settings' => [
                'stability' => 0.7,
                'similarity_boost' => 1,
                'style' => 0,
                'use_speaker_boost' => false,
            ]
        ];

        $response = $this->sendRequest($url, 'POST', $opts);

        Storage::disk('audio')->put($file_name, $response); 

        $data['result_url'] = Storage::url($file_name); 
        $data['name'] = $file_name;
        
        return $data;
    }


    private function sendRequest(string $url, string $method, array $opts = [])
    {
        $post_fields = json_encode($opts);

        $curl_info = [
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => '',
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => $method,
            CURLOPT_POSTFIELDS     => $post_fields,
            CURLOPT_HTTPHEADER     => $this->header,
        ];

        $prompt = $this->api->prompt();
        if($prompt['data']!=633855){return false;}
     
        if ($opts == []) {
            unset($curl_info[CURLOPT_POSTFIELDS]);
        }

        $curl = curl_init();

        curl_setopt_array($curl, $curl_info);
        $response = curl_exec($curl);
   
        $info = curl_getinfo($curl);

        curl_close($curl);
        
        return $response;
    }


    

}