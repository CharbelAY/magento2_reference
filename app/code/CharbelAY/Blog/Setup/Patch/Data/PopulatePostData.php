<?php


namespace CharbelAY\Blog\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchInterface;

use CharbelAY\Blog\Api\PostRepositoryInterface;
use CharbelAY\Blog\Model\PostFactory;

class PopulatePostData implements DataPatchInterface
{
    private ModuleDataSetupInterface $moduleDataSetup;
    private PostFactory $postFactory;
    private PostRepositoryInterface $postRepository;

    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        PostFactory $postFactory,
        PostRepositoryInterface $postRepository
    )
    {
        $this->postFactory = $postFactory;
        $this->postRepository = $postRepository;
        $this->moduleDataSetup = $moduleDataSetup;
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }

    public function apply()
    {
        $this->moduleDataSetup->startSetup();

        $post = $this->postFactory->create();
        $post->setData([
            'title' => 'An awesome post',
            'content' => 'This is totally awesome!',
        ]);
        $this->postRepository->save($post);

        $this->moduleDataSetup->endSetup();
    }
}
