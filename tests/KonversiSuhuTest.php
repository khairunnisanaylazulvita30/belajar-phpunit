<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

final class KonversiSuhuTest extends TestCase
{
    // Pengujian Celsius ke Fahrenheit
    #[DataProvider('fahrenheitProvider')]
    public function testCelsiusCanBeConvertedToFahrenheit(
        float $celsius,
        float $expected
    ): void {
        // Arrange
        $converter = new KonversiSuhu();

        // Act
        $result = $converter->celsiusKeFahrenheit($celsius);

        // Assert
        $this->assertEqualsWithDelta($expected, $result, 0.001);
    }

    // Data Provider Fahrenheit
    public static function fahrenheitProvider(): array
    {
        return [
            'titik beku' => [0, 32],
            'titik didih' => [100, 212],
            'suhu negatif' => [-40, -40],
            'suhu tubuh' => [37, 98.6],
            'suhu 36.6 derajat' => [36.6, 97.88],
        ];
    }

    // Pengujian Celsius ke Kelvin
    #[DataProvider('kelvinProvider')]
    public function testCelsiusCanBeConvertedToKelvin(
        float $celsius,
        float $expected
    ): void {
        // Arrange
        $converter = new KonversiSuhu();

        // Act
        $result = $converter->celsiusKeKelvin($celsius);

        // Assert
        $this->assertEqualsWithDelta($expected, $result, 0.001);
    }

    // Data Provider Kelvin
    public static function kelvinProvider(): array
    {
        return [
            'titik beku' => [0, 273.15],
            'titik didih' => [100, 373.15],
            'suhu negatif' => [-40, 233.15],
            'suhu tubuh' => [37, 310.15],
        ];
    }
}