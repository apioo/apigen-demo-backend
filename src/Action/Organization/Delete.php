<?php

namespace App\Action\Organization;

use App\Service\Organization as Service;
use Fusio\Engine\ActionInterface;
use Fusio\Engine\ContextInterface;
use Fusio\Engine\ParametersInterface;
use Fusio\Engine\RequestInterface;
use Fusio\Impl\Service\System\ContextFactory;
use PSX\Http\Environment\HttpResponse;

readonly class Delete implements ActionInterface
{
    public function __construct(private Service $service, private ContextFactory $contextFactory)
    {
    }

    public function handle(RequestInterface $request, ParametersInterface $configuration, ContextInterface $context): HttpResponse
    {
        $id = $this->service->delete(
            $request->get('id'),
            $this->contextFactory->newActionContext($context)
        );

        return new HttpResponse(200, [], [
            'success' => true,
            'message' => 'Organization successfully deleted',
            'id' => $id,
        ]);
    }
}
