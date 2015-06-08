<?php
namespace Workshop\Bundle\ProductBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Workshop\Bundle\ProductBundle\Entity\Product;

class Products extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $a1 = new Product();
        $a1->setName('test image1');
        $a1->setImg('1.jpg');

        $a2 = new Product();
        $a2->setName('test image2');
        $a2->setImg('2.jpg');

        $a3 = new Product();
        $a3->setName('test image3');
        $a3->setImg('3.jpg');

        $a4 = new Product();
        $a4->setName('test image4');
        $a4->setImg('4.jpg');

        $a5 = new Product();
        $a5->setName('test image unknown1');

        $a6 = new Product();
        $a6->setName('test image unknown2');

        $manager->persist($a1);
        $manager->persist($a2);
        $manager->persist($a3);
        $manager->persist($a4);
        $manager->persist($a5);
        $manager->persist($a6);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */

    public function getOrder()
    {
        return 1;
    }
}