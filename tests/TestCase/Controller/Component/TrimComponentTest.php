<?php

namespace Trim\Test\TestCase\Controller\Component;

use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;
use Trim\Controller\Component\TrimComponent;

class TrimComponentTest extends TestCase {

    /**
     * @var \Trim\Controller\Component\TrimComponent
     */
    public $Trim;

    /**
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Trim = new TrimComponent($registry);
    }

    /**
     * @return void
     */
    public function tearDown() {
        unset($this->Trim);
        parent::tearDown();
    }

    /**
     * @return void
     */
    public function testInitialization() {
        $this->markTestIncomplete('Not implemented yet.');
    }

}
