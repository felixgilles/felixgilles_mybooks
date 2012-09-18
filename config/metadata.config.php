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
    'version' => '0.1',
    'icon16' => 'static/apps/felixgilles_mybooks/img/16/book.png',
    'icon64' => 'static/apps/felixgilles_mybooks/img/64/book.png',
    'provider' => array(
        'name' => 'Gilles FELIX',
    ),
    'namespace' => 'Gif',
    'permission' => array(),
    'launchers' => array(
        'provider_launcher' => array(
            'name'    => 'My Books',
            'url' => 'admin/felixgilles_mybooks/appdesk',
            'iconUrl' => 'static/apps/felixgilles_mybooks/img/32/book.png',
            'icon64'  => 'static/apps/felixgilles_mybooks/img/64/book.png',
        ),
    ),
);

