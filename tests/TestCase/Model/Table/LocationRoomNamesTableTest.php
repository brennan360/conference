<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LocationRoomNamesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LocationRoomNamesTable Test Case
 */
class LocationRoomNamesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LocationRoomNamesTable
     */
    public $LocationRoomNames;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.location_room_names',
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
        $config = TableRegistry::getTableLocator()->exists('LocationRoomNames') ? [] : ['className' => LocationRoomNamesTable::class];
        $this->LocationRoomNames = TableRegistry::getTableLocator()->get('LocationRoomNames', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LocationRoomNames);

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
