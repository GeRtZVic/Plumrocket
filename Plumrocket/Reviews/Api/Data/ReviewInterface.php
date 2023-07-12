<?php

namespace Plumrocket\Reviews\Api\Data;

interface ReviewInterface
{
    public const ENTITY_ID = "entity_id";

    public const TITLE = "title";

    public const REVIEW = "review";

    public const PROS = "pros";

    public const CONS = "cons";

    public const CUSTOMER_ID = "customer_id";

    public const CREATED_AT = "created_at";

    /**
     * Getter for EntityId.
     *
     * @return int
     */
    public function getEntityId(): int;

    /**
     * @return string
     */
    public function getTitle(): string;

    /**
     * @return string
     */
    public function getReview(): string;

    /**
     * @return string|null
     */
    public function getPros():? string;

    /**
     * @return string|null
     */
    public function getCons():? string;

    /**
     * @return int
     */
    public function getCustomerId(): int;

    /**
     * @return string
     */
    public function getCreateAt(): string;

    /**
     * @param string $title
     * @return ReviewInterface
     */
    public function setTitle(string $title): ReviewInterface;

    /**
     * @param string $review
     * @return ReviewInterface
     */
    public function setReview(string $review): ReviewInterface;

    /**
     * @param string|null $pros
     * @return ReviewInterface
     */
    public function setPros(string $pros = null): ReviewInterface;

    /**
     * @param string|null $cons
     * @return ReviewInterface
     */
    public function setCons(string $cons = null): ReviewInterface;

    /**
     * @param int $customerId
     * @return ReviewInterface
     */
    public function setCustomerId(int $customerId): ReviewInterface;
}
