<?php


namespace CharbelAY\Blog\Api;


use CharbelAY\Blog\Api\Data\PostInterface;

interface PostRepositoryInterface
{
    public function save(PostInterface $post): PostInterface;
    public function getById(int $id): PostInterface;
    public function deleteById(int $id): bool;
}
