<?php

namespace Tests\Unit;

use App\Models\User;
use App\Repositories\UserRepository;

// TODO なぜ変更する必要があるのか？
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $user_repository = new UserRepository();
        $user = $user_repository->get();

        
        // objectかどうかチェック
        $this->assertIsObject($user[0]);
        
        // Userのインスタンスかチェック
        $this->assertTrue($user[0] instanceof User);

        // 会員情報にID, 氏名, 登録日時, 更新日時が含まれているかチェック
        $user_array = $user[0]->toArray();
        $this->assertSame([
            'id',
            'name',
            'created_at',
            'updated_at'
        ], array_keys($user_array));
    }
}
