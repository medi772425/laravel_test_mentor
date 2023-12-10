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
        // Given
        // factoryで保存処理
        $expected = $this->factory();
        // テスト対象のclassのinstanceを生成
        $user_repository = new UserRepository();

        // When
        $actual = $user_repository->findAll();

        // Then
        // 件数確認
        $this->assertSame($expected->count(), $actual->count());

        // factoryで保存した内容と一致するか確認
        foreach($actual as $index => $actual_user) {
            // userモデルの各プロパティの値が期待値と同値であるか、検証
            $this->assertEquals($expected[$index]->id, $actual_user->id);
            $this->assertEquals($expected[$index]->name, $actual_user->name);
            $this->assertEquals($expected[$index]->email, $actual_user->email);
            $this->assertEquals($expected[$index]->email_verified_at, $actual_user->email_verified_at);
            $this->assertEquals($expected[$index]->password, $actual_user->password);
            $this->assertEquals($expected[$index]->remember_token, $actual_user->remember_token);
        }
    }
}
