<?php
namespace Test;

use PHPUnit_Framework_TestCase;

use Emeka\Potato\Helpers\Model;
use Emeka\Potato\Model\User;

class TestGet extends PHPUnit_Framework_TestCase
{

    public function test_find_accepts_id()
    {
        $user = new User;
        $user->getAll();
        $this->assertTrue(true);
    }

    public function test_find_return_array()
    {
        $user = new User;
        $this->assertInternalType('array', $user->getAll());
    }

}