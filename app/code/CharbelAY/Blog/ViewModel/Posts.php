<?php


namespace CharbelAY\Blog\ViewModel;


use Magento\Framework\DataObject;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Posts implements ArgumentInterface
{
    public function getPosts(): array {
        return [
            new DataObject(['id'=>1, 'title'=>'charbel']),
            new DataObject(['id'=>2, 'title'=>'younes'])
        ];
    }

}
