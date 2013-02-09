<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

\Nos\I18n::current_dictionary(array('noviusos_blognews::common'));

return array(
    'input' => array(
        'key' => 'book_publication',
    ),
    'appdesk' => array(
        'label'     => __('Publication'),
    ),
    'options'               => array('custom', 'since', 'year'),
    'since'                 => array(
        'options'   => array(
            '-6 month'          => __('Less than six months'),
            '-1 year'           => __('Less than one year'),
            '-2 year'           => __('Less than one year'),
            '-3 year'           => __('Less than one year'),
            '-5 year'           => __('Less than one year'),
            '-10 year'           => __('Less than one year'),
        ),
    ),
    'year'                  => array(
        'limit'         => 10,
    ),
);