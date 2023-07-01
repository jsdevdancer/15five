<?php
namespace ACFMenuChooserField;

use acf_field;
//phpcs:disable PSR1.Classes.ClassDeclaration.MultipleClasses
//phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps

// === Advanced Custom Fields: Menu Chooser Field ===
// Contributors: shah-sa
// Tags: ACF, Field, Menu
// Requires at least: 3.5
// Tested up to: 3.8.1
// Stable tag: trunk
// License: GPLv2 or later
// License URI: http://www.gnu.org/licenses/gpl-2.0.html

class MenuChooser extends acf_field
{
    /*
     *  __construct
     *
     *  This function will setup the field type data
     *
     *  @type	function
     *  @date	5/03/2014
     *  @since	5.0.0
     *
     *  @param	n/a
     *  @return	n/a
     */

    function __construct()
    {
        /*
         *  name (string) Single word, no spaces. Underscores allowed
         */

        $this->name = 'menu-chooser';

        /*
         *  label (string) Multiple words, can include spaces, visible when selecting a field type
         */

        $this->label = __('Menu Chooser', 'acf-menu-chooser');

        /*
         *  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
         */

        $this->category = 'choice';

        /*
         *  defaults (array) Array of default settings which are merged into the field object. These are used later in settings
         */

        $this->defaults = [];

        /*
         *  l10n (array) Array of strings that are used in JavaScript. This allows JS strings to be translated in PHP and loaded via:
         *  var message = acf._e('menu-chooser', 'error');
         */

        $this->l10n = [
            'error' => __('Error! Please enter a higher value', 'acf-menu-chooser'),
        ];

        // do not delete!
        parent::__construct();
    }

    private function render_field_settings($field)
    {
        //Noting
    }

    public function render_field($field)
    {
        $field_value = $field['value'];

        $field['choices'] = [];
        $menus = wp_get_nav_menus();

        echo '<select name="' . $field['name'] . '" class="acf-menu-chooser">';

        if (!empty($menus)) {
            foreach ($menus as $choice) {
                $field['choices'][$choice->menu_id] = $choice->term_id;
                $field['choices'][$choice->name] = $choice->name;

                echo '<option  value="' .
                    $field['choices'][$choice->menu_id] .
                    '" ' .
                    selected($field_value, $field['choices'][$choice->menu_id], false) .
                    ' >' .
                    $field['choices'][$choice->name] .
                    '</option>';
            }
        }
        echo '</select>';
    }
}

// create field
new MenuChooser();
