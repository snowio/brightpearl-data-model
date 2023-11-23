<?php

namespace SnowIO\BrightpearlDataModel\Test\Unit\ContactCreate;

use PHPUnit\Framework\TestCase;
use SnowIO\BrightpearlDataModel\ContactCreate;
use SnowIO\BrightpearlDataModel\ContactCreate\Communication;
use SnowIO\BrightpearlDataModel\ContactCreate\Communication\Emails;
use SnowIO\BrightpearlDataModel\ContactCreate\Communication\Emails\Email;
use SnowIO\BrightpearlDataModel\ContactCreate\PostAddressIds;

class ContactCreateTest extends TestCase
{
    private function getJsonData(): array
    {
        return [
            "firstName" => "Ben",
            "lastName" => "Ten",
            "postAddressIds" => [
                "DEF" => 111,
                "BIL" => 222,
                "DEL" => 333
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

    public function testFromJsonToJson()
    {
        $data = $this->getJsonData();
        $contactCreate = ContactCreate::fromJson($data);
        self::assertEquals($data, $contactCreate->toJson());
    }

    public function testWithers()
    {
        $communication = Communication::create();
        $emails = Emails::create();
        $email = Email::create();

        $email = $email->withEmail("email@test.com");
        $emails = $emails->withPRI($email)->withSEC($email)->withTER($email);

        $postAddressIds = PostAddressIds::create()
            ->withDEF(111)
            ->withBIL(222)
            ->withDEL(333);

        $contactCreate = ContactCreate::create()
            ->withFirstName("Ben")
            ->withLastName("Ten")
            ->withPostAddressIds($postAddressIds)
            ->withCommunication($communication->withEmails($emails));
        self::assertEquals($this->getJsonData(), $contactCreate->toJson());
    }

    public function testGetters()
    {
        $data = $this->getJsonData();
        $contactCreate = ContactCreate::fromJson($data);

        self::assertEquals("Ben", $contactCreate->getFirstName());
        self::assertEquals("Ten", $contactCreate->getLastName());
        self::assertEquals([
            "DEF" => 111,
            "BIL" => 222,
            "DEL" => 333
        ], $contactCreate->getPostAddressIds()->toJson());
        self::assertEquals(
            ['emails' => [
                'PRI' => ['email' => 'email@test.com'],
                'SEC' => ['email' => 'email@test.com'],
                'TER' => ['email' => 'email@test.com'],
            ]],
            $contactCreate->getCommunication()->toJson()
        );
    }

    public function testEquals()
    {
        $data = $this->getJsonData();
        $contactCreate1 = ContactCreate::fromJson($data);
        $contactCreate2 = ContactCreate::fromJson($data);
        self::assertTrue($contactCreate1->equals($contactCreate2));
    }
}
