<?php
namespace Plugin\SaleLimitOne\Service\PurchaseFlow\Processor;

use Eccube\Annotation\CartFlow;
use Eccube\Annotation\OrderFlow;
use Eccube\Annotation\ShoppingFlow;
use Eccube\Entity\ItemInterface;
use Eccube\Service\PurchaseFlow\InvalidItemException;
use Eccube\Service\PurchaseFlow\PurchaseContext;
use Eccube\Service\PurchaseFlow\ItemValidator;

/**
 * @CartFlow
 */
class SaleLimitOneValidator extends ItemValidator {

    /**
     * @param ItemInterface $item
     * @param PurchaseContext $context
     *
     * @throws InvalidItemException
     */
    protected function validate(ItemInterface $item, PurchaseContext $context)
    {
        if (!$item->isProduct()) {
            return;
        }

        if ($item->getProductClass()->getSaleLimitOne()) {
            $quantity = $item->getQuantity();
            if (1 < $quantity) {
                $this->throwInvalidItemException('商品は１個しか購入できません。');
            }
        }
    }

    protected function handle(ItemInterface $item, PurchaseContext $context)
    {
        $item->setQuantity(1);
    }

}
