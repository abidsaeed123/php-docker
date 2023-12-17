<?php

// it' not for demonstrating testing, it just demonstarte how we can automate running
// the tests when we go and complete a pull request this repo

class LanguageTest extends \PHPUnit\Framework\TestCase
{
    public function testItWorks(): void
    {
         $this->assertEquals(1, 1);
    }
}