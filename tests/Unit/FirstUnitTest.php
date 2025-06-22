<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Article;

class FirstUnitTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {

        $num = 4;
        $result = Article::isEvent(2);
        $this->assertEquals(true, $result);
    }


}
