<?php

namespace Workshop\Bundle\UserBundle\Twig;

/**
 * Class PriceExtension
 * @package Workshop\Bundle\UserBundle\Twig
 */
class PriceExtension extends \Twig_Extension
{
    /**
     * @return array
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('price', array($this, 'priceFunction')),
        );
    }

    /**
     * @param int $money
     * @param  int $currency
     * @return string
     */
    public function priceFunction($money, $currency = 10000)
    {
        $price = number_format($money / $currency);
        $price = '$'.$price;

        return $price;
    }

    public function getName()
    {
        return 'price_extension';
    }
}