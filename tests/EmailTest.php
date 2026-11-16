<?php declare(strict_types=1);

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class EmailTest extends TestCase
{
    public function testCanBeCreatedFromValidEmail(): void
    {
        $address = 'user@example.com';

        $email = Email::fromString($address);

        $this->assertInstanceOf(Email::class, $email);
        $this->assertSame($address, $email->asString());
        $this->assertStringContainsString('@', $email->asString());
    }

    #[DataProvider('emailProvider')]
    public function testCanBeCreatedFromVariousValidEmails(string $address): void
    {
        $email = Email::fromString($address);

        $this->assertSame($address, $email->asString());
    }

    public static function emailProvider(): array
    {
        return [
            'email dengan titik' => ['nama.depan@example.com'],
            'email dengan angka' => ['nisa123@example.com'],
            'email dengan subdomain' => ['nisa@mail.example.com'],
            'email dengan tanda plus' => ['nisa+test@example.com'],
        ];
    }
}