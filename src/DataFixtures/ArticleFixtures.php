<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 200; ++$i) {
            $article = new Article();

            $article->setTitle(
                $faker->word(),
            );

            $article->setDescription(
                $faker->paragraph(),
            );

            $manager->persist($article);
        }

        $manager->flush();
    }
}
