<?php

namespace App\Dto;

use App\Entity\Article;
use Symfony\Component\Validator\Constraints as Assert;

final class ArticleCollectionDto
{
    #[Assert\NotNull]
    public string $title;

    public function __construct(
        string $title,
    ) {
        $this->title = $title;
    }

    public static function createManyFromArticles(array $articles): mixed
    {
        $dtos = [];

        /**
         * @var Article $article
         */
        foreach ($articles as $article) {
            $dtos[] = new self(
                $article->getTitle(),
            );
        }

        return $dtos;
    }
}
