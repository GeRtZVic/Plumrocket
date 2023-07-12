<?php
declare(strict_types=1);

namespace Plumrocket\Reviews\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Plumrocket\Reviews\Api\ReviewRepositoryInterface;

class Reviews implements ArgumentInterface
{
    /**
     * @var ReviewRepositoryInterface
     */
    private ReviewRepositoryInterface $reviewRepository;

    /**
     * @param ReviewRepositoryInterface $reviewRepository
     */
    public function __construct(
        ReviewRepositoryInterface $reviewRepository
    ) {
        $this->reviewRepository = $reviewRepository;
    }

    /**
     * @return \Plumrocket\Reviews\Api\Data\ReviewInterface[]|null
     */
    public function getReviewList(): ?array
    {
        $reviewList = $this->reviewRepository->getAll();

        return $reviewList->getReviewList();
    }
}
