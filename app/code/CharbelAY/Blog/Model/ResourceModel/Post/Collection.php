<?php


namespace CharbelAY\Blog\Model\ResourceModel\Post;


use CharbelAY\Blog\Model\Post;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Post::class, \CharbelAY\Blog\Model\ResourceModel\Post::class);
    }
}
