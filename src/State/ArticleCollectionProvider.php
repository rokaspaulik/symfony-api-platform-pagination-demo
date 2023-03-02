<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\Pagination\ArrayPaginator;
use ApiPlatform\State\ProviderInterface;
use App\Dto\ArticleCollectionDto;
use App\Repository\ArticleRepository;

class ArticleCollectionProvider implements ProviderInterface
{
    public const ITEMS_PER_PAGE = 15;

    public function __construct(
        private ProviderInterface $itemProvider,
        private ArticleRepository $articleRepository,
    ) {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $currentPage = $this->getPage($context);
        $currentPageOffset = $this->getOffset($currentPage);

        $articles = $this->articleRepository->findAll();

        return new ArrayPaginator(
            ArticleCollectionDto::createManyFromArticles($articles),
            $currentPageOffset,
            self::ITEMS_PER_PAGE,
        );
    }

    private function getOffset(int $page)
    {
        return self::ITEMS_PER_PAGE * ($page - 1);
    }

    private function getPage(array $context): int
    {
        if (!isset($context['filters']['page'])) {
            return 1;
        }

        return $context['filters']['page'];
    }
}
