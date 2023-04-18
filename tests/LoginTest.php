<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

include './Model/index.php';

final class LoginTest extends TestCase
{
    public function testCanBeLoginSuccess(): void
    {
        $data = [
            'user' => ' duyen',
            'pass' => 'duyen12345678'
        ];

        $checkLogin = login($data);

        $this->assertEquals($data['user'], $checkLogin);
    }

    public function testCanBeLoginPasswordEmpty(): void
    {
        $data = [
            'user' => 'duyen',
            'pass' => ''
        ];

        $checkLogin = login($data);

        $this->assertEquals('Tài khoản hoặc mật khẩu không được để trống', $checkLogin);
    }

    public function testCanBeLoginUsernameEmpty(): void
    {
        $data = [
            'user' => '',
            'pass' => 'nguyen123'
        ];

        $result = login($data);

        $this->assertEquals('Tài khoản hoặc mật khẩu không được để trống', $result);
    }

    public function testCanBeLoginWrongUsername(): void
    {
        $data = [
            'user' => 'fglkjsdfhgl',
            'pass' => 'duyen123'
        ];

        $result = login($data);

        $this->assertEquals('Tài khoản chưa được đăng ký', $result);
    }

    public function testCanBeLoginWrongPassword(): void
    {
        $data = [
            'user' => 'duyen',
            'pass' => 'nguyen13'
        ];

        $result = login($data);

        $this->assertEquals('Sai mật khẩu', $result);
    }
}