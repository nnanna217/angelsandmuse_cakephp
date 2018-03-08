<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CouponsUsedTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CouponsUsedTable Test Case
 */
class CouponsUsedTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CouponsUsedTable
     */
    public $CouponsUsed;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.coupons_used',
        'app.users',
        'app.coupons'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CouponsUsed') ? [] : ['className' => CouponsUsedTable::class];
        $this->CouponsUsed = TableRegistry::get('CouponsUsed', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CouponsUsed);

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
