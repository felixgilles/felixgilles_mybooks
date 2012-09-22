<?php
/**
 * MyBooks  - A books management application for Novius OS
 *
 * @copyright  2012 Gilles FELIX
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 */

namespace Gif;

class Controller_Admin_Import extends \Nos\Controller_Admin_Application
{
    public function action_index()
    {
        \DB::query('TRUNCATE `mybooks_book`')->execute();
        \DB::query('TRUNCATE `mybooks_author`')->execute();
        \DB::query('TRUNCATE `mybooks_author_book`')->execute();
        \DB::query('TRUNCATE `mybooks_tag`')->execute();
        \DB::query('TRUNCATE `mybooks_tag_book`')->execute();
        \DB::query('TRUNCATE `nos_wysiwyg`')->execute();
        $items = \DB::query('SELECT * FROM `items`')->as_object()->execute();
        foreach ($items as $item) {
            $book = new Model_Book();

            if (!empty($item->authors)) {
                $authors = explode(', ', $item->authors);
                for ($i = 0; $i < count($authors); $i = $i + 2) {
                    if (isset($authors[$i + 1])) {
                        $name = $authors[$i + 1].' '.$authors[$i];
                    } else {
                        $name = $authors[$i];
                    }
                    $author = Model_Author::find('first', array('where' => array('author_name' => $name)));
                    if (empty($author)) {
                        $author = new Model_Author();
                        $author->author_name = $name;
                        $author->save();
                        $book->authors[] = $author;
                    } else {
                        $book->authors[$author->author_id] = $author;
                    }
                }
            }

            if (!empty($item->tags)) {
                $tags = explode(', ', $item->tags);
                foreach ($tags as $tag_label) {
                    $tag = Model_Tag::find('first', array('where' => array('tag_label' => $tag_label)));
                    if (empty($tag)) {
                        $tag = new Model_Tag();
                        $tag->tag_label = $tag_label;
                        $tag->save();
                        $book->tags[] = $tag;
                    } else {
                        $book->tags[$tag->tag_id] = $tag;
                    }
                }
            }

            $book->book_title = $item->title;
            $book->book_isbn = empty($item->isbn) ? null : $item->isbn;
            $book->book_read = !!$item->read_col;
            if (!empty($item->publication)) {
                $publication = explode('/', $item->publication);
                if (count($publication) === 3) {
                    $book->book_publication = $publication[2].'-'.$publication[1].'-'.$publication[0];
                } else {
                    $publication = explode('-', $item->publication);
                    if (count($publication) === 1) {
                        $book->book_publication = $publication[0].'-01-01';
                    } else {
                        $book->book_publication = $item->publication;
                    }
                }
            }
            $book->book_publisher = empty($item->publisher) ? null : $item->publisher;
            $book->book_page = empty($item->pages) ? null : $item->pages;
            $book->book_link = empty($item->web) ? null : $item->web;
            $book->book_acquisition = empty($item->acquisition) ? null : $item->acquisition;
            $book->book_rating = empty($item->rating) ? null : $item->rating / 2;
            $book->book_created_at = empty($item->added) ? (empty($item->acquisition) ? '2010-01-01' : $item->acquisition) : $item->added;
            $book->book_updated_at = $book->book_created_at;
            $book->wysiwygs->description = empty($item->description) ? null : nl2br($item->description);
            $book->wysiwygs->comments = empty($item->comments) ? null : nl2br($item->comments);
            //book_img

            $book->save();
        }

        return '';
    }
}
