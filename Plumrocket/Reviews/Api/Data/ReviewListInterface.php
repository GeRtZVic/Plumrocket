<?php

namespace Plumrocket\Reviews\Api\Data;

interface ReviewListInterface
{
    public const REVIEW_LIST = 'review_list';
    /**
     * @return \Plumrocket\Reviews\Api\Data\ReviewInterface[]
     */
    public function getReviewList(): ?array;

    /**
     * @param \Plumrocket\Reviews\Api\Data\ReviewInterface[] $reviewList
     * @return ReviewListInterface
     */
    public function setReviewList(array $reviewList): ReviewListInterface;

}
