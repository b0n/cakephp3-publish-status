<?php
namespace PublishStatus\Model\Behavior;

use PublishStatus\Exception\MissingColumnException;
use Cake\ORM\Behavior;
use Cake\ORM\Query;
use Cake\ORM\Table;
use http\Exception\BadMethodCallException;

/**
 * PublishStatus behavior
 */
class PublishStatusBehavior extends Behavior
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * フィールド名
     */
    const STATUS_FIELD = 'status';

    /**
     * 公開
     */
    const STATUS_PUBLISHED_VALUE = 1;
    const STATUS_PUBLISHED_LABEL = '公開';

    /**
     * 下書き
     */
    const STATUS_DRAFT_VALUE = 2;
    const STATUS_DRAFT_LABEL = '下書き';

    /**
     * お知らせの公開ステータス
     * @var array
     */
    public static $status_options = [
        self::STATUS_PUBLISHED_VALUE => self::STATUS_PUBLISHED_LABEL,
        self::STATUS_DRAFT_VALUE=> self::STATUS_DRAFT_LABEL,
    ];

    /**
     * Get the configured deletion field
     *
     * @return string
     * @throws \SoftDelete\Error\MissingFieldException
     */
    public function ensurePublishStatusFieldExists()
    {
        $callable = [$this->getTable(), 'getPublishStatusField'];
        if (!is_callable($callable)) {
            throw new BadMethodCallException();
        }

        $field = call_user_func($callable);

        if ($this->getTable()->getSchema()->getColumn($field) === null) {
            throw new MissingColumnException(
                __('Configured field `{0}` is missing from the table `{1}`.',
                    $field,
                    $this->getTable()->getAlias()
                )
            );
        }

        return $field;
    }

    /**
     * 公開しているお知らせを取得します
     *
     * @param Query $query
     * @param array $options
     * @return Query
     */
    public function findPublished(Query $query, array $options)
    {
        $field = $this->ensurePublishStatusFieldExists();
        $query
            ->where([$this->getTable()->aliasField($field) => self::STATUS_PUBLISHED_VALUE]);

        return $query;
    }

    /**
     * 下書きのお知らせを取得します
     *
     * @param Query $query
     * @param array $options
     * @return Query
     */
    public function findDraft(Query $query, array $options)
    {
        $field = $this->ensurePublishStatusFieldExists();
        $query
            ->where([$this->getTable()->aliasField($field) => self::STATUS_DRAFT_VALUE]);

        return $query;
    }

}
