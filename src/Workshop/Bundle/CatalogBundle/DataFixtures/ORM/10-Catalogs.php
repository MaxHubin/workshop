<?php
namespace Workshop\Bundle\CatalogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Workshop\Bundle\CatalogBundle\Entity\Catalog;

class Catalogs extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 5; $i++) {
            $catalog = new Catalog();
            $catalog->setName('Catalog_'.($i+1));
            $manager->persist($catalog);
        }
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */

    public function getOrder()
    {
        return 10;
    }
}