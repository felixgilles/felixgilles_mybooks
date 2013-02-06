<?php
/**
 * MyBooks  - A books management application for Novius OS
 *
 * @copyright  2012 Gilles FELIX
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 */

return array(
    'name'    => 'MyBooks : A books management application',
    'version' => '0.2',
    'provider' => array(
        'name' => 'Gilles FELIX',
    ),
    'namespace' => 'Gif',
    'permission' => array(
    ),
    //'i18n_file' => 'noviusos_blognews::metadata',
    'icons' => array(
        16 => 'static/apps/felixgilles_mybooks/img/16/book.png',
        32 => 'static/apps/felixgilles_mybooks/img/32/book.png',
        64 => 'static/apps/felixgilles_mybooks/img/64/book.png',
    ),

    'launchers' => array(
        'mybooks' => array(
            'name'    => 'My Books',
            'action' => array(
                'action' => 'nosTabs',
                'tab' => array(
                    'url' => 'admin/felixgilles_mybooks/appdesk',
                ),
            ),
        ),
    ),
);

