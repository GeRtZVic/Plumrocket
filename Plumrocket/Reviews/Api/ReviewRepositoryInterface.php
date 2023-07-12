<?php
declare(strict_types=1);

namespace Plumrocket\Reviews\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Plumrocket\Reviews\Api\Data\ReviewInterface;
use Plumrocket\Reviews\Api\Data\ReviewSearchResultInterface;

interface ReviewRepositoryInterface
{
    /**
     * Get company entity by ID
     *
     * @param int $entity_id
     * @return ReviewInterface
     */
    public function getById(int $entity_id): ReviewInterface;

    /**
     * Save company entity
     *
     * @param ReviewInterface $model
     * @return ReviewInterface
     */
    public function save(ReviewInterface $model): ReviewInterface;

    /**
     * Delete company entity
     *
     * @param ReviewInterface $model
     * @return void
     */
    public function delete(ReviewInterface $model): void;

    /**
     * GetList of entities
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return ReviewSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Get all reviews
     *
     * @return \Plumrocket\Reviews\Api\Data\ReviewListInterface
     */
    public function getAll(): \Plumrocket\Reviews\Api\Data\ReviewListInterface;
}
