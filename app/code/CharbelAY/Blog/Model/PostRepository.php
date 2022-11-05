<?php


namespace CharbelAY\Blog\Model;



use CharbelAY\Blog\Api\Data\PostInterface;
use CharbelAY\Blog\Api\PostRepositoryInterface;
use CharbelAY\Blog\Model\ResourceModel\Post as PostResourceModel;
use Magento\Framework\Exception\NoSuchEntityException;

class PostRepository implements PostRepositoryInterface
{

    private PostFactory $postFactory;
    private PostResourceModel $postResourceModel;

    public function __construct(
        PostFactory $postFactory,
        PostResourceModel $postResourceModel
    )
    {
        $this->postFactory = $postFactory;
        $this->postResourceModel = $postResourceModel;
    }

    public function save(PostInterface $post): PostInterface
    {
        $this->postResourceModel->save($post);

        return $post;
    }

    public function getById(int $id): PostInterface
    {
        $post = $this->postFactory->create();
        $this->postResourceModel->load($post, $id);

        if (!$post->getId()) {
            throw new NoSuchEntityException(__('The blog with id %1 doesn\'t exist ', $id));
        }

        return $post;
    }

    public function deleteById(int $id): bool
    {
        // TODO: Implement deleteById() method.
    }
}
