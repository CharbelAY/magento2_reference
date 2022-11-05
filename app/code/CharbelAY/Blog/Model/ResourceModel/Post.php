<?php


namespace CharbelAY\Blog\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Post extends AbstractDb
{
    const BLOG_POST_TABLE_NAME = 'charbelay_blog_posts';
    const BLOG_POST_ID_NAME = 'id';

    protected function _construct()
    {
        $this->_init(self::BLOG_POST_TABLE_NAME, self::BLOG_POST_ID_NAME);
    }
}
