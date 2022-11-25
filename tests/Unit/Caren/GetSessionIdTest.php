<?php

namespace Tests\Unit\Caren;

use Tests\TestCase;
use App\Apis\Caren\Api;

class GetSessionIdTest extends TestCase
{

    /**
     * @test
     * @group unit
     * @group api
     * @group api-caren
     * @group api-caren-session
     * @group external
     *
     * @return void
     */
    public function getSessionIdTest()
    {
        $api = new Api;
        $sessionId = $api->getSessionIdFromCaren();
        $this->assertTrue(is_string($sessionId));
    }
}
