<?php

return array(
    'model' => 'Gif\Model_Author',
    'query' => array(
        'order_by' => 'author_name',
    ),
    'input' => array(
        'key'   => 'authors.author_id',
    ),
    'appdesk' => array(
        'label' => __('Authors'),
    ),
);
