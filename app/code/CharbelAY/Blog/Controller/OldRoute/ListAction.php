<?php

namespace CharbelAY\Blog\Controller\OldRoute;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\RedirectFactory;

class ListAction implements HttpGetActionInterface
{

    private RedirectFactory $redirectFactory;

    public function __construct(
        RedirectFactory $redirectFactory
    )
    {
        $this->redirectFactory = $redirectFactory;
    }

    // We want to redirect from old route to new route
    public function execute()
    {
        return $this->redirectFactory
            ->create()
            ->setPath('*/newRoute/list');

    }
}
