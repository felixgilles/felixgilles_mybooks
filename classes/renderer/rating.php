<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

namespace Gif;

class Renderer_Rating extends \Fieldset_Field
{
    protected static $DEFAULT_RENDERER_OPTIONS = array(
        'rating' => array(
            'count' => 5,
            'iconHeight' => 16,
            'iconWidth' => 16,
            'max' => null,
            'min' => null,
            'split' => 1,
            'totalValue' => 5,
            'value' => 0,
        ),
        'wrapper' => '',
    );

    protected $renderer_options = array();

    /**
     * Standalone build of the media renderer.
     *
     * @param  array  $renderer Renderer definition (attributes + renderer_options)
     * @return string The <input> tag + JavaScript to initialise it
     */
    public static function renderer($renderer = array())
    {
        list($attributes, $renderer_options) = static::parse_options($renderer);
        $attributes['data-rating-options'] = htmlspecialchars(\Format::forge()->to_json($renderer_options['rating']));

        return '<select '.array_to_attr($attributes).' />'.static::js_init($attributes['id'], $renderer_options);
    }

    public function __construct($name, $label = '', array $renderer = array(), array $rules = array(), \Fuel\Core\Fieldset $fieldset = null)
    {
        list($attributes, $this->renderer_options) = static::parse_options($renderer);
        parent::__construct($name, $label, $attributes, $rules, $fieldset);
    }

    /**
     * How to display the field
     * @return type
     */
    public function build()
    {
        parent::build();
        $this->fieldset()->append(static::js_init($this->get_attribute('id'), $this->renderer_options));
        $rating_options = $this->renderer_options['rating'];
        $this->set_attribute('data-rating-options', htmlspecialchars(\Format::forge()->to_json($rating_options)));

        return (string) parent::build();
    }

    /**
     * Parse the renderer array to get attributes and the renderer options
     * @param  array $renderer
     * @return array 0: attributes, 1: renderer options
     */
    protected static function parse_options($renderer = array())
    {
        $renderer['type'] = 'select';
        $renderer['class'] = (isset($renderer['class']) ? $renderer['class'] : '').' rating notransform';

        if (empty($renderer['id'])) {
            $renderer['id'] = uniqid('rating_');
        }

        if (empty($renderer['size'])) {
            $renderer['size'] = 9;
        }

        // Default options of the renderer
        $renderer_options = static::$DEFAULT_RENDERER_OPTIONS;

        if (!empty($renderer['renderer_options'])) {
            $renderer_options = \Arr::merge($renderer_options, $renderer['renderer_options']);
        }
        unset($renderer['renderer_options']);

        $renderer['options'] = array();
        for ($i = 1; $i <= $renderer_options['rating']['count']; $i++) {
            $renderer['options'][$i] = $i;
        }

        return array($renderer, $renderer_options);
    }

    /**
     * Generates the JavaScript to initialise the renderer
     *
     * @param   string  HTML ID attribute of the <input> tag
     * @return string JavaScript to execute to initialise the renderer
     */
    protected static function js_init($id, $renderer_options = array())
    {
        return \View::forge('renderer/rating', array(
                'id' => $id,
                'wrapper' => \Arr::get($renderer_options, 'wrapper', ''),
            ), false);
    }
}
