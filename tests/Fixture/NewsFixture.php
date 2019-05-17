<?php
namespace PublishStatus\Test\Fixture;

use Cake\ORM\Table;
use Cake\TestSuite\Fixture\TestFixture;
use PublishStatus\Model\Behavior\PublishStatusBehavior;
use PublishStatus\Model\Entity\PublishStatusInterface;

/**
 * Class NewsTable
 * @package PublishStatus\Test\Fixture
 * @mixin PublishStatusInterface
 * @mixin PublishStatusBehavior
 */
class NewsTable extends Table implements PublishStatusInterface
{
    protected $_statusField = 'status';

    public function initialize(array $config)
    {
        $this->addBehavior('PublishStatus.PublishStatus');
    }

    public function setPublishStatusField($field)
    {
        $this->_statusField = $field;
    }

    public function getPublishStatusField()
    {
        return $this->_statusField;
    }

    public function getPublishValue()
    {
        return PublishStatusBehavior::STATUS_PUBLISHED_VALUE;
    }

    public function getDraftValue()
    {
        return PublishStatusBehavior::STATUS_DRAFT_VALUE;
    }

}

/**
 * NewsFixture
 *
 */
class NewsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '管理ID', 'autoIncrement' => true, 'precision' => null],
        'status' => ['type' => 'integer', 'length' => 1, 'unsigned' => true, 'null' => false, 'default' => '1', 'comment' => '表示ステータス', 'precision' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'status' => 1,
            ],
            [
                'id' => 2,
                'status' => 2,
            ],
            [
                'id' => 3,
                'status' => 3,
            ],
        ];
        parent::init();
    }
}
