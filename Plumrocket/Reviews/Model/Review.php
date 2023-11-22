<?php
declare(strict_types=1);

namespace Plumrocket\Reviews\Model;

use Magento\Framework\Model\AbstractModel;
use Plumrocket\Reviews\Api\Data\ReviewInterface;

class Review extends AbstractModel implements ReviewInterface
{
    protected function _construct()
    {
        $this->_init(ResourceModel\ReviewResource::class);
    }

    /**
     * @inheritDoc
     */
    public function getEntityId(): int
    {
        return (int)$this->getData(self::ENTITY_ID);
    }

    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return $this->getData(self::TITLE);
    }

    /**
     * @inheritDoc
     */
    public function getReview(): string
    {
        return $this->getData(self::REVIEW);
    }

    /**
     * @inheritDoc
     */
    public function getPros(): ?string
    {
        return $this->getData(self::PROS);
    }

    /**
     * @inheritDoc
     */
    public function getCons(): ?string
    {
        return $this->getData(self::CONS);
    }

    /**
     * @inheritDoc
     */
    public function getCustomerId(): int
    {
        return (int)$this->getData(self::CUSTOMER_ID);
    }

    /**
     * @inheritDoc
     */
    public function getCreateAt(): string
    {
        return $this->getData(self::CUSTOMER_ID);
    }

    /**
     * @inheritDoc
     */
    public function setTitle(string $title): ReviewInterface
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * @inheritDoc
     */
    public function setReview(string $review): ReviewInterface
    {
        return $this->setData(self::REVIEW, $review);
    }

    /**
     * @inheritDoc
     */
    public function setPros(string $pros = null): ReviewInterface
    {
        return $this->setData(self::PROS, $pros);
    }

    /**
     * @inheritDoc
     */
    public function setCons(string $cons = null): ReviewInterface
    {
        return $this->setData(self::CONS, $cons);
    }

    /**
     * @inheritDoc
     */
    public function setCustomerId(int $customerId): ReviewInterface
    {
        return $this->setData(self::CUSTOMER_ID, $customerId);
    }
}
