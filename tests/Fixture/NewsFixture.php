<?php
namespace PublishStatus\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

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
        'title' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'タイトル', 'precision' => null, 'fixed' => null],
        'body' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '本文', 'precision' => null],
        'url' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'URL', 'precision' => null, 'fixed' => null],
        'kind' => ['type' => 'integer', 'length' => 1, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => 'お知らせ区分', 'precision' => null, 'autoIncrement' => null],
        'status' => ['type' => 'integer', 'length' => 1, 'unsigned' => true, 'null' => false, 'default' => '1', 'comment' => '表示ステータス', 'precision' => null, 'autoIncrement' => null],
        'datkb' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '伝票削除区分', 'precision' => null, 'autoIncrement' => null],
        'opeid' => ['type' => 'string', 'length' => 8, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '最終作業者コード', 'precision' => null, 'fixed' => null],
        'version' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => 'トランザクション番号', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
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
                'title' => 'テスト記事１',
                'body' => "テスト\nです\n１です",
                'url' => '',
                'kind' => 1,
                'status' => 1,
                'datkb' => 1,
                'opeid' => '000001',
                'version' => 1,
                'created' => '2019-04-01 00:00:00',
                'modified' => '2019-04-01 00:00:00'
            ],
            [
                'id' => 2,
                'title' => 'テスト記事２',
                'body' => "テスト\nです\n２です",
                'url' => 'http://www.yahoo.co.jp',
                'kind' => 1,
                'status' => 1,
                'datkb' => 1,
                'opeid' => '000001',
                'version' => 1,
                'created' => '2019-04-01 00:00:00',
                'modified' => '2019-04-01 00:00:00'
            ],
            [
                'id' => 3,
                'title' => 'テスト記事３',
                'body' => "テスト\nです\n３です",
                'url' => 'abc',
                'kind' => 1,
                'status' => 1,
                'datkb' => 1,
                'opeid' => '000001',
                'version' => 1,
                'created' => '2019-04-01 00:00:00',
                'modified' => '2019-04-01 00:00:00',
            ],
            [
                'id' => 4,
                'title' => 'テスト記事４',
                'body' => "テスト\nです\n４です",
                'url' => 'abcd',
                'kind' => 1,
                'status' => 1,
                'datkb' => 9,
                'opeid' => '000001',
                'version' => 1,
                'created' => '2019-04-01 00:00:00',
                'modified' => '2019-04-01 00:00:00',
            ],
            [
                'id' => 5,
                'title' => 'テスト記事５（重要なお知らせです）',
                'body' => "重要な\nお知らせ\nです",
                'url' => 'http://www.apple.co.jp',
                'kind' => 2,
                'status' => 1,
                'datkb' => 1,
                'opeid' => '000001',
                'version' => 1,
                'created' => '2019-04-01 00:00:00',
                'modified' => '2019-04-01 00:00:00',
            ],
            [
                'id' => 6,
                'title' => 'テスト記事（下書き）',
                'body' => "下書き\nです",
                'url' => '',
                'kind' => 1,
                'status' => 2,
                'datkb' => 1,
                'opeid' => '000001',
                'version' => 1,
                'created' => '2019-04-01 00:00:00',
                'modified' => '2019-04-01 00:00:00'
            ],
        ];
        parent::init();
    }
}
