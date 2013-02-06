<?php
/**
 * MyBooks  - A books management application for Novius OS
 *
 * @copyright  2012 Gilles FELIX
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 */

return array(
    'data_mapping' => array(
        'title' => array(
            'title' => __('Title'),
        ),
        'read' => array(
            'title' => __('Readed'),
        ),
        'book_rating' => array(
            'title' => __('Rate'),
        ),
        'thumbnail' => array(
            'value' => function ($item) {
                foreach ($item->medias as $media) {
                    return $media->get_public_path_resized(64, 64);
                }
                return false;
            },
        ),
        'thumbnailAlternate' => array(
            'value' => function ($item) {
                return 'static/novius-os/admin/vendor/jquery/jquery-ui-input-file-thumb/css/images/apn.png';
            }
        ),
    ),
    'i18n' => array(
    ),
    'thumbnails' => true,
    'actions' => array(
        'Gif\Model_Book.import' => array(
            'label' => __('Import books'),
            'targets' => array(
                'toolbar-grid' => true,
            ),
            'action' => array(
                'action' => 'window.open',
                'url' => 'admin/felixgilles_mybooks/import',
            ),
        ),
    ),
);
