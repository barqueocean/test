<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Tag;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        $images = [
            'images/news/img01.jpg',
            'images/news/img02.jpg',
            'images/news/img03.jpg',
            'images/news/img04.jpg',
        ];

        for ($i = 1; $i <= 30; $i++) {

            $article = new Article();

            $title = $faker->sentence(6);

            $article->setTitle($title);

            $article->setSlug(
                strtolower(
                    str_replace(' ', '-', trim($title, '.'))
                )
            );

            $article->setContent(
                $faker->paragraphs(8, true)
            );

            $article->setPublishedAt(
                \DateTimeImmutable::createFromMutable(
                    $faker->dateTimeBetween('-3 months')
                )
            );

            $article->setImage(
                $images[array_rand($images)]
            );

            /** @var Category $category */
            $category = $this->getReference(
                'category_'.rand(0, 4),
                Category::class
            );

            $article->setCategory($category);

            /** @var User $user */
            $user = $this->getReference(
                'admin_user',
                User::class
            );

            $article->setAuthor($user);

            for ($j = 0; $j < rand(1, 3); $j++) {

                /** @var Tag $tag */
                $tag = $this->getReference(
                    'tag_'.rand(0, 9),
                    Tag::class
                );

                $article->addTag($tag);
            }

            $manager->persist($article);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
            CategoryFixtures::class,
            TagFixtures::class,
        ];
    }
}

