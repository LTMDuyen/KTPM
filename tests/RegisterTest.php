<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

include './Model/index.php';

function random($n) // random chuỗi length = n
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}

final class RegisterTest extends TestCase
{
    public function testCanBeRegisterSuccess(): void
    {
        $username = random(10);
        $data = [
            'user' => $username,
            'pass' => 'd12345678',
            'rpass' => 'd12345678',
            'name' => 'Lương Thị Mỹ Duyên',
            'sdt' => '0774565149',
            'email' => $username . '@gmail.com'
        ];

        $checkRegister = register($data);

        $this->assertEquals($data['user'], $checkRegister);
    }

    public function testFailPass(): void
    {
        $data = [
            'user' => 'luong duyen 2',
            'pass' => 'duyen',
            'rpass' => 'duyen',
            'name' => 'Lương Thị Mỹ Duyên',
            'sdt' => '0774565149',
            'email' => 'duyen@gmail.com'
        ];

        $checkRegister = register($data);

        $this->assertEquals('Mật khẩu tối thiểu 8 ký tự và ít nhất 1 số', $checkRegister);
    }

    public function testFailRePass(): void
    {
        $data = [
            'user' => 'luong duyen 3',
            'pass' => 'duyen12345678',
            'rpass' => 'duyen',
            'name' => 'Lương Thị Mỹ Duyên',
            'sdt' => '0774565149',
            'email' => 'duyen@gmail.com'
        ];

        $checkRegister = register($data);

        $this->assertEquals('Mật khẩu không trùng khớp', $checkRegister);
    }

    public function testFailName(): void
    {
        $username = random(10);
        $data = [
            'user' => $username,
            'pass' => 'd12345678',
            'rpass' => 'd12345678',
            'name' => 'Lương Thị Mỹ Duyên 123',
            'sdt' => '0774565149',
            'email' => $username . '@gmail.com'
        ];

        $checkRegister = register($data);

        $this->assertEquals('Họ tên không hợp lệ', $checkRegister);
    }

    public function testFailSdt(): void
    {
        $data = [
            'user' => 'luong duyen 5',
            'pass' => 'duyen12345678',
            'rpass' => 'duyen12345678',
            'name' => 'Lương Thị Mỹ Duyên',
            'sdt' => '07745651491234',
            'email' => 'duyen@gmail.com'
        ];

        $checkRegister = register($data);

        $this->assertEquals('Số điện thoại không chính xác', $checkRegister);
    }

    public function testFailEmail(): void
    {
        $data = [
            'user' => 'luong duyen 6',
            'pass' => 'duyen12345678',
            'rpass' => 'duyen12345678',
            'name' => 'Lương Thị Mỹ Duyên',
            'sdt' => '0774565149',
            'email' => 'duyengmail.com'
        ];

        $checkRegister = register($data);

        $this->assertEquals('Email không hợp lệ', $checkRegister);
    }
}

// Nên sửa cái user cho random.. chứ không lỡ đăng ký rồi thì oke :v