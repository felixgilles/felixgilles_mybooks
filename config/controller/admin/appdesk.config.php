<?php
/**
 * MyBooks  - A books management application for Novius OS
 *
 * @copyright  2012 Gilles FELIX
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 */
use Nos\I18n;

I18n::load('felixgilles_mybooks::item');

return array(
    'model' => 'Gif\MyBooks\Model_Book',
    'toolbar' => array(
        'models' => array('Gif\MyBooks\Model_Book', 'Gif\MyBooks\Model_Author')
    ),
    'query' => array(
        'model' => 'Gif\MyBooks\Model_Book',
        'related' => array('linked_medias'),
        'order_by' => array('book_title' => 'ASC'),
        'limit' => 20,
    ),
    'search_text' => 'book_title',
    'thumbnails' => true,
    'inspectors' => array('date', 'author', 'tag'),

    //'hideLocales' => true,
);
