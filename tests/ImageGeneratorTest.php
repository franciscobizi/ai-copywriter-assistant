<?php

namespace FBIZI\AICopywriterAssistant\Tests;
use PHPUnit\Framework\TestCase;

final class ImageGeneratorTest extends TestCase
{
    protected $image;
    protected function setUp(): void
    {
        $settings = ['apikey' => 'jdfhdfjfjf'];
        $this->image = new ImageGenerator($settings);
    }

    public function testGenerateimage()
    {
        $image = $this->image->generateimage('Women lifestyle');
        $image->assertIsArray();
    }
}