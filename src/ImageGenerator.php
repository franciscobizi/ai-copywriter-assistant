<?php

declare(strict_types=1);

namespace FBIZI\AICopywriterAssistant;

class ImageGenerator extends API
{
    public function generateImages($title){
        
        $body = array_merge($this->defautSettings(), $this->config['image'] ?? []);
        return $this->fetch('POST','images/generations', [
            "model" => $body['model'],
            "max_tokens" => $body['max_tokens'],
            "prompt" => $title,
            "n" => $body['image_count'],
            "size" => $body['image_size']
        ]);
    }

    private function defautSettings()
    {
        return [
            "model" => "dall-e-2",
            "max_tokens" => 20,
            "image_count" => 1,
            "image_size" => "1024x1024"
        ];
    }
}