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
    'model' => 'Gif\\MyBooks\\Model_Book',
    'layout' => array(
        'title' => 'book_title',
        'medias' => array('medias->cover->medil_media_id'),
        'large' => true,
        'subtitle' => array('book_read', 'book_rating', 'book_to_read'),
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
                                'wysiwygs->description->wysiwyg_text',
                                'wysiwygs->comments->wysiwyg_text',
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
                                'authors',
                                'book_publisher',
                                'book_isbn',
                                'book_publication',
                                'book_page',
                                'book_link',
                                'book_acquisition',
                                'tags',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'save' => 'save',
    ),
    'fields' => array(
        'medias->cover->medil_media_id' => array(
            'label' => '',
            'renderer' => 'Nos\Renderer_Media',
            'form' => array(
                'title' => __('Cover'),
            ),
        ),
        'book_title' => array (
            'label' => __('Title'),
            'form' => array(
                'type' => 'text',
            ),
            'validation' => array(
                'required',
                'min_length' => array(2),
            ),
        ),
        'wysiwygs->description->wysiwyg_text' => array(
            'label' => __('Description'),
            'renderer' => 'Nos\Renderer_Wysiwyg',
            'form' => array(
                'style' => 'width: 100%; height: 250px;',
            ),
        ),
        'wysiwygs->comments->wysiwyg_text' => array(
            'label' => __('Comments'),
            'renderer' => 'Nos\Renderer_Wysiwyg',
            'form' => array(
                'style' => 'width: 100%; height: 250px;',
            ),
        ),
        'book_read' => array(
            'label' => __('Read'),
            'form' => array(
                'type' => 'checkbox',
                'value' => 1,
                'empty' => 0,
            ),
        ),
        'book_rating' => array(
            'label' => __('Ratting'),
            'renderer' => 'Gif\MyBooks\Renderer_Rating',
            'renderer_options' => array(
                'rating' => array(
                    'count' => 5,
                    'totalValue' => 5,
                ),
            ),
        ),
        'book_to_read' => array(
            'label' => __('To read'),
            'renderer' => 'Gif\MyBooks\Renderer_Rating',
            'renderer_options' => array(
                'rating' => array(
                    'count' => 3,
                    'totalValue' => 3,
                ),
            ),
        ),
        'book_isbn' => array (
            'label' => __('ISBN'),
            'form' => array(
                'type' => 'text',
            ),
        ),
        'book_publication' => array (
            'label' => __('Publication'),
            'renderer' => 'Nos\Renderer_Date_Picker',
        ),
        'book_publisher' => array (
            'label' => __('Publisher'),
            'form' => array(
                'type' => 'text',
            ),
        ),
        'book_page' => array (
            'label' => __('Pages'),
            'form' => array(
                'type' => 'text',
            ),
            'validation' => array(
                'valid_string' => array('numeric'),
            ),
        ),
        'book_link' => array (
            'label' => __('Link'),
            'form' => array(
                'type' => 'text',
            ),
            'validation' => array(
                'valid_url',
            ),
        ),
        'book_acquisition' => array (
            'label' => __('Acquisition'),
            'renderer' => 'Nos\Renderer_Date_Picker',
        ),
        'authors' => array(
            'label' => __('Authors'),
            'renderer' => 'Nos\Renderer_Tag',
            'renderer_options' => array(
                'model'         => 'Gif\\MyBooks\\Model_Author',
                'label_column'  => 'author_name',
                'relation_name' => 'authors'
            ),
        ),
        'tags' => array(
            'label' => __('Tags'),
            'renderer' => 'Nos\Renderer_Tag',
            'renderer_options' => array(
                'model'         => 'Gif\\MyBooks\\Model_Tag',
                'label_column'  => 'tag_label',
                'relation_name' => 'tags'
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
