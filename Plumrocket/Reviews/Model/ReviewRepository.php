<?php
declare(strict_types=1);

namespace Plumrocket\Reviews\Model;

use Exception;
use Magento\Framework\Api\Search\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Plumrocket\Reviews\Api\Data\ReviewInterface;
use Plumrocket\Reviews\Api\Data\ReviewInterfaceFactory;
use Plumrocket\Reviews\Api\Data\ReviewListInterfaceFactory;
use Plumrocket\Reviews\Api\Data\ReviewSearchResultInterface;
use Plumrocket\Reviews\Api\Data\ReviewSearchResultInterfaceFactory;
use Plumrocket\Reviews\Api\ReviewRepositoryInterface;
use Plumrocket\Reviews\Model\ResourceModel\Review\CollectionFactory;
use Plumrocket\Reviews\Model\ResourceModel\ReviewResource;

class ReviewRepository implements ReviewRepositoryInterface
{
    /**
     * @var ReviewSearchResultInterfaceFactory
     */
    private ReviewSearchResultInterfaceFactory $reviewSearchResultInterfaceFactory;

    /**
     * @var CollectionFactory
     */
    private ResourceModel\Review\CollectionFactory $collectionFactory;

    /**
     * @var ReviewListInterfaceFactory
     */
    private ReviewListInterfaceFactory $reviewListInterfaceFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessor;

    /**
     * @var ReviewInterfaceFactory
     */
    private ReviewInterfaceFactory $reviewInterfaceFactory;

    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * @var ReviewResource
     */
    private ReviewResource $reviewResource;

    /**
     * @param ReviewSearchResultInterfaceFactory $reviewSearchResultInterfaceFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param ReviewListInterfaceFactory $reviewListInterfaceFactory
     * @param ReviewInterfaceFactory $reviewInterfaceFactory
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param CollectionFactory $collectionFactory
     * @param ReviewResource $reviewResource
     */
    public function __construct(
        ReviewSearchResultInterfaceFactory $reviewSearchResultInterfaceFactory,
        CollectionProcessorInterface       $collectionProcessor,
        ReviewListInterfaceFactory         $reviewListInterfaceFactory,
        ReviewInterfaceFactory             $reviewInterfaceFactory,
        SearchCriteriaBuilder              $searchCriteriaBuilder,
        CollectionFactory                  $collectionFactory,
        ReviewResource                     $reviewResource
    ) {
        $this->reviewSearchResultInterfaceFactory = $reviewSearchResultInterfaceFactory;
        $this->reviewListInterfaceFactory = $reviewListInterfaceFactory;
        $this->reviewInterfaceFactory = $reviewInterfaceFactory;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->collectionProcessor = $collectionProcessor;
        $this->collectionFactory = $collectionFactory;
        $this->reviewResource = $reviewResource;
    }

    /**
     * @inheritDoc
     *
     * @throws NoSuchEntityException
     */
    public function getById(int $entity_id): ReviewInterface
    {
        $model = $this->reviewInterfaceFactory->create();
        $this->reviewResource->load($model, $entity_id);
        if (!$model->getId()) {
            throw new NoSuchEntityException(__('Unable to find entity with ID "%1"', $entity_id));
        }

        return $model;
    }

    /**
     * @inheritDoc
     *
     * @throws AlreadyExistsException
     */
    public function save(ReviewInterface $model): ReviewInterface
    {
        $this->reviewResource->save($model);
        return $model;
    }

    /**
     * @inheritDoc
     *
     * @throws CouldNotDeleteException
     */
    public function delete(ReviewInterface $model): void
    {
        try {
            $this->reviewResource->delete($model);
        } catch (Exception $exception) {
            throw new CouldNotDeleteException(
                __('Could not delete the entry: %1', $exception->getMessage())
            );
        }
    }

    /**
     * @inheritDoc
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);
        /** @var ReviewSearchResultInterface $searchResults */
        $searchResults = $this->reviewSearchResultInterfaceFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());

        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function getAll(): \Plumrocket\Reviews\Api\Data\ReviewListInterface
    {
        $searchCriteria = $this->searchCriteriaBuilder->create();
        $searchResult = $this->getList($searchCriteria);
        $reviewList = $this->reviewListInterfaceFactory->create();
        $reviewList->setReviewList($searchResult->getItems());

        return $reviewList;
    }
}
