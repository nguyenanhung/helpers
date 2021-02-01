<?php
/**
 * Project helpers.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 2018-12-27
 * Time: 23:03
 */
if (!function_exists('form_label')) {
    /**
     * Creates a label for an input
     *
     * @param string $text       The label text
     * @param string $fieldName  Name of the input element
     * @param array  $attributes HTML attributes
     *
     * @return string
     */
    function form_label($text, $fieldName = NULL, array $attributes = array())
    {
        return nguyenanhung\Classes\Helper\Form::label($text, $fieldName, $attributes);
    }
}
if (!function_exists('form_text')) {
    /**
     * Creates a text field
     *
     * @param string $name
     * @param string $value
     * @param array  $attributes HTML attributes
     *
     * @return string
     */
    function form_text($name, $value = NULL, array $attributes = array())
    {
        return nguyenanhung\Classes\Helper\Form::text($name, $value, $attributes);
    }
}
if (!function_exists('form_password')) {
    /**
     * Creates a password input field
     *
     *
     *
     * @param string $name
     * @param string $value
     * @param array  $attributes HTML attributes
     *
     * @return string
     */
    function form_password($name, $value = NULL, array $attributes = array())
    {
        return nguyenanhung\Classes\Helper\Form::password($name, $value, $attributes);
    }
}
if (!function_exists('form_hidden')) {
    /**
     * Creates a hidden input field
     *
     *
     *
     * @param string $name
     * @param string $value
     * @param array  $attributes
     *
     * @return string
     */
    function form_hidden($name, $value, array $attributes = array())
    {
        return nguyenanhung\Classes\Helper\Form::hidden($name, $value, $attributes);
    }
}
if (!function_exists('form_textArea')) {
    /**
     * Creates a textarea
     *
     * @param string $name
     * @param string $text
     * @param array  $attributes HTML attributes
     *
     * @return string
     */
    function form_textArea($name, $text = NULL, array $attributes = array())
    {
        return nguyenanhung\Classes\Helper\Form::textArea($name, $text, $attributes);
    }
}
if (!function_exists('form_checkBox')) {
    /**
     * Creates a check box.
     * By default creates a hidden field with the value of 0, so that the field is present in $_POST even when not checked
     *
     * @param string      $name
     * @param bool        $checked
     * @param mixed       $value           Checked value
     * @param array       $attributes      HTML attributes
     * @param bool|string $withHiddenField Pass false to omit the hidden field or "array" to return both parts as an array
     *
     * @return string|array
     */
    function form_checkBox($name, $checked = FALSE, $value = 1, array $attributes = array(), $withHiddenField = TRUE)
    {
        return nguyenanhung\Classes\Helper\Form::checkBox($name, $checked, $value, $attributes, $withHiddenField);
    }
}
if (!function_exists('form_collectionCheckBoxes')) {
    /**
     * Creates multiple checkboxes for a has-many association.
     *
     * @param string             $name
     * @param array              $collection
     * @param array|\Traversable $checked Collection of checked values
     * @param array              $labelAttributes
     * @param bool               $returnAsArray
     *
     * @throws \InvalidArgumentException
     * @return string|array
     */
    function form_collectionCheckBoxes($name, array $collection, $checked, array $labelAttributes = array(), $returnAsArray = FALSE)
    {
        return nguyenanhung\Classes\Helper\Form::collectionCheckBoxes($name, $collection, $checked, $labelAttributes, $returnAsArray);
    }
}
if (!function_exists('form_radio')) {
    /**
     * Creates a radio button
     *
     *
     *
     * @param string $name
     * @param string $value
     * @param bool   $checked
     * @param array  $attributes
     *
     * @return string
     */
    function form_radio($name, $value, $checked = FALSE, array $attributes = array())
    {
        return nguyenanhung\Classes\Helper\Form::radio($name, $value, $checked, $attributes);
    }
}
if (!function_exists('form_collectionRadios')) {
    /**
     * Creates multiple radio buttons with labels
     *
     *
     *
     * @param string $name
     * @param array  $collection
     * @param mixed  $checked Checked value
     * @param array  $labelAttributes
     * @param bool   $returnAsArray
     *
     * @return array|string
     */
    function form_collectionRadios($name, array $collection, $checked, array $labelAttributes = array(), $returnAsArray = FALSE)
    {
        return nguyenanhung\Classes\Helper\Form::collectionRadios($name, $collection, $checked, $labelAttributes, $returnAsArray);
    }
}
if (!function_exists('form_select')) {
    /**
     * Creates a select tag
     * <code>
     * // Simple select
     * select('coffee_id', array('b' => 'black', 'w' => 'white'));
     *
     * // With option groups
     * select('beverage', array(
     *     'Coffee' => array('bc' => 'black', 'wc' => 'white'),
     *     'Tea' => array('gt' => 'Green', 'bt' => 'Black'),
     * ));
     * </code>
     *
     * @param string $name       Name of the attribute
     * @param array  $collection An associative array used for the option values
     * @param mixed  $selected   Selected option Can be array or scalar
     * @param array  $attributes HTML attributes
     *
     * @return string
     */
    function form_select($name, array $collection, $selected = NULL, array $attributes = array())
    {
        return nguyenanhung\Classes\Helper\Form::select($name, $collection, $selected, $attributes);
    }
}
if (!function_exists('form_option')) {
    /**
     * Creates an option tag
     *
     * @param string $value
     * @param string $label
     * @param array  $selected
     *
     * @return string
     */
    function form_option($value, $label, $selected)
    {
        return nguyenanhung\Classes\Helper\Form::option($value, $label, $selected);
    }
}
if (!function_exists('form_file')) {
    /**
     * Creates a file input field
     *
     *
     *
     * @param string $name
     * @param array  $attributes HTML attributes
     *
     * @return string
     */
    function form_file($name, array $attributes = array())
    {
        return nguyenanhung\Classes\Helper\Form::file($name, $attributes);
    }
}
if (!function_exists('form_button')) {
    /**
     * Function button
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-27 23:02
     *
     * @param       $name
     * @param       $text
     * @param array $attributes
     *
     * @return string
     */
    function form_button($name, $text, array $attributes = array())
    {
        return nguyenanhung\Classes\Helper\Form::button($name, $text, $attributes);
    }
}
if (!function_exists('form_autoId')) {
    /**
     * Generate an ID given the name of an input
     *
     *
     *
     * @param string $name
     *
     * @return string|null
     */
    function form_autoId($name)
    {
        return nguyenanhung\Classes\Helper\Form::autoId($name);
    }
}
