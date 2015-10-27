<?php
namespace Test;

use PHPUnit_Framework_TestCase;

use Emeka\Potato\Helpers\Model;
use Emeka\Potato\Model\User;

class TestFind extends PHPUnit_Framework_TestCase
{

    public function test_find_accepts_id()
    {
        $user = new User;
        $user->find(4);
        $this->assertTrue(true);
    }

    public function test_find_return_array()
    {
        $user = new User;
        $user->find(4);
        $this->assertInternalType('object', $user->find(4));
    }

}