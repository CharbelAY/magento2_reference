<?php


namespace CharbelAY\Blog\Model;



use CharbelAY\Blog\Api\Data\PostInterface;
use CharbelAY\Blog\Api\PostRepositoryInterface;
use CharbelAY\Blog\Model\ResourceModel\Post as PostResourceModel;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class PostRepository
 * @package CharbelAY\Blog\Model
 */
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

    /**
     * @param PostInterface $post
     * @return PostInterface
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function save(PostInterface $post): PostInterface
    {
        $this->postResourceModel->save($post);

        return $post;
    }

    /**
     * @param int $id
     * @return PostInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $id): PostInterface
    {
        $post = $this->postFactory->create();
        $this->postResourceModel->load($post, $id);

        if (!$post->getId()) {
            throw new NoSuchEntityException(__('The blog with id %1 doesn\'t exist ', $id));
        }

        return $post;
    }

    /**
     * @param int $id
     * @return bool
     * @throws NoSuchEntityException
     */
    public function deleteById(int $id): bool
    {
        $model = $this->getById($id);
        $this->postResourceModel->delete($model);
    }
}
