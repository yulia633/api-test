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

    public function getAllAds(ServerRequest $request, Response $response): Response
    {
        $page = $request->getQueryParam('page', null);
        $perPage = $request->getQueryParam('perPage', null);
        $title = $request->getQueryParam('title', null);
        $price = $request->getQueryParam('price', null);
        $photo = $request->getQueryParam('photo', null);
        $name = $request->getQueryParam('name', null);
        $organization = $request->getQueryParam('organization', null);

        $ads = $this->container->get('ads_service')->getAdsByPage(
            (int) $page,
            (int) $perPage,
            $title,
            $price,
            $photo,
            $name,
            $organization
        );

        $responseData = [
            'ads' => $ads
        ];
        return $this->response($response, $responseData, 200);
    }

    public function getAd(ServerRequest $request, Response $response, $args): Response
    {
        $input = (array) $request->getQueryParams()['fields'];

        $adId = (int) $args['id'];

        if (!empty($input)) {
            $ad = $this->container->get('ads_service')->getOneFull($adId, $input);
        } else {
            $ad = $this->container->get('ads_service')->getOne($adId, $input);
        }

        $responseData = [
            'ad' => $ad
        ];

        return $this->response($response, $responseData, 200);
    }
}
