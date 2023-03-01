<?php

declare(strict_types=1);

namespace Ragnarok\Bifrost\Drivers\React;

use Psr\Http\Message\ResponseInterface;
use Ragnarok\Bifrost\DriverInterface;
use Ragnarok\Bifrost\Request;
use Ragnarok\Bifrost\Response;
use React\Http\Browser;
use React\Promise\ExtendedPromiseInterface;

class Driver implements DriverInterface
{
    public function __construct(
        private Browser $browser = new Browser()
    ) {
    }

    public function makeRequest(Request $request): ExtendedPromiseInterface
    {
        return $this->browser->request(
            $request->getMethod()->value,
            $request->getEndpoint()->getCompleteEndpoint(),
            $request->getHeaders(),
            $request->getBody()
        )->then(function (ResponseInterface $response) {
            return new Response(
                $response->getStatusCode(),
                (string) $response->getBody(),
                $response->getHeaders()
            );
        });
    }
}
