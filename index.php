<?php

use GuzzleHttp\Client;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Vonage\Voice\NCCO\Action\Talk;
use Vonage\Voice\NCCO\NCCO;
use Vonage\Voice\Webhook\Answer;
use Vonage\Voice\Webhook\Factory;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

// Receive voice call
$app->get('/webhooks/answer', function (Request $request, Response $response, array $args) {
    /** @var Answer $call */
    $call = Factory::createFromRequest($request);
    $fromSplitIntoCharacters = implode(" ", str_split($call->getFrom()));

    $client = new Client();
    $response = $client->get('https://uselessfacts.jsph.pl/random.json?language=en');
    $responseArray = json_decode($response->getBody(), true);

    $ncco = new NCCO();
    $ncco->addAction(
            new Talk('Thank you for calling from ' . $fromSplitIntoCharacters)
        )
        ->addAction(
            new Talk('Your fact is: ' . $responseArray['text'])
        );

    return new JsonResponse($ncco);
});

$app->run();