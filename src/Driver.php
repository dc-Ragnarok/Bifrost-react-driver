<?php

declare(strict_types=1);

namespace Ragnarok\Bifrost\Drivers\React;

use HttpSoft\Message\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Ragnarok\Bifrost\DriverInterface;
use React\Http\Browser;
use React\Promise\ExtendedPromiseInterface;

class Driver implements DriverInterface
{
    public function __construct(
        private Browser $browser = new Browser()
    ) {
    }

    public function makeRequest(RequestInterface $request): ExtendedPromiseInterface
    {
        return $this->browser->request(
            $request->getMethod(),
            $request->getUri(),
            $request->getHeaders(),
            $request->getBody()
        )->then(function (ResponseInterface $response) {
            return new Response(
                $response->getStatusCode(),
                $response->getHeaders(),
                $response->getBody(),
                $response->getProtocolVersion(),
                $response->getReasonPhrase()
            );
        });
    }
}
