<?php


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UsersGetRequestTest extends TestCase
{

    protected static $db_inited = false;

    protected static function initDB()
    {
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }
    protected function setUp(): void
    {
        parent::setUp();

        if (!static::$db_inited) {
            static::$db_inited = true;
            static::initDB();
        }
    }

    public function test_that_users_work(): void
    {
        $response = $this->getJson('/api/users');
        $response->assertStatus(200);
    }

    public function test_that_users_rules_for_name_work(): void
    {
        $response = $this->getJson('/api/users?name=alex');
        $response->assertStatus(200);
    }

    public function test_that_users_rules_for_valid_personality_work(): void
    {
        $response = $this->getJson('/api/users?personality[melancholic]=10');
        $response->assertStatus(200);
    }

    public function test_that_users_rules_for_more_valid_personality_work(): void
    {
        $response = $this->getJson('/api/users?personality[melancholic]=10&personality[choleric]=11');
        $response->assertStatus(200);
    }

    public function test_that_users_rules_for_invalid_personality_work(): void
    {
        $response = $this->getJson('/api/users?personality[melancholic]=101');
        $response->assertStatus(422);
    }

    public function test_that_users_rules_for_invalid_personality_type_work(): void
    {
        $response = $this->getJson('/api/users?personality[xxx]=10');
        $response->assertStatus(422);
    }
}
