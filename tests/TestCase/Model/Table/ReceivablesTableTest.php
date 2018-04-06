<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReceivablesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReceivablesTable Test Case
 */
class ReceivablesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReceivablesTable
     */
    public $Receivables;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.receivables'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Receivables') ? [] : ['className' => ReceivablesTable::class];
        $this->Receivables = TableRegistry::get('Receivables', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Receivables);

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
