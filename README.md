# ai-copywriter-assistant
AI Copywriter Assistant - A package to generate article content and images based on titles. The package uses OpenAI API to do the job.

## Installation
Package is available on [Packagist](https://packagist.org/packages/fbizi/ai-copywriter-assistant), you can install it using Composer.

```composer require fbizi/ai-copywriter-assistant```

## Dependencies
- PHP 7.4+
- guzzlehttp/guzzle

## Basic usage
Before use this package make sure to register an account with OpenAI and create API Key, so you can make APIs calls. Follow this [link](https://openai.com/) if you don't have yet an account.

```ruby
use FBIZI\AICopywriterAssistant\CopywriterAssistant;
use FBIZI\AICopywriterAssistant\ContentGenerator;
use FBIZI\AICopywriterAssistant\ImageGenerator;

require __DIR__ . "/vendor/autoload.php"; 

$config = [
  'api_key' => 'OPENAIKEY',
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

print_r($article); // return array of ['title' => 'the entered title', 'content' => 'generated content', 'images' => ['urls']]

```

## Donation
Methods :

- [Buy me a coffee](https://www.buymeacoffee.com/franciscobizi)

If this package help you reduce time to develop, you can give me a cup of coffee :)