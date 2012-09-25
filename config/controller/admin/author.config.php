<?php
return array (
    'controller_url'  => 'admin/felixgilles_mybooks/author',
    'model' => 'Gif\\Model_Author',
    'messages' => array(
        'successfully added' => __('Author successfully added.'),
        'successfully saved' => __('Author successfully saved.'),
        'successfully deleted' => __('The author has successfully been deleted!'),
        'you are about to delete, confim' => __('You are about to delete the author <span style="font-weight: bold;">":title"</span>. Are you sure you want to continue?'),
        'item deleted' => __('This author has been deleted.'),
        'not found' => __('Author not found'),
    ),
    'tab' => array(
        'iconUrl' => 'static/apps/felixgilles_mybooks/img/16/book.png',
        'labels' => array(
            'insert' => __('Add a author'),
        ),
    ),
    'layout' => array(
        'title' => 'author_name',
        'large' => false,
        'save' => 'save',
    ),
    'fields' => array(
        'author_name' => array (
            'label' => __('Name'),
            'form' => array(
                'type' => 'text',
            ),
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
