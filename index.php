<?php

require __DIR__ . "/vendor/autoload.php";
require __DIR__ . "./config.php";

use FBIZI\AICopywriterAssistant\{CopywriterAssistant, ContentGenerator, ImageGenerator};

$config = [
  'api_key' => OPENAIKEY,
  'content' => [
    'max_tokens' => 20, // optional by default uses 20
    'model' => 'gpt-3.5-turbo' // optional by default uses gpt-3.5-turbo
  ],
  'image' => [
     'max_tokens' => 20, // optional by default uses 20
     'model' => 'dall-e-2', // optional by default uses dall-e-2
     'image_count' => 3, // optional by default uses 1 - number of images to be generate
     'image_size' => "1024x1024" // optional by default uses 1024x1024
  ]
];

// Instantiate necessary classes
$contentGenerator = new ContentGenerator($config);
$imageGenerator = new ImageGenerator($config);

$copywriterAssistant = new CopywriterAssistant($contentGenerator, $imageGenerator);

$title = 'Social media today';
// Generate an article
$article = $copywriterAssistant->generateArticle($title);

// Use the generated article as needed

print_r($article);