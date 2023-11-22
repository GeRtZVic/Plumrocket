<?php
declare(strict_types=1);

namespace Plumrocket\Reviews\Service\WebApi;

use Magento\Customer\Model\Session;
use Plumrocket\Reviews\Api\AddReviewInterface;
use Plumrocket\Reviews\Api\Data\ReviewInterface;
use Plumrocket\Reviews\Api\Data\ReviewInterfaceFactory;
use Plumrocket\Reviews\Api\ReviewRepositoryInterface;

class AddReview implements AddReviewInterface
{
    /**
     * @var ReviewInterfaceFactory
     */
    private ReviewInterfaceFactory $reviewInterfaceFactory;

    /**
     * @var ReviewRepositoryInterface
     */
    private ReviewRepositoryInterface $reviewRepository;

    /**
     * @var Session
     */
    private Session $session;

    /**
     * @param ReviewInterfaceFactory $reviewInterfaceFactory
     * @param ReviewRepositoryInterface $reviewRepository
     * @param Session $session
     */
    public function __construct(
        ReviewInterfaceFactory $reviewInterfaceFactory,
        ReviewRepositoryInterface $reviewRepository,
        Session $session
    ) {
        $this->reviewInterfaceFactory = $reviewInterfaceFactory;
        $this->reviewRepository = $reviewRepository;
        $this->session = $session;
    }

    /**
     * @inheritDoc
     */
    public function execute(ReviewInterface $review): bool
    {
        $review->setCustomerId((int)$this->session->getCustomerId());
        try {
            $this->reviewRepository->save($review);

            return true;
        } catch (\Exception $exception){
            return false;
        }
    }
}
