<?php
namespace CaT\Plugins\{{PLUGINNAME}};

use PHPUnit\Framework\TestCase;

/**
 * Sample PHP-Unit test.
 */
class Test extends TestCase
{
	/**
	 * Only useful to setup database connections or similar stuff.
	 * Will run once before all tests.
	 */
	public function setUpBeforClass()
	{
	}

	/**
	 * Set up your test objects here.
	 * Will run before each test.
	 */
	public function setUp()
	{
	}

	/**
	 * Only usefull for closing sockets or files created in setUp().
	 * Will run after ech test.
	 */
	public function tearDown()
	{
	}

	/**
	 * Usefull for closing database conections setup in setUpBeforeClass().
	 * Will run once after the last test.
	 */
	public function tearDownAfterClass()
	{
	}
}