<?php

namespace App\Action\Organization;

use App\Service\Organization as Service;
use Fusio\Engine\Action\RuntimeInterface;
use Fusio\Engine\ActionAbstract;
use Fusio\Engine\ContextInterface;
use Fusio\Engine\ParametersInterface;
use Fusio\Engine\RequestInterface;
use Fusio\Impl\Service\System\ContextFactory;
use PSX\Http\Environment\HttpResponse;

class Delete extends ActionAbstract
{
    public function __construct(RuntimeInterface $runtime, private Service $service, private ContextFactory $contextFactory)
    {
        parent::__construct($runtime);
    }

    public function handle(RequestInterface $request, ParametersInterface $configuration, ContextInterface $context) : mixed
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
