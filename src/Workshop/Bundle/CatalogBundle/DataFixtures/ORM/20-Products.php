<?php
namespace Workshop\Bundle\CatalogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Workshop\Bundle\CatalogBundle\Entity\Product;
use Workshop\Bundle\CatalogBundle\Entity\Catalog;

class Products extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 80; $i++) {
            $product = new Product();
            $catalogNumber = rand(1, 5);
            $product->setName('Product_'.($i+1).'_'.$catalogNumber);
            $product->setCatalog($this->getCatalog($manager, 'Catalog_'.$catalogNumber));
            $manager->persist($product);
        }
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */

    public function getOrder()
    {
        return 20;
    }

    /**
     * Get catalog
     *
     * @param ObjectManager $manager
     * @param string $name
     *
     * @return Catalog
     */
    private function getCatalog(ObjectManager $manager, $name)
    {
        return $manager->getRepository('WorkshopCatalogBundle:Catalog')->findOneBy(
            array(
                'name' => $name
            )
        );
    }
}