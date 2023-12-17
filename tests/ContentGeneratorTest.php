<?php

namespace FBIZI\AICopywriterAssistant\Tests;

use PHPUnit\Framework\TestCase;
use FBIZI\AICopywriterAssistant\ContentGenerator;

final class ContentGeneratorTest extends TestCase
{
    protected $content;
    protected function setUp(): void
    {
        $settings = ['api_key' => 'xxxxxxxxxx'];
        $this->content = new ContentGenerator($settings);
    }

    public function testGenerateContent()
    {
        $content = $this->content->generateContent('Women lifestyle');
        $status_code = $content->getStatusCode();

        $this->assertEquals(200, $status_code);
    }
}