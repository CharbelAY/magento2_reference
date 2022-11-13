<?php


namespace CharbelAY\Blog\Api;


use CharbelAY\Blog\Api\Data\PostInterface;

interface PostRepositoryInterface
{
    /**
     * @param PostInterface $post
     * @return PostInterface
     */
    public function save(PostInterface $post): PostInterface;

    /**
     * @param int $id
     * @return PostInterface
     */
    public function getById(int $id): PostInterface;

    /**
     * @param int $id
     * @return bool
     */
    public function deleteById(int $id): bool;
}
