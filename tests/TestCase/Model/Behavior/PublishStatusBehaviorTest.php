<?php
namespace PublishStatus\Test\TestCase\Model\Behavior;

use Cake\TestSuite\TestCase;
use Cake\Utility\Hash;
use PublishStatus\Test\Fixture\NewsFixture;
use PublishStatus\Test\Fixture\PublishStatusBehaviorsFixture;
use PublishStatus\Test\Fixture\PublishStatusBehaviorsTable;

/**
 * PublishStatus\Model\Behavior\PublishStatusBehavior Test Case
 * @property PublishStatusBehaviorTable $table
 */
class PublishStatusBehaviorTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \PublishStatus\Test\Fixture\NewsTable
     */
    public $table;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.PublishStatus.News',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = ['className' => 'PublishStatus\Test\Fixture\NewsTable'];
        $this->table = $this->getTableLocator()->get('News', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        parent::tearDown();
        $this->getTableLocator()->clear();
    }

    /**
     * When a configured field is missing from the table, an exception should be thrown
     *
     * @expectedException \PublishStatus\Exception\MissingColumnException
     */
    public function testMissingColumn()
    {
        $this->table->setPublishStatusField('foo');
        $this->table->find('published');
    }

    /**
     * Test findPublished method
     *
     * @return void
     */
    public function testFindPublished()
    {
        $query = $this->table->find('published');

        $expected = array(1);
        $actual = Hash::extract($query->toArray(), '{n}.id');
        $this->assertEquals($expected, $actual);
    }

    /**
     * Test findDraft method
     *
     * @return void
     */
    public function testFindDraft()
    {
        $query = $this->table->find('draft');

        $expected = array(2);
        $actual = Hash::extract($query->toArray(), '{n}.id');
        $this->assertEquals($expected, $actual);
    }

}
