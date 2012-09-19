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
    'query' => array(
        'model' => 'Gif\Model_Book',
        'order_by' => array('book_title' => 'ASC'),
        'limit' => 20,
    ),
    'search_text' => 'book_title',
    'selectedView' => 'default',
    'views' => array(
        'default' => array(
            'name' => __('Default view'),
        ),
    ),
    'dataset' => array(
        'id' => 'book_id',
        'title' => 'book_title',
    ),
    'i18n' => array(
        'addDropDown' => __('Select an action'),
        'columns' => __('Columns'),
        'showFiltersColumns' => __('Filters column header'),
        'visibility' => __('Visibility'),
        'settings' => __('Settings'),
        'vertical' => __('Vertical'),
        'horizontal' => __('Horizontal'),
        'hidden' => __('Hidden'),
        'item' => __('book'),
        'items' => __('books'),
        'showNbItems' => __('Showing {{x}} books out of {{y}}'),
        'showOneItem' => __('Show 1 book'),
        'showNoItem' => __('No book'),
        'showAll' => __('Show all books'),
        'views' => __('Views'),
        'viewGrid' => __('Grid'),
        'viewTreeGrid' => __('Tree grid'),
        'viewThumbnails' => __('Thumbnails'),
        'preview' => __('Preview'),
        'loading' => __('Loading...'),
        'languages' => __('Languages'),
    ),
    'inputs' => array(
        'startdate' => function($value, $query) {
            list($begin, $end) = explode('|', $value.'|');
            if ($begin) {
                if ($begin = Date::create_from_string($begin, '%Y-%m-%d')) {
                    $query->where(array('evt_date_begin', '>=', $begin->format('mysql')));
                }
            }
            if ($end) {
                if ($end = Date::create_from_string($end, '%Y-%m-%d')) {
                    $query->where(array('evt_date_begin', '<=', $end->format('mysql')));
                }
            }

            return $query;
        },
        'tag_id' => function($value, $query) {

            if ( is_array($value) && count($value) && $value[0]) {
                $query->related('tags', array(
                    'where' => array(
                        array('tags.tag_id', 'in', $value),
                    ),
                ));
            }

            return $query;
        },
        'author_id' => function($value, $query) {

            if ( is_array($value) && count($value) && $value[0]) {
                $query->related('authors', array(
                    'where' => array(
                        array('authors.author_id', 'in', $value),
                    ),
                ));
            }

            return $query;
        },
    ),
    'appdesk' => array(
        'tab' => array(
            'label' => __('Book'),
            'iconUrl' => 'static/apps/felixgilles_mybooks/img/32/book.png'
        ),
        'actions' => array(
            'update' => array(
                'action' => array(
                    'action' => 'nosTabs',
                    'tab' => array(
                        'url' => "admin/felixgilles_mybooks/book/insert_update/{{id}}",
                        'label' => __('Edit'),
                    ),
                ),
                'label' => __('Edit'),
                'primary' => true,
                'icon' => 'pencil'
            ),
            'delete' => array(
                'action' => array(
                    'action' => 'confirmationDialog',
                    'dialog' => array(
                        'contentUrl' => 'admin/felixgilles_mybooks/book/delete/{{id}}',
                        'title' => __('Delete a book'),
                    ),
                ),
                'label' => __('Delete'),
                'primary' => true,
                'icon' => 'trash'
            ),
        ),
        'reloadEvent' => 'Gif\\Model_Book',
        'appdesk' => array(
            'buttons' => array(
                'book' => array(
                    'label' => __('Add a book'),
                    'action' => array(
                        'action' => 'nosTabs',
                        'method' => 'add',
                        'tab' => array(
                            'url' => 'admin/felixgilles_mybooks/book/insert_update?lang={{lang}}',
                            'label' => __('Add a new book'),
                        ),
                    ),
                ),
            ),
            'splittersVertical' => 250,
            'grid' => array(
                'urlJson' => 'admin/felixgilles_mybooks/appdesk/json',
                'columns' => array(
                    'title' => array(
                        'headerText' => __('Title'),
                        'dataKey' => 'title'
                    ),
                    'actions' => array(
                        'actions' => array('update', 'delete'),
                    ),
                ),
            ),
            'inspectors' => array(
                'startdate' => array(
                    'vertical' => true,
                    'label' => __('Created date'),
                    'url' => 'admin/noviusos_blognews/inspector/date/list',
                    'inputName' => 'startdate'
                ),
                'tags' => array(
                    'reloadEvent' => 'Gif\\Model_Tag',
                    'label' => __('Tags'),
                    'url' => 'admin/felixgilles_mybooks/inspector/tag/list',
                    'grid' => array(
                        'urlJson' => 'admin/felixgilles_mybooks/inspector/tag/json',
                        'columns' => array(
                            'title' => array(
                                'headerText' => __('Tag'),
                                'dataKey' => 'title'
                            ),
                            'actions' => array(
                                'actions' => array(
                                    array(
                                        'name' => 'delete',
                                        'action' => array(
                                            'action' => 'confirmationDialog',
                                            'dialog' => array(
                                                'contentUrl' => 'admin/felixgilles_mybooks/tag/delete/{{id}}',
                                                'title' => __('Delete a tag')
                                            ),
                                        ),
                                        'label' => __('Delete'),
                                        'primary' => true,
                                        'icon' => 'trash'
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'inputName' => 'tag_id[]',
                    'vertical' => true
                ),
                'authors' => array(
                    'reloadEvent' => 'Gif\\Model_Author',
                    'label' => __('Tags'),
                    'url' => 'admin/felixgilles_mybooks/inspector/author/list',
                    'grid' => array(
                        'urlJson' => 'admin/felixgilles_mybooks/inspector/author/json',
                        'columns' => array(
                            'title' => array(
                                'headerText' => __('Author'),
                                'dataKey' => 'name'
                            ),
                            'actions' => array(
                                'actions' => array(
                                    array(
                                        'name' => 'delete',
                                        'action' => array(
                                            'action' => 'confirmationDialog',
                                            'dialog' => array(
                                                'contentUrl' => 'admin/felixgilles_mybooks/author/delete/{{id}}',
                                                'title' => __('Delete an author')
                                            ),
                                        ),
                                        'label' => __('Delete'),
                                        'primary' => true,
                                        'icon' => 'trash'
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'inputName' => 'author_id[]',
                    'vertical' => true
                ),
                'preview' => array(
                    'vertical' => true,
                    'reloadEvent' => 'Gif\\Model_Book',
                    'label' => __('Preview'),
                    'preview' => true,
                    'options' => array(
                        'meta' => array(
                            'title' => array(
                                'label' => __('Title'),
                            ),
                        ),
                        'actions' => array('edit', 'delete'),
                        'actionThumbnail' => 'edit',
                    ),
                ),
            ),
        ),
    ),
);
