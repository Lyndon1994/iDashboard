<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $authorizerAppId = Cache::get('authorizer_appid');
        var_dump($authorizerAppId);
        $authorizerRefreshToken = Cache::get('authorizer_refresh_token');
        var_dump($authorizerRefreshToken);
    }
}
