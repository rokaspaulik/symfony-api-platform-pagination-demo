<?php

namespace App\Dto;

use App\Entity\Article;
use Symfony\Component\Validator\Constraints as Assert;

final class ArticleCollectionDto
{
    public int $id;

    #[Assert\NotNull]
    public string $title;

    public function __construct(
        int $id,
        string $title,
    ) {
        $this->id = $id;
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
                $article->getId(),
                $article->getTitle(),
            );
        }

        return $dtos;
    }
}
