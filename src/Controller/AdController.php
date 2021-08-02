<?php

declare(strict_types=1);

namespace App\Controller;

use App\Controller\BaseController;
use Slim\Http\ServerRequest;
use Slim\Http\Response;

class AdController extends BaseController
{
    public function getTest(ServerRequest $request, Response $response): Response
    {
        $response->getBody()->write("Hello, Slim");
        return $response;
    }

    public function getAll(ServerRequest $request, Response $response): Response
    {
        $ads = $this->container->get('ads_service')->getAll();

        $responseData = [
            'ads' => $ads
        ];

        return $this->response($response, $responseData, 200);
    }

    public function getAllAds(ServerRequest $request, Response $response): Response
    {
        //
    }

    public function getAd(ServerRequest $request, Response $response, $args): Response
    {
        //
    }

    public function addAd(ServerRequest $request, Response $response): Response
    {
        //
    }


}
