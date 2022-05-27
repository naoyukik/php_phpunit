<?php
namespace Tddbc;

use PHPUnit\Framework\TestCase;

/**
 * @testdox Fizz Buzz 数列とその変換規則を扱う fizzbuzz モジュール
 */
class FizzBuzzTest extends TestCase
{
    /**
     * @var FizzBuzz
     */
    protected $fizzbuzz;

    /**
     * {@inheritdoc}
     */
    protected function setUp() : void
    {
        $this->fizzbuzz = new FizzBuzz();
    }

    /**
     * @group 3の倍数の時は数の代わりにFizzに変換する
     * @dataProvider _3の倍数データ
     * @test
     * @testdox _3の倍数を渡すと文字列Fizzを返す
     */
    public function _3の倍数を渡すと文字列Fizzを返す(int $input): void
    {
        $this->assertEquals("Fizz", $this->fizzbuzz->convert($input));
    }

    public function _3の倍数データ(): array
    {
        return [
            '同値類の中の最小の3の倍数' => [3],
            '上限の境界値のひとつ内側の値99' => [99],
        ];
    }

    /**
     * @group 3の倍数の時は数の代わりにFizzに変換する
     * @test
     * @testdox _同値類の中の最小の3の倍数である3を渡すと文字列Fizzを返す
     */
    public function _同値類の中の最小の3の倍数である3を渡すと文字列Fizzを返す(): void
    {
        $this->assertEquals("Fizz", $this->fizzbuzz->convert(3));
    }

    /**
     * @group 3の倍数の時は数の代わりにFizzに変換する
     * @test
     * @testdox _上限の境界値のひとつ内側の値99は3の倍数なので文字列Fizzを返す
     */
    public function _上限の境界値のひとつ内側の値99は3の倍数なので文字列Fizzを返す(): void
    {
        $this->assertEquals("Fizz", $this->fizzbuzz->convert(99));
    }

    /**
     * @dataProvider _5の倍数データ
     * @test
     * @testdox _5の倍数を渡すと文字列Buzzを返す
     */
    public function _5の倍数を渡すと文字列Buzzを返す(int $input): void
    {
        $this->assertEquals("Buzz", $this->fizzbuzz->convert($input));
    }

    public function _5の倍数データ(): array
    {
        return [
            '同値類の中の最小の5の倍数' => [5],
            '上限の境界値のひとつ内側の値100' => [100],
        ];
    }

    /**
     * @group 5の倍数の時は数の代わりにBuzzに変換する
     * @test
     * @testdox _同値類の中の最小の5の倍数である3を渡すと文字列Buzzを返す
     */
    public function _同値類の中の最小の5の倍数である3を渡すと文字列Buzzを返す(): void
    {
        $this->assertEquals("Buzz", $this->fizzbuzz->convert(5));
    }

    /**
     * @group 5の倍数の時は数の代わりにBuzzに変換する
     * @test
     * @testdox _上限の境界値のひとつ内側の値100は5の倍数なので文字列Buzzを返す
     */
    public function _上限の境界値のひとつ内側の値100は5の倍数なので文字列Buzzを返す(): void
    {
        $this->assertEquals("Buzz", $this->fizzbuzz->convert(5));
    }

    /**
     * @group 3と5の両方の倍数の時は数の代わりにFizzBuzzに変換する
     * @test
     * @testdox _同値類の中の最小の3と5の公倍数15を渡すと文字列FizzBuzzを返す
     */
    public function _同値類の中の最小の3と5の公倍数15を渡すと文字列FizzBuzzを返す(): void
    {
        $this->assertEquals("FizzBuzz", $this->fizzbuzz->convert(15));
    }

    /**
     * @group その他の数のときは数をそのまま文字列に変換する
     * @dataProvider _その他の数
     * @test
     * @param int    $input
     * @param string $expected
     * @return void
     * @testdox _その他の数のときは数をそのまま文字列を返す
     */
    public function _その他の数のときは数をそのまま文字列を返す(int $input, string $expected): void
    {
        $this->assertEquals($expected, $this->fizzbuzz->convert($input));
    }

    public function _その他の数(): array
    {
        return [
            '下限の境界値' => [1, '1'],
            '下限の境界値のひとつ内側' => [2, '2']
        ];
    }

    /**
     * @group その他の数のときは数をそのまま文字列に変換する
     * @test
     * @testdox _下限の境界値1を渡すと文字列1を返す
     */
    public function _下限の境界値1を渡すと文字列1を返す(): void
    {
        $this->assertEquals("1", $this->fizzbuzz->convert(1));
    }

    /**
     * @group その他の数のときは数をそのまま文字列に変換する
     * @test
     * @testdox _下限の境界値のひとつ内側の値2を渡すと文字列2を返す
     */
    public function _下限の境界値のひとつ内側の値2を渡すと文字列2を返す(): void
    {
        $this->assertEquals("2", $this->fizzbuzz->convert(2));
    }

    /**
     * @group 仕様の範囲外の値であっても同じ規則が適用される
     * @test
     * @testdox _下限の境界値のひとつ外側の値101を渡すと文字列101を返す
     */
    public function _下限の境界値のひとつ外側の値101を渡すと文字列101を返す(): void
    {
        $this->assertEquals("101", $this->fizzbuzz->convert(101));
    }

    /**
     * @group 仕様の範囲外の値であっても同じ規則が適用される
     * @test
     * @testdox _下限の境界値の一つ外側0は3の倍数でも5の倍数でもあるので文字列FizzBuzzを返す
     */
    public function _下限の境界値の一つ外側0は3の倍数でも5の倍数でもあるので文字列FizzBuzzを返す(): void
    {
        $this->assertEquals("FizzBuzz", $this->fizzbuzz->convert(0));
    }
}
