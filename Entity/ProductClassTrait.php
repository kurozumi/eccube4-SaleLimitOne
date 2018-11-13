<?php

namespace Plugin\SaleLimitOne\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Annotation as Eccube;

/**
 * @Eccube\EntityExtension("Eccube\Entity\ProductClass")
 */
trait ProductClassTrait {

    /**
     * @ORM\Column(name="sale_limit_one", type="boolean", options={"default":false})
     * @Eccube\FormAppend(
     *  auto_render=true,
     *  type="\Eccube\Form\Type\ToggleSwitchType",
     *  options={
     *    "label": "商品を一個しか購入できないフラグ"
     *  }
     * )
     */
    private $sale_limit_one;

    public function getSaleLimitOne()
    {
        return $this->sale_limit_one;
    }
    
    public function setSaleLimitOne($sale_limit_one)
    {
        $this->sale_limit_one = $sale_limit_one;
        
        return $this;
    }
}
