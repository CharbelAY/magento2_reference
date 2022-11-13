<?php


namespace CharbelAY\Blog\Observer;


use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class CatalogObserver implements ObserverInterface
{

    public function execute(Observer $observer)
    {
        $products = $observer->getCollection()->getItems();
        foreach ($products as $key => $productItem) {
            var_dump($key);
//            if ($key === 1556) {
//                $observer->getCollection()->removeItemByKey($key);
//            }
            $productListData[] = array(
                'productName' => $productItem->getName()
            );
        }
        var_dump('okkkkk');
        var_dump($productListData);
        return $this;
        die();
    }
}
