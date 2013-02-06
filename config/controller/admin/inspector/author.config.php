<?php

return array(
    'model' => 'Gif\Model_Author',
    'query' => array(
        'order_by' => 'author_name',
    ),
    'input' => array(
        'key'   => 'author_id',
    ),
    'appdesk' => array(
        'label' => __('Authors'),
    ),
    'data_mapping' => array(
        'name'=> array(
            'title' => __('Authors')
        )
    ),
);
