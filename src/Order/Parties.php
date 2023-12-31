<?php

namespace SnowIO\BrightpearlDataModel\Order;

use SnowIO\BrightpearlDataModel\ModelInterface;
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

    /**
     * @return self
     */
    public static function create(): ModelInterface
    {
        return new self();
    }

    private function __construct()
    {
        $this->supplier = Supplier::create();
        $this->delivery = Delivery::create();
        $this->billing = Billing::create();
    }

    /**
     * @return self
     */
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
            'supplier' => $this->supplier->hasData() ? $this->getSupplier()->toJson() : null,
            'delivery' => $this->delivery->hasData() ? $this->getDelivery()->toJson() : null,
            'billing' => $this->billing->hasData() ? $this->getBilling()->toJson() : null
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Parties &&
          $this->supplier->equals($other->supplier) &&
          $this->delivery->equals($other->delivery) &&
          $this->billing->equals($other->billing);
    }

    public function getDelivery(): ?Delivery
    {
        return $this->delivery;
    }

    public function withDelivery(?Delivery $delivery): self
    {
        $clone = clone $this;
        $clone->delivery = $delivery;
        return $clone;
    }

    public function getSupplier(): ?Supplier
    {
        return $this->supplier;
    }

    public function withSupplier(?Supplier $supplier): self
    {
        $clone = clone $this;
        $clone->supplier = $supplier;
        return $clone;
    }

    public function getBilling(): ?Billing
    {
        return $this->billing;
    }

    public function withBilling(?Billing $billing): self
    {
        $clone = clone $this;
        $clone->billing = $billing;
        return $clone;
    }
}
