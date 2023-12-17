<?php

namespace FBIZI\AICopywriterAssistant\Tests;

use PHPUnit\Framework\TestCase;
use FBIZI\AICopywriterAssistant\{ContentGenerator, ImageGenerator, CopywriterAssistant};

final class CopywriterAssistantTest extends TestCase
{
    protected $assistant;
    protected function setUp(): void
    {
        $settings = ['apikey' => 'xxxxxxxxxx'];
        $contentGenerator = new ContentGenerator($settings);
        $imageGenerator = new ImageGenerator($settings);

        $this->assistant = new CopywriterAssistant($contentGenerator, $imageGenerator);
    }

    public function testGenerateArticle()
    {
        $article = $this->assistant->generateArticle('Women lifestyle');

        $this->assertIsArray($article);
    }
}