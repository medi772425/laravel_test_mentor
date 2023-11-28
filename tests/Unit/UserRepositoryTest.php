<?php

namespace Tests\Unit;

use App\Models\User;
use App\Repositories\UserRepository;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    // 各テスト毎にDBをリフレッシュする
    use RefreshDatabase;

    private function factory()
    {
        // 新規にUserを作成する
        $create_user = User::factory(5)->create();

        return $create_user;
    }

    /**
    * @test
    */
    public function 全件取得(): void
    {
        // factoryで保存処理
        $user_create = $this->factory();

        $user_repository = new UserRepository();
        $user_ret = $user_repository->findAll();

        // 件数確認
        $this->assertSame($user_create->count(), $user_ret->count());
    }
}
