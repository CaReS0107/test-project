<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Concerns\WithHelper;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase, WithHelper;
}
