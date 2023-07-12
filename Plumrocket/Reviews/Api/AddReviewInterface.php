<?php

namespace Plumrocket\Reviews\Api;

use Plumrocket\Reviews\Api\Data\ReviewInterface;

interface AddReviewInterface
{
    /**
     * @param \Plumrocket\Reviews\Api\Data\ReviewInterface $review
     * @return bool
     */
    public function execute(
        ReviewInterface $review
    ): bool;
}
