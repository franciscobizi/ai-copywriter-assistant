<?php

namespace FBIZI\AICopywriterAssistant\Tests;

use PHPUnit\Framework\TestCase;
use FBIZI\AICopywriterAssistant\ImageGenerator;

final class ImageGeneratorTest extends TestCase
{
    protected $image;
    protected function setUp(): void
    {
        $settings = ['api_key' => 'xxxxxxxxxx'];
        $this->image = new ImageGenerator($settings);
    }

    public function testGenerateimage()
    {
        $image = $this->image->generateImages('Women lifestyle');
        $status_code = $image->getStatusCode();

        $this->assertEquals(200, $status_code);
    }
}