<?php


namespace CharbelAY\Blog\Controller\Index;


use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Index implements HttpGetActionInterface
{

    private PageFactory $pageFactory;
    private ManagerInterface $mangerint;

    public function __construct(PageFactory $pageFactory, ManagerInterface $mangerint)
    {
        $this->pageFactory = $pageFactory;
        $this->mangerint = $mangerint;
    }

    public function execute(): Page
    {
        $this->mangerint->dispatch('charbelay_event', [
            'data'=>'hey'
        ]);


        return $this->pageFactory
            ->create()
            ->addHandle('blog_index_index');
    }
}
