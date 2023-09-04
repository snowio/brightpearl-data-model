<?php

namespace SnowIO\BrightpearlDataModel\Test\Unit\ContactCreate;

use PHPUnit\Framework\TestCase;
use SnowIO\BrightpearlDataModel\ContactCreate;
use SnowIO\BrightpearlDataModel\ContactCreate\Communication;

class ContactCreateTest extends TestCase
{
    /**
     * @return array<mixed>
     */
    private function getJsonData(): array
    {
        return [
            "salutation" => "greeting",
            "firstName" => "Ben",
            "lastName" => "Ten",
            "postAddressIds" => [
                "111",
                "222",
                "333"
            ],
            "communication" =>[[]]
            ];
    }

    /**
     * @return void
     */
    public function testFromJsonToJson()
    {
        $data = $this->getJsonData();
        $contactCreate = ContactCreate::fromJson($data);
        self::assertEquals($data, $contactCreate->toJson());
    }

    /**
     * @return void
     */
    public function testWithers()
    {
        $communication = Communication::create();
        $contactCreate = ContactCreate::create()
            ->withSalutation('greeting')
            ->withFirstName("Ben")
            ->withLastName("Ten")
            ->withPostAddressIds(["111","222","333"])
            ->withCommunication($communication);
        self::assertEquals($this->getJsonData(), $contactCreate->toJson());
    }

    /**
     * @return void
     */
    public function testGetters()
    {
        $data = $this->getJsonData();
        $contact = ContactCreate::fromJson($data);

        self::assertEquals("greeting'", $contact->getS);
        self::assertEquals("test@domain.com", $contact->getPrimaryEmail());
        self::assertEquals("test2@domain.com", $contact->getSecondaryEmail());
        self::assertEquals("test3@domain.com", $contact->getTertiaryEmail());
        self::assertEquals("Joe", $contact->getFirstName());
    }

    /**
     * @return void
     */
    public function testEquals()
    {
        $data = $this->getJsonData();
        $contactCreate1 = ContactCreate::fromJson($data);
        $contactCreate2 = ContactCreate::fromJson($data);
        self::assertTrue($contactCreate1->equals($contactCreate2));
    }
}