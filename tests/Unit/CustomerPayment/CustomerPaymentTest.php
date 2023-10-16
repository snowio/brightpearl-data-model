<?php

namespace SnowIO\BrightpearlDataModel\Test\Unit\CustomerPayment;

use PHPUnit\Framework\TestCase;
use SnowIO\BrightpearlDataModel\Contact;
use SnowIO\BrightpearlDataModel\CustomerPayment;

class CustomerPaymentTest extends TestCase
{
    private function getJsonData(): array
    {
        return [
            'transactionRef' => 'paypal_goods',
            'transactionCode' => 'goods',
            'paymentMethodCode' => 'paypal_payment',
            'paymentType' => 'paypal',
            'orderId' => 235767,
            'currencyIsoCode' => 'code',
            'exchangeRate' => 1.5,
            'amountPaid' => 2.33,
            'paymentDate' => '20/20/20002',
            'journalRef' => 'ref-2032'
        ];
    }

    public function testFromJsonToJson()
    {
        $data = $this->getJsonData();
        $customerPayment = CustomerPayment::fromJson($data);
        self::assertEquals($data, $customerPayment->toJson());
    }

    public function testWithers()
    {
        $customerPayment = CustomerPayment::create()
            ->withExchangeRate("1.5")
            ->withAmountPaid(2.33)
            ->withPaymentDate("20/20/20002")
            ->withJournalRef("ref-2032")
            ->withPaymentType("paypal")
            ->withCurrencyIsoCode("code")
            ->withOrderId(235767)
            ->withPaymentMethodCode("paypal_payment")
            ->withTransactionCode("goods")
            ->withTransactionRef("paypal_goods");
        self::assertEquals($this->getJsonData(), $customerPayment->toJson());
    }

    public function testGetters()
    {
        $data = $this->getJsonData();
        $customerPayment = CustomerPayment::fromJson($data);
        self::assertEquals("paypal_goods", $customerPayment->getTransactionRef());
        self::assertEquals("goods", $customerPayment->getTransactionCode());
        self::assertEquals("paypal", $customerPayment->getPaymentType());
        self::assertEquals("235767", $customerPayment->getOrderId());
        self::assertEquals("code", $customerPayment->getCurrencyIsoCode());
        self::assertEquals(1.5, $customerPayment->getExchangeRate());
        self::assertEquals(2.33, $customerPayment->getAmountPaid());
        self::assertEquals("20/20/20002", $customerPayment->getPaymentDate());
        self::assertEquals("ref-2032", $customerPayment->getJournalRef());
    }

    public function testEquals()
    {
        $data = $this->getJsonData();
        $customerPayment1 = CustomerPayment::fromJson($data);
        $customerPayment2 = CustomerPayment::fromJson($data);
        self::assertTrue($customerPayment1->equals($customerPayment2));
    }
}
