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
    public function findAll関数実行時、データベースのUserレコードが全て取得できること(): void
    {
        // factoryで保存処理
        $user_create = $this->factory();

        $user_repository = new UserRepository();
        $user_ret = $user_repository->findAll();

        // 件数確認
        $this->assertSame($user_create->count(), $user_ret->count());

        // factoryで保存した内容と一致するか確認
        foreach($user_create as $user_create_i => $user_create_model) {
            $this->assertEquals($user_create_model->name, $user_ret[$user_create_i]->name);
        }
    }
}
