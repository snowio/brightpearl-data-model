<?php

namespace SnowIO\BrightpearlDataModel\Order;

use SnowIO\BrightpearlDataModel\Api\ModelInterface;
use SnowIO\BrightpearlDataModel\Order\Parties\Billing;
use SnowIO\BrightpearlDataModel\Order\Parties\Delivery;
use SnowIO\BrightpearlDataModel\Order\Parties\Supplier;

class Parties implements ModelInterface
{
    /** @var Delivery|null $delivery */
    private $delivery;

    /** @var Supplier|null $supplier */
    private $supplier;

    /** @var Billing|null $billing */
    private $billing;

    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->supplier = Supplier::fromJson($json['supplier'] ?? []);
        $result->delivery = Delivery::fromJson($json['delivery'] ?? []);
        $result->billing = Billing::fromJson($json['billing'] ?? []);
        return $result;
    }

    public function toJson(): array
    {
        return [
            'supplier' => $this->getSupplier()->toJson(),
            'delivery' => $this->getDelivery()->toJson(),
            'billing' => $this->getBilling()->toJson()
        ];
    }

    /**
     * todo fixs this
     * @param ModelInterface $partiesToCompare
     * @return bool
     */
    public function equals(ModelInterface $partiesToCompare): bool
    {
        if (!$partiesToCompare instanceof Parties) {
            return false;
        }
        if (!is_null($this->getDelivery())
            && !is_null($partiesToCompare->getDelivery())
            && !$this->getDelivery()->equals($partiesToCompare->getDelivery())) {
            return false;
        }
        if ($this->getDelivery() === null) {
            return false;
        }
        if (!$partiesToCompare->getDelivery() instanceof Delivery) {
            return false;
        }

        return $this->getDelivery()->equals($partiesToCompare->getDelivery());
    }

    /**
     * @return Delivery|null
     */
    public function getDelivery(): ?Delivery
    {
        return $this->delivery;
    }

    /**
     * @param Delivery|null $delivery
     * @return self
     */
    public function withDelivery(?Delivery $delivery): self
    {
        $clone = clone $this;
        $clone->delivery = $delivery;
        return $clone;
    }

    /**
     * @return Supplier|null
     */
    public function getSupplier(): ?Supplier
    {
        return $this->supplier;
    }

    /**
     * @param Supplier|null $supplier
     * @return self
     */
    public function withSupplier(?Supplier $supplier): self
    {
        $clone = clone $this;
        $clone->supplier = $supplier;
        return $clone;
    }

    /**
     * @return Billing|null
     */
    public function getBilling(): ?Billing
    {
        return $this->billing;
    }

    /**
     * @param Billing|null $billing
     * @return self
     */
    public function withBilling(?Billing $billing): self
    {
        $clone = clone $this;
        $clone->billing = $billing;
        return $clone;
    }
}
