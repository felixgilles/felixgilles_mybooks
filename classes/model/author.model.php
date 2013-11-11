<?php
namespace Gif\MyBooks;

class Model_Author extends \Nos\Orm\Model
{
    protected static $_table_name = 'mybooks_author';
    protected static $_primary_key = array('author_id');

    protected static $_many_many = array(
        'books' => array(
            'table_through' => 'mybooks_author_book',
            'key_from' => 'author_id',
            'key_through_from' => 'author_id',
            'key_through_to' => 'book_id',
            'key_to' => 'book_id',
            'cascade_save' => true,
            'cascade_delete' => false,
            'model_to'       => 'Gif\MyBooks\Model_Book',
        ),
    );
}
