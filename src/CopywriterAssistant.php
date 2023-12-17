<?php

declare(strict_types=1);

namespace FBIZI\AICopywriterAssistant;

class CopywriterAssistant
{
    protected $contentGenerator;
    protected $imageGenerator;

    public function __construct(ContentGenerator $contentGenerator, ImageGenerator $imageGenerator)
    {
        $this->contentGenerator = $contentGenerator;
        $this->imageGenerator = $imageGenerator;
    }

    public function generateArticle(string $title) : array
    {
        try {
            $content = $this->contentGenerator->generateContent($title);
            $images = $this->imageGenerator->generateImages($title);
            if($content->getStatusCode() == 200){
                $body = $content->getBody();
                $content = $body['choices'][0]['message']['content'];
            }

            if($images->getStatusCode() == 200){
                $body = $images->getBody();
                $images = $body['data'][0]['url'];
            }
            // Combine and return the generated article
            return [
                'title' => $title,
                'content' => $content,
                'images' => $images,
            ];
        } catch (\Throwable $th) {
            return [
                'error' => $th->getMessage()
            ];
        }
    }
}