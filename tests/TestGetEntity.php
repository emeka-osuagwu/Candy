<?php

namespace Test;

use PDO;
use Mockery;
use Emeka\Candy\Model\GetEntity;
use PHPUnit_Framework_TestCase;

class TestGetEntity extends PHPUnit_Framework_TestCase
{

	public function testGetEntity()
	{
	    $dbConnMocked 	= Mockery::mock('PDO');
	    $statement 		= Mockery::mock('\PDOStatement');

	    $dbConnMocked->shouldReceive('prepare')->with('SELECT * FROM users')->andReturn($statement);
	    $dbConnMocked->shouldReceive('prepare')->with('SELECT * FROM jobs')->andReturn(false);
	    $statement->shouldReceive('execute');
	    $statement->shouldReceive('fetchAll')->with(PDO::FETCH_ASSOC);

	    $this->assertJson(GetEntity::all('users', $dbConnMocked));	    
	}

	
}