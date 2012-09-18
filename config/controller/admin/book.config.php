<?php
/**
 * MyBooks  - A books management application for Novius OS
 *
 * @copyright  2012 Gilles FELIX
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 */

return array(
    'controller_url'  => 'admin/felixgilles_mybooks/book',
    'model' => 'Gif\\Model_Book',
    'messages' => array(
        'successfully added' => __('Book successfully added.'),
        'successfully saved' => __('Book successfully saved.'),
        'successfully deleted' => __('The book has successfully been deleted!'),
        'you are about to delete, confim' => __('You are about to delete the book <span style="font-weight: bold;">":title"</span>. Are you sure you want to continue?'),
        'item deleted' => __('This book has been deleted.'),
        'not found' => __('Book not found'),
        'delete an item' => __('Delete a book'),
    ),
    'tab' => array(
        'iconUrl' => 'static/apps/felixgilles_mybooks/img/16/book.png',
        'labels' => array(
            'insert' => __('Add a book'),
        ),
    ),
    'layout' => array(
        'title' => 'book_title',
        'medias' => array('medias->thumbnail->medil_media_id'),
        'large' => true,
        'subtitle' => array('book_species_id'),
        'content' => array(
            'expander' => array(
                'view' => 'nos::form/expander',
                'params' => array(
                    'title'   => __('content'),
                    'options' => array(
                        'allowExpand' => false,
                    ),
                    'content' => array(
                        'view' => 'nos::form/fields',
                        'params' => array(
                            'fields' => array(
                                'book_summary',
                                'wysiwygs->content->wysiwyg_text',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'menu' => array(
            'expander' => array(
                'view' => 'nos::form/expander',
                'params' => array(
                    'title'   => __('Meta'),
                    'options' => array(
                        'allowExpand' => false,
                    ),
                    'content' => array(
                        'view' => 'nos::form/fields',
                        'params' => array(
                            'fields' => array(
                                'book_virtual_name',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'save' => 'save',
    ),
    'fields' => array(
        'medias->thumbnail->medil_media_id' => array(
            'label' => '',
            'widget' => 'Nos\Widget_Media',
            'form' => array(
                'title' => 'Thumbnail',
            ),
        ),
        'book_title' => array (
            'label' => __('Name'),
            'form' => array(
                'type' => 'text',
            ),
            'validation' => array(
                'required',
                'min_length' => array(2),
            ),
        ),
        'book_summary' => array (
            'label' => __('Summary'),
            'form' => array(
                'type' => 'textarea',
                'rows' => '6',
            ),
        ),
        'wysiwygs->content->wysiwyg_text' => array(
            'label' => __('Content'),
            'widget' => 'Nos\Widget_Wysiwyg',
            'form' => array(
                'style' => 'width: 100%; height: 500px;',
            ),
        ),
        'book_species_id' => array(
            'label' => 'Species: ',
            'form' => array(
                'type' => 'select',
            ),
        ),
        'book_virtual_name' => array(
            'label' => __('URL: '),
            'widget' => 'Nos\Widget_Virtualname',
            'validation' => array(
                'required',
                'min_length' => array(2),
            ),
        ),
        'save' => array(
            'label' => '',
            'form' => array(
                'type' => 'submit',
                'tag' => 'button',
                'value' => __('Save'),
                'class' => 'primary',
                'data-icon' => 'check',
            ),
        ),
    ),
);
