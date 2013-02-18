<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */
?>
<script type="text/javascript">
    require(
        [
            'jquery-nos',
            'wijmo.wijrating'
        ],
        function($) {
            $(function() {
                var $select = $('#<?= $id ?>'),
                    $options = $select.find('option');
                $select<?= !empty($wrapper) ? '.wrap('.\Format::forge()->to_json($wrapper).')' : '' ?>.wijrating($.extend({
                    rated: function(e, data) {
                        $options.removeAttr('selected')
                        $options.filter('[value="' + data.value + '"]').attr('selected', 'selected');
                    },
                    reset: function(e, data) {
                        $options.removeAttr('selected')
                    }
                }, $select.data('rating-options')));
            });
        });
</script>
