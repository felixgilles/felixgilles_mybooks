<?php
/**
 * MyBooks  - A books management application for Novius OS
 *
 * @copyright  2012 Gilles FELIX
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 */

namespace Gif\MyBooks;

class Model_Book extends \Nos\Orm\Model
{
    protected static $_table_name = 'mybooks_book';
    protected static $_primary_key = array('book_id');

    protected static $_many_many = array(
        'tags' => array(
            'table_through' => 'mybooks_tag_book',
            'key_from' => 'book_id',
            'key_through_from' => 'book_id',
            'key_through_to' => 'tag_id',
            'key_to' => 'tag_id',
            'cascade_save' => true,
            'cascade_delete' => false,
            'model_to'       => 'Gif\MyBooks\Model_Tag',
        ),
        'authors' => array(
            'table_through' => 'mybooks_author_book',
            'key_from' => 'book_id',
            'key_through_from' => 'book_id',
            'key_through_to' => 'author_id',
            'key_to' => 'author_id',
            'cascade_save' => true,
            'cascade_delete' => false,
            'model_to'       => 'Gif\MyBooks\Model_Author',
        ),
    );

    protected static $_observers = array(
        'Orm\\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => true,
            'property' => 'book_created_at',
        ),
        'Orm\\Observer_UpdatedAt' => array(
            'events' => array('before_save'),
            'mysql_timestamp' => true,
            'property' => 'book_updated_at',
        ),
    );
}
