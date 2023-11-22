<?php
declare(strict_types=1);

namespace Plumrocket\Reviews\Model;

use Magento\Framework\DataObject;
use Plumrocket\Reviews\Api\Data\ReviewListInterface;

class ReviewList extends DataObject implements ReviewListInterface
{
    /**
     * @inheritDoc
     */
    public function getReviewList(): ?array
    {
        return $this->getData(self::REVIEW_LIST);
    }

    /**
     * @inheritDoc
     */
    public function setReviewList(array $reviewList): ReviewListInterface
    {
        return $this->setData(self::REVIEW_LIST, $reviewList);
    }
}
