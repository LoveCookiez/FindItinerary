<?php

require "vendor/autoload.php";

class AppTest extends PHPUnit_Framework_TestCase
{
  public function setUp() {}
  public function tearDown() { }

  public function testTrue()
  {
    $this->assertTrue(true);
  }
}