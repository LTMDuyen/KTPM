<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

include './Model/index.php';

final class AddQuestionTest extends TestCase
{
    public function testAddSuccess(): void
    {
        $user_id = 2;
        $question = 'Ho, sổ mũi có phải covid';

        $checkAdd = addQuestion($question, $user_id);

        $this->assertEquals('Đặt câu hỏi thành công', $checkAdd);
    }

    public function testAddFail(): void
    {
        $user_id = 2;
        $question = '';

        $checkAdd = addQuestion($question, $user_id);

        $this->assertEquals('Vui lòng nhập câu hỏi', $checkAdd);
    }
}