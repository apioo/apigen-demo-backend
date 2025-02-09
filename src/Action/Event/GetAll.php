<?php

namespace App\Action\Event;

use App\View\Event as View;
use Fusio\Engine\Action\RuntimeInterface;
use Fusio\Engine\ActionAbstract;
use Fusio\Engine\ContextInterface;
use Fusio\Engine\ParametersInterface;
use Fusio\Engine\RequestInterface;
use Fusio\Impl\Service\System\ContextFactory;

class GetAll extends ActionAbstract
{
    public function __construct(RuntimeInterface $runtime, private View $view, private ContextFactory $contextFactory)
    {
        parent::__construct($runtime);
    }

    public function handle(RequestInterface $request, ParametersInterface $configuration, ContextInterface $context) : mixed
    {
        return $this->view->getCollection(
            (int) $request->get('startIndex'),
            (int) $request->get('count'),
            $request->get('search'),
            $this->contextFactory->newActionContext($context)
        );
    }
}
