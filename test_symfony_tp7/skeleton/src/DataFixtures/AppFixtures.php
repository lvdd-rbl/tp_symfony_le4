<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use App\Entity\Article;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $article = new Article();
            $article->setTitle($faker->sentence($nbWords = 4, $variableNbWords = true));
            $article->setSubtitle($faker->sentence($nbWords = 6, $variableNbWords = true));
            $article->setCreatedAt($faker->dateTime);
            $article->setAuthor($faker->name);
            $article->setBody($faker->paragraph($nbSentences = 3));
            $article->setImage($faker->imageUrl($width = 400, $height = 400));
            $ref_article = 'article_' . $i;
            $manager->persist($article);
            $this->addReference($ref_article, $article);
            $manager->flush();
        }
    }
}
