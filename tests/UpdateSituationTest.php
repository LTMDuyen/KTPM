<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

include './Model/index.php';

final class UpdateSituationTest extends TestCase
{
    public function testUpdateSuccess(): void
    {
        $user_id = 2;
        $situation = 'Sốt cao';
        $consolution = '';

        $checkUpdate = updateSituation($situation, $consolution, $user_id);

        $this->assertEquals('Cập nhật thành công', $checkUpdate);
    }

    public function testSituationEmpty(): void
    {
        $user_id = 2;
        $situation = '';
        $consolution = '';

        $checkUpdate = updateSituation($situation, $consolution, $user_id);

        $this->assertEquals('Cập nhật không thành công', $checkUpdate);
    }

    public function testIdEmpty(): void
    {
        $user_id = '';
        $situation = '';
        $consolution = '';

        $checkUpdate = updateSituation($situation, $consolution, $user_id);

        $this->assertEquals('Không tìm thấy hồ sơ bệnh nhân', $checkUpdate);
    }

    public function testIdFail(): void
    {
        $user_id = '12345tdsfv';
        $situation = '';
        $consolution = '';

        $checkUpdate = updateSituation($situation, $consolution, $user_id);

        $this->assertEquals('Không tìm thấy hồ sơ bệnh nhân', $checkUpdate);
    }
}