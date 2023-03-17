<?php

declare(strict_types=1);

namespace Ragnarok\Bifrost\Drivers\React;

use Psr\Http\Message\RequestInterface;
use Ragnarok\Bifrost\DriverInterface;
use React\Http\Browser;
use React\Promise\ExtendedPromiseInterface;

class Driver implements DriverInterface
{
    public function __construct(
        private Browser $browser = new Browser()
    ) {
        $browser->withRejectErrorResponse(false);
    }

    /**
     * @return ExtendedPromiseInterface<\Psr\Http\Message\ResponseInterface>
     */
    public function makeRequest(RequestInterface $request): ExtendedPromiseInterface
    {
        return $this->browser->request(
            $request->getMethod(),
            $request->getUri(),
            $request->getHeaders(),
            $request->getBody()
        );
    }
}
