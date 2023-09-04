<?php

namespace SnowIO\BrightpearlDataModel\Test\Unit\ContactCreate;

use PHPUnit\Framework\TestCase;
use SnowIO\BrightpearlDataModel\ContactCreate;
use SnowIO\BrightpearlDataModel\ContactCreate\Communication;
use SnowIO\BrightpearlDataModel\ContactCreate\Communication\Emails;
use SnowIO\BrightpearlDataModel\ContactCreate\Communication\Emails\Email;

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
            "communication" => [
                'emails' => [
                    "PRI" => ['email' => 'email@test.com'],
                    "SEC" => ['email' => 'email@test.com'],
                    "TER" => ['email' => 'email@test.com'],
                ]
            ]
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
        $emails = Emails::create();
        $email = Email::create();

        $email = $email->withEmail("email@test.com");
        $emails = $emails->withPRI($email)->withSEC($email)->withTER($email);
        $contactCreate = ContactCreate::create()
            ->withSalutation('greeting')
            ->withFirstName("Ben")
            ->withLastName("Ten")
            ->withPostAddressIds(["111", "222", "333"])
            ->withCommunication($communication->withEmails($emails));
        self::assertEquals($this->getJsonData(), $contactCreate->toJson());
    }

    /**
     * @return void
     */
    public function testGetters()
    {
        $data = $this->getJsonData();
        $contact = ContactCreate::fromJson($data);

        $communication = Communication::create();
        $emails = Emails::create();
        $email = Email::create();

        $email = $email->withEmail("email@test.com");
        $emails = $emails->withPRI($email)->withSEC($email)->withTER($email);

        self::assertEquals("greeting", $contact->getSalutation());
        self::assertEquals("Ben", $contact->getFirstName());
        self::assertEquals("Ten", $contact->getLastName());
        self::assertEquals(["111", "222", "333"], $contact->getPostAddressIds());
        self::assertEquals($communication->withEmails($emails)->toJson(), $contact->getCommunication()->toJson());
    }

    /**
     * @return void
     */
    public function testEquals()
    {
        $data = $this->getJsonData();
        $contactCreate1 = ContactCreate::fromJson($data);
        $contactCreate2 = ContactCreate::fromJson($data);
        self::assertEquals($contactCreate1->toJson(), $contactCreate2->toJson());
    }
}