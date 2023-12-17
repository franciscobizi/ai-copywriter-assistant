<?php

declare(strict_types=1);

namespace FBIZI\AICopywriterAssistant;

class ContentGenerator extends API
{
    public function generateContent(string $title)
    {
        return $this->fetch('POST', 'chat/completions', [
            "model" => $this->config['content']['model'] ?? 'gpt-3.5-turbo',
            "max_tokens" => $this->config['content']['max_tokens'] ?? 20,
            "messages" => [
                [
                    "role" => "system",
                    "content" => "You are a helpful assistant."
                ],
                [
                    "role" => "user",
                    "content" => "Write a content about '{$title}'"
                ]
            ]
        ]);
    }
}