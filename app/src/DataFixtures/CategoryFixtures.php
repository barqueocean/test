<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATEGORIES = [
        'Politics',
        'Sport',
        'Tech',
        'Lifestyle',
        'Travel',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::CATEGORIES as $index => $name) {

            $category = new Category();

            $category->setName($name);
            $category->setSlug(strtolower($name));

            $manager->persist($category);

            $this->addReference(
                'category_'.$index,
                $category
            );
        }

        $manager->flush();
    }
}

