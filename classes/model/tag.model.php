<?php
namespace Gif\MyBooks;

class Model_Tag extends \Nos\Orm\Model
{
    protected static $_table_name = 'mybooks_tag';
    protected static $_primary_key = array('tag_id');

    protected static $_many_many = array(
        'books' => array(
            'table_through' => 'mybooks_tag_book',
            'key_from' => 'tag_id',
            'key_through_from' => 'tag_id',
            'key_through_to' => 'book_id',
            'key_to' => 'book_id',
            'cascade_save' => true,
            'cascade_delete' => false,
            'model_to'       => 'Gif\MyBooks\Model_Book',
        ),
    );
}
