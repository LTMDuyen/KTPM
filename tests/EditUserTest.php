<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

include './Model/index.php';

final class EditUserTest extends TestCase
{
    public function testCanBeEditUserSuccess(): void
    {
        $user_id = 29;
        $data = [
            'address' => '23 Phạm Như Xương',
            'email' => 'duyen@gmail.com',
            'tel' => '0774565149',
            'date' => '2001-06-18',
            'name' => 'Lương Thị Mỹ Duyên',
            'cccd' => '023456789011',
        ];

        $checkEdit = editUser($data, $user_id);

        $this->assertEquals('Cập nhật thông tin thành công', $checkEdit);
    }

    public function testFailAddress(): void
    {
        $user_id = 29;
        $data = [
            'address' => '23',
            'email' => 'duyen@gmail.com',
            'tel' => '0774565149',
            'date' => '2001-06-18',
            'name' => 'Lương Thị Mỹ Duyên',
            'cccd' => '012345678901',
        ];

        $checkEdit = editUser($data, $user_id);

        $this->assertEquals('Nhập sai địa chỉ', $checkEdit);
    }

    public function testFailEmail(): void
    {
        $user_id = 29;
        $data = [
            'address' => '23 Phạm Như Xương',
            'email' => 'duyen@gmail.com',
            'tel' => '0774565149',
            'date' => '2001-06-18',
            'name' => 'Lương Thị Mỹ Duyên',
            'cccd' => '123459678901',
        ];

        $checkEdit = editUser($data, $user_id);

        $this->assertEquals('Nhập sai email', $checkEdit);
    }

    public function testFailPhone(): void
    {
        $user_id = 29;
        $data = [
            'address' => '23 Phạm Như Xương',
            'email' => 'duyen@gmail.com',
            'tel' => '077456514912',
            'date' => '2001-06-18',
            'name' => 'Lương Thị Mỹ Duyên',
            'cccd' => '12345678901',
        ];

        $checkEdit = editUser($data, $user_id);

        $this->assertEquals('Nhập sai số điện thoại', $checkEdit);
    }

    public function testFailDate(): void
    {
        $user_id = 29;
        $data = [
            'address' => '23 Phạm Như Xương',
            'email' => 'duyen@gmail.com',
            'tel' => '0774565149',
            'date' => '2024-06-18',
            'name' => 'Lương Thị Mỹ Duyên',
            'cccd' => '123455678901',
        ];

        $checkEdit = editUser($data, $user_id);

        $this->assertEquals('Nhập sai ngày', $checkEdit);
    }

    public function testFailName(): void
    {
        $user_id = 29;
        $data = [
            'address' => '23 Phạm Như Xương',
            'email' => 'duyen@gmail.com',
            'tel' => '0774565149',
            'date' => '2001-06-18',
            'name' => '123 123 123',
            'cccd' => '123456678901',
        ];

        $checkEdit = editUser($data, $user_id);

        $this->assertEquals('Nhập sai tên', $checkEdit);
    }

    public function testFailCccd(): void
    {
        $user_id = 29;
        $data = [
            'address' => '23 Phạm Như Xương',
            'email' => 'duyen@gmail.com',
            'tel' => '0774565149',
            'date' => '2001-06-18',
            'name' => 'Lương Thị Mỹ Duyên',
            'cccd' => '12345678901123',
        ];

        $checkEdit = editUser($data, $user_id);

        $this->assertEquals('Nhập sai CMND/CCCD', $checkEdit);
    }
}