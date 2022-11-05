<?php


namespace CharbelAY\Blog\Model;


use CharbelAY\Blog\Api\Data\PostInterface;
use Magento\Framework\Model\AbstractModel;

class Post extends AbstractModel implements PostInterface
{
    protected function _construct()
    {
        $this->_init(ResourceModel\Post::class);
    }

    public function getTitle(): string
    {
        return $this->getData(self::TITLE);
    }

    public function setTitle($title)
    {
        $this->setData(self::TITLE, $title);
    }

    public function getContent(): string
    {
        return $this->getData(self::CONTENT);
    }

    public function setContent($content)
    {
        $this->setData(self::CONTENT, $content);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }
}
