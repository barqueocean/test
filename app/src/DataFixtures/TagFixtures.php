<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TagFixtures extends Fixture
{
    public const TAGS = [
        'php',
        'symfony',
        'docker',
        'linux',
        'mysql',
        'ai',
        'sport',
        'travel',
        'politics',
        'news',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::TAGS as $index => $name) {

            $tag = new Tag();

            $tag->setName($name);
            $tag->setSlug($name);

            $manager->persist($tag);

            $this->addReference(
                'tag_'.$index,
                $tag
            );
        }

        $manager->flush();
    }
}

