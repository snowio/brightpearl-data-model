<?php

namespace SnowIO\BrightpearlDataModel\Test\Unit\Contact;

use PHPUnit\Framework\TestCase;
use SnowIO\BrightpearlDataModel\Contact;

class ContactTest extends TestCase
{
    /**
     * @return array
     */
    private function getJsonData(): array
    {
        return [
            "contactId" => "123456",
            "primaryEmail" => "test@domain.com",
            "secondaryEmail" => "test2@domain.com",
            "tertiaryEmail" => "test3@domain.com",
            "firstName" => "Joe",
            "lastName" => "Bloggs",
            "isSupplier" => true,
            "companyName" => "Snow",
            "isStaff" => true,
            "isCustomer" => false,
            "createdOn" => "2023-09-01 13:03:53",
            "updatedOn" => "2023-09-01 14:03:53",
            "lastContactedOn" => "2023-09-01 15:03:53",
            "lastOrderedOn" => "2023-09-01 16:03:53",
            "nominalCode" => 123,
            "isPrimary" => true,
            "pri" => "01234567890",
            "sec" => "01234567891",
            "mob" => "01234567892",
            "exactCompanyName" => "Snow Ltd",
            "title" => "Mr",
        ];
    }

    /**
     * @return void
     */
    public function testFromJsonToJson()
    {
        $data = $this->getJsonData();
        $contact = Contact::fromJson($data);
        self::assertEquals($data, $contact->toJson());
    }

    /**
     * @return void
     */
    public function testWithers()
    {
        $contact = Contact::create()
            ->withContactId("123456")
            ->withPrimaryEmail("test@domain.com")
            ->withSecondaryEmail("test2@domain.com")
            ->withTertiaryEmail("test3@domain.com")
            ->withFirstName("Joe")
            ->withLastName("Bloggs")
            ->withIsSupplier(true)
            ->withCompanyName("Snow")
            ->withIsStaff(true)
            ->withIsCustomer(false)
            ->withCreatedOn("2023-09-01 13:03:53")
            ->withUpdatedOn("2023-09-01 14:03:53")
            ->withLastContactedOn("2023-09-01 15:03:53")
            ->withLastOrderedOn("2023-09-01 16:03:53")
            ->withNominalCode(123)
            ->withIsPrimary(true)
            ->withPri("01234567890")
            ->withSec("01234567891")
            ->withMob("01234567892")
            ->withExactCompanyName("Snow Ltd")
            ->withTitle("Mr");

        self::assertEquals($this->getJsonData(), $contact->toJson());
    }

    /**
     * @return void
     */
    public function testGetters()
    {
        $data = $this->getJsonData();
        $contact = Contact::fromJson($data);

        self::assertEquals("123456", $contact->getContactId());
        self::assertEquals("test@domain.com", $contact->getPrimaryEmail());
        self::assertEquals("test2@domain.com", $contact->getSecondaryEmail());
        self::assertEquals("test3@domain.com", $contact->getTertiaryEmail());
        self::assertEquals("Joe", $contact->getFirstName());
        self::assertEquals("Bloggs", $contact->getLastName());
        self::assertTrue($contact->getIsSupplier());
        self::assertEquals("Snow", $contact->getCompanyName());
        self::assertTrue($contact->getIsStaff());
        self::assertFalse($contact->getIsCustomer());
        self::assertEquals("2023-09-01 13:03:53", $contact->getCreatedOn());
        self::assertEquals("2023-09-01 14:03:53", $contact->getUpdatedOn());
        self::assertEquals("2023-09-01 15:03:53", $contact->getLastContactedOn());
        self::assertEquals("2023-09-01 16:03:53", $contact->getLastOrderedOn());
        self::assertEquals(123, $contact->getNominalCode());
        self::assertTrue($contact->getIsPrimary());
        self::assertEquals("01234567890", $contact->getPri());
        self::assertEquals("01234567891", $contact->getSec());
        self::assertEquals("01234567892", $contact->getMob());
        self::assertEquals("Snow Ltd", $contact->getExactCompanyName());
        self::assertEquals("Mr", $contact->getTitle());
    }

    /**
     * @return void
     */
    public function testEquals()
    {
        $data = $this->getJsonData();
        $contact1 = Contact::fromJson($data);
        $contact2 = Contact::fromJson($data);
        self::assertTrue($contact1->equals($contact2));
    }
}