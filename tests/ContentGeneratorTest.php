<?php

namespace FBIZI\AICopywriterAssistant\Tests;
use PHPUnit\Framework\TestCase;

final class ContentGeneratorTest extends TestCase
{
    protected $content;
    protected function setUp(): void
    {
        $settings = ['apikey' => 'jdfhdfjfjf'];
        $this->content = new ContentGenerator($settings);
    }

    public function testGenerateContent()
    {
        $content = $this->content->generateContent('Women lifestyle');
        $content->assertIsString();
    }
}