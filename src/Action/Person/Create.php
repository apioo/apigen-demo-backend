<?php

namespace App\Action\Person;

use App\Service\Person as Service;
use Fusio\Engine\ActionInterface;
use Fusio\Engine\ContextInterface;
use Fusio\Engine\ParametersInterface;
use Fusio\Engine\RequestInterface;
use Fusio\Impl\Service\System\ContextFactory;
use PSX\Http\Environment\HttpResponse;

readonly class Create implements ActionInterface
{
    public function __construct(private Service $service, private ContextFactory $contextFactory)
    {
    }

    public function handle(RequestInterface $request, ParametersInterface $configuration, ContextInterface $context): HttpResponse
    {
        $id = $this->service->create(
            $request->getPayload(),
            $this->contextFactory->newActionContext($context)
        );

        return new HttpResponse(201, [], [
            'success' => true,
            'message' => 'Person successfully created',
            'id' => $id,
        ]);
    }
}
