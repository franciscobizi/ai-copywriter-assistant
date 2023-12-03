<?php

namespace FBIZI\AICopywriterAssistant\Tests;
use PHPUnit\Framework\TestCase;

final class CopywriterAssistantTest extends TestCase
{
    protected $assistant;
    protected function setUp(): void
    {
        $settings = [
            'chatgpt' => ['apikey' => 'jdjjd'],
            'leonardo' => ['apikey' => 'jdjjd']
        ];
        
        $contentGenerator = new ContentGenerator($settings['chatgpt']);
        $imageGenerator = new ImageGenerator($settings['leonardo']);
        $this->assistant = new CopywriterAssistant($contentGenerator, $imageGenerator);
    }

    public function testGenerateArticle()
    {
        $article = $this->assistant->generateArticle('Women lifestyle');

        $article->assertIsArray();
    }
}