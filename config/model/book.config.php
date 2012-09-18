<?php
/**
 * MyBooks  - A books management application for Novius OS
 *
 * @copyright  2012 Gilles FELIX
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 */
return array(
    'behaviours'   => array(
        'Nos\Orm_Behaviour_Sharable' => array(
            'data' => array(
                \Nos\DataCatcher::TYPE_TITLE => array(
                    'value' => 'book_title',
                    'useTitle' => __('Use book title'),
                ),
                \Nos\DataCatcher::TYPE_TEXT => array(
                    'value' => function($book) {
                        return $book->book_description;
                    },
                    'useTitle' => __('Use book description'),
                ),
                \Nos\DataCatcher::TYPE_IMAGE => array(
                    'value' => function($book) {
                        $possible = $book->possible_medias();

                        return Arr::get(array_keys($possible), 0, null);
                    },
                    'options' => function($book) {
                        return $book->possible_medias();
                    },
                ),
            ),
        ),
    ),
);
