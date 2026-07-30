<?php

namespace App\Action\Person;

use App\View\Person as View;
use Fusio\Engine\ActionInterface;
use Fusio\Engine\ContextInterface;
use Fusio\Engine\ParametersInterface;
use Fusio\Engine\RequestInterface;
use Fusio\Impl\Backend\Filter\QueryFilter;
use Fusio\Impl\Service\System\ContextFactory;

readonly class GetAll implements ActionInterface
{
    public function __construct(private View $view, private ContextFactory $contextFactory)
    {
    }

    public function handle(RequestInterface $request, ParametersInterface $configuration, ContextInterface $context): mixed
    {
        return $this->view->getCollection(
            QueryFilter::from($request),
            $this->contextFactory->newActionContext($context)
        );
    }
}
