<?php

namespace App\Action\Organization;

use App\View\Organization as View;
use Fusio\Engine\ActionInterface;
use Fusio\Engine\ContextInterface;
use Fusio\Engine\ParametersInterface;
use Fusio\Engine\RequestInterface;
use Fusio\Impl\Backend\Filter\QueryFilter;
use Fusio\Impl\Service\System\ContextFactory;

readonly class Get implements ActionInterface
{
    public function __construct(private View $view, private ContextFactory $contextFactory)
    {
    }

    public function handle(RequestInterface $request, ParametersInterface $configuration, ContextInterface $context): mixed
    {
        return $this->view->getEntity(
            $request->get('id'),
            $this->contextFactory->newActionContext($context)
        );
    }
}
