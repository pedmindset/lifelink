<?php

namespace Laravel\Nova\Tests\Feature;

use Laravel\Nova\Nova;
use Laravel\Nova\Tests\IntegrationTestCase;

class AuthorizationTest extends IntegrationTestCase
{
    public function test_authorization_callback_is_executed()
    {
        Nova::auth(function ($request) {
            return $request;
        });

        $this->assertEquals('Taylor', Nova::check('Taylor'));
    }
}
