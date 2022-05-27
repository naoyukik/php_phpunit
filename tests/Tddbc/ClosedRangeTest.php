<?php

namespace Tddbc;

use PHPUnit\Framework\TestCase;

class ClosedRangeTest extends TestCase
{
    /**
     * 整数閉区間は下端点と上端点を持つ
     * @test
     * @return void
     * @testdox 整数閉区間の下端点と上端点を取得
     */
    public function 整数閉区間の下端点と上端点を取得(): void
    {
        $closedRange = new ClosedRange(3, 7);
        $this->assertEquals(3, $closedRange->getLowerEndpoint());
        $this->assertEquals(7, $closedRange->getUpperEndpoint());
    }

    /**
     * 整数閉区間の文字列表記を返す（例: 下端点 3, 上端点 7 の整数閉区間の文字列表記は "[3,7]"）。
     * @test
     * @return void
     * @testdox 整数閉区間の文字列表記を返す
     */
    public function 整数閉区間の文字列表記を返す(): void
    {
        $closedRange = new ClosedRange(3, 7);
        $result = $closedRange->toString();
        $this->assertEquals('[3,7]', $result);
    }

    /**
     * 整数閉区間は指定した整数を含むかどうかを判定する
     *
     * @test
     * @return void
     * @testdox 整数閉区間の下端点同値類の整数3の場合trueを返す
     */
    public function 整数閉区間の下端点同値類の整数3の場合trueを返す(): void
    {
        $closedRange = new ClosedRange(3, 7);
        $result = $closedRange->containsSpecifiedInt(3);
        $this->assertTrue($result);
    }

    /**
     * 整数閉区間は指定した整数を含むかどうかを判定する
     *
     * @test
     * @return void
     * @testdox 整数閉区間の下端点のひとつ外側の整数2を含まないならfalseを返す
     */
    public function 整数閉区間の下端点のひとつ外側の整数2を含まないならfalseを返す(): void
    {
        $closedRange = new ClosedRange(3, 7);
        $result = $closedRange->containsSpecifiedInt(2);
        $this->assertFalse($result);
    }

    /**
     * @group 整数閉区間は指定した整数を含むかどうかを判定する
     * @test
     * @return void
     * @testdox 整数閉区間の上端点同値類の整数7の場合trueを返す
     */
    public function 整数閉区間の上端点同値類の整数7の場合trueを返す(): void
    {
        $closedRange = new ClosedRange(3, 7);
        $result = $closedRange->containsSpecifiedInt(7);
        $this->assertTrue($result);
    }

    /**
     * @group 整数閉区間は指定した整数を含むかどうかを判定する
     * @test
     * @return void
     * @testdox 整数閉区間の上端点のひとつ外側の整数8を含まないならfalseを返す
     */
    public function 整数閉区間の上端点のひとつ外側の整数8を含まないならfalseを返す(): void
    {
        $closedRange = new ClosedRange(3, 7);
        $result = $closedRange->containsSpecifiedInt(8);
        $this->assertFalse($result);
    }
}