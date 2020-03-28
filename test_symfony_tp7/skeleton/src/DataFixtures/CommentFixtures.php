<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use App\Entity\Comment;

class CommentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        for($j = 0 ; $j < 10; $j++) {
            $ref_article = 'article_' . $j;
            $nb_comments = rand(0, 9);
            
            for ($i = 0; $i < $nb_comments; $i++) {
                $comment = new Comment();
                $comment->setName($faker->name);
                $comment->setEmail($faker->email);
                $comment->setCreatedAt($faker->dateTime);
                $comment->setComment($faker->sentence($nbWords = 12, $variableNbWords = true));
                $article = $this->getReference($ref_article);
                $comment->setArticle($article);
                $article->addComment($comment);
                $manager->persist($comment);
                $manager->flush();
            }
        }
    }
}
