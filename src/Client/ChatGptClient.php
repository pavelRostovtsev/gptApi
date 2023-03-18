<?php

namespace RostovtsevPavel\ChatGptApi;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class ChatGptClient
{
    const MAX_TOKENS = 2048;
    const NUMBER_ALTERNATIVE_ANSWERS = 1;
    const TEMPERATURE = 0.7;
    const MODEL_TYPE = 'davinci';

    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    public function __construct
    (
        HttpClientInterface $httpClient,
        string $token
    ) {
        $this->httpClient = $httpClient->withOptions([
            'base_uri' => 'https://api.openai.com/v1/',
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => "Bearer $token",
            ],
        ]);
    }

    private function convertClaasToText(string $pathToFile): string
    {
        return file_get_contents($pathToFile);
    }

    public function getUnitTes()
    {
        $text = 'Привет';

        $body = json_encode([
            'model' => self::MODEL_TYPE,
            'prompt' => $text,
            'temperature' => self::TEMPERATURE,
            'max_tokens' => self::MAX_TOKENS,
            'n' => self::NUMBER_ALTERNATIVE_ANSWERS,
            'stop' => '.',
        ]);

        $response = $this->httpClient->request('POST', 'completions',  ['body' => $body]);

        $result = json_decode($response->getContent(), true);
        $outputText = $result['choices'][0]['text'];
        var_dump($outputText);
    }
}
