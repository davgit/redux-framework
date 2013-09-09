<?php
/**
 * Redux Framework is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Redux Framework is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Redux Framework. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package     ReduxFramework
 * @subpackage  Field_Info
 * @author      Daniel J Griffiths (Ghost1227)
 * @author      Dovy Paukstys
 * @version     3.0.0
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

// Don't duplicate me!
if( !class_exists( 'ReduxFramework_repeatable' ) ) {

    /**
     * Main ReduxFramework_info class
     *
     * @since       1.0.0
     */
    class ReduxFramework_repeatable extends ReduxFramework {
    
        /**
         * Field Constructor.
         *
         * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
         *
         * @since       1.0.0
         * @access      public
         * @return      void
         */
        public function __construct( $field = array(), $value ='', $parent ) {
        
            parent::__construct( $parent->sections, $parent->args, $parent->extra_tabs );

            $this->field = $field;
            $this->value = $value;
            $this->parent = $parent;
        
        }

        /**
         * Field Render Function.
         *
         * Takes the vars and outputs the HTML for the field in the settings
         *
         * @since       1.0.0
         * @access      public
         * @return      void
         */
        public function render() {
        	print_r($this->value);
        	echo "yo";
        	$fields = array(
			array(
				'id'=>'test1',
				'type' => 'button_set',
				'title' => __('Button Set Option', 'redux-framework'), 
				'subtitle' => __('No validation can be done on this field type', 'redux-framework'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework'),
				'options' => array('1' => 'Opt 1','2' => 'Opt 2','3' => 'Opt 3'),//Must provide key => value pairs for radio options
				'default' => '2'
				),
			array(
				'id'=>'test2',
				'type' => 'button_set',
				'title' => __('Button Set Option', 'redux-framework'), 
				'subtitle' => __('No validation can be done on this field type', 'redux-framework'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework'),
				'options' => array('1' => 'Opt 1','2' => 'Opt 2','3' => 'Opt 3'),//Must provide key => value pairs for radio options
				'default' => '2'
				),			
			array(
				'id'=>'select-post-type',
				'type' => 'select',
				'data' => 'post_type',
				'title' => __('Post Type Select Option', 'redux-framework'), 
				'subtitle' => __('No validation can be done on this field type', 'redux-framework'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework'),
				),							
        		);
        	echo '<div class="repeater" style="background: #eee; padding: 20px;">';
        
        	foreach ($fields as $field) {
        		$id = $field['id'];
        		if (empty($this->value[$field['id']])) {
        			$this->value[$field['id']] = "";
        		}
        		$field['id'] = $this->field['id'].']['.$field['id'];
        		$field['class'] = "";
        		echo $this->value[$id];
        		$this->parent->_field_input($field, $this->value[$id]);
        	}        	
        	echo '</div>';
        
        }
    }
}
?>