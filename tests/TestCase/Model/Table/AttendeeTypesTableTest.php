<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AttendeeTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AttendeeTypesTable Test Case
 */
class AttendeeTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AttendeeTypesTable
     */
    public $AttendeeTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.attendee_types',
        'app.attendees'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AttendeeTypes') ? [] : ['className' => AttendeeTypesTable::class];
        $this->AttendeeTypes = TableRegistry::getTableLocator()->get('AttendeeTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AttendeeTypes);

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
}
