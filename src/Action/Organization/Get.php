<?php

namespace App\Action\Organization;

use App\View\Organization as View;
use Fusio\Engine\Action\RuntimeInterface;
use Fusio\Engine\ActionAbstract;
use Fusio\Engine\ContextInterface;
use Fusio\Engine\ParametersInterface;
use Fusio\Engine\RequestInterface;
use Fusio\Impl\Service\System\ContextFactory;

class Get extends ActionAbstract
{
    public function __construct(RuntimeInterface $runtime, private View $view, private ContextFactory $contextFactory)
    {
        parent::__construct($runtime);
    }

    public function handle(RequestInterface $request, ParametersInterface $configuration, ContextInterface $context) : mixed
    {
        return $this->view->getEntity(
            $request->get('id'),
            $this->contextFactory->newActionContext($context)
        );
    }
}
