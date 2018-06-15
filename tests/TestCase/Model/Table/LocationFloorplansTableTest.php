<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LocationFloorplansTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LocationFloorplansTable Test Case
 */
class LocationFloorplansTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LocationFloorplansTable
     */
    public $LocationFloorplans;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.location_floorplans',
        'app.locations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('LocationFloorplans') ? [] : ['className' => LocationFloorplansTable::class];
        $this->LocationFloorplans = TableRegistry::getTableLocator()->get('LocationFloorplans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LocationFloorplans);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
