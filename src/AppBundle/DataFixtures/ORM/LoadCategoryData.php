<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $categoryIT = new Category();
        $categoryIT->setTitle('Information technology');

        $manager->persist($categoryIT);
        $manager->flush();

        $this->addReference('it-category', $categoryIT);

        $categoryArt = new Category();
        $categoryArt->setTitle('Design and Art');

        $manager->persist($categoryArt);
        $manager->flush();

        $this->addReference('art-category', $categoryArt);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
}
