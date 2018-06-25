<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SpeakerTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SpeakerTypesTable Test Case
 */
class SpeakerTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SpeakerTypesTable
     */
    public $SpeakerTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.speaker_types',
        'app.speakers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SpeakerTypes') ? [] : ['className' => SpeakerTypesTable::class];
        $this->SpeakerTypes = TableRegistry::getTableLocator()->get('SpeakerTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SpeakerTypes);

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
