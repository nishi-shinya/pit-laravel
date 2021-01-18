<?php

namespace Tests\Request;

use Illuminate\Support\Facades\Validator;
use Tests\TestCase;
use App\Http\Requests\UserCreateRequest;

class RegisterControllerTest extends TestCase
{

    /**
     * @param $name
     * @param $email
     * @param $password
     * @param $expect
     * @dataProvider dataproviderUser
     */
    public function test_ユーザー情報を登録する。($name, $email, $password, $expect)
    {
        $dataList = [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];

        $request = new UserCreateRequest();

        $rules = $request->rules();

        $validator = Validator::make($dataList, $rules);

        $result = $validator->passes();

        $this->assertEquals($expect, $result);
    }

    /**
     * @return array[]
     */
    public function dataproviderUser ()
    {
        return [
            '名前が半角英数字ではない' => [
                'name' => 'テスト',
                'email' => 'example@example.com',
                'password' => 'password01',
                'expect' => false
            ],
            'メールアドレスが正しくない' => [
                'name' => 'test',
                'email' => 'example.com',
                'password' => 'password01',
                'expect' => false
            ],
            'パスワードが半角英数字ではない' => [
                'name' => 'test',
                'email' => 'example.com',
                'password' => 'パスワード',
                'expect' => false
            ],
            '正常' => [
                'name' => 'test01',
                'email' => 'example@example.com',
                'password' => 'password01',
                'expect' => true
            ]
        ];
    }
}
