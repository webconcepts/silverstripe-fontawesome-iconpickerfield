<?php

namespace Thisisbd\FontAwesomeIconPickerField;

use SilverStripe\Forms\TextField;
use SilverStripe\View\Requirements;

/**
 * Allows user to pick a Font Awesome Icon
 *
 * @author  Darren-Lee Joseph <darrenleejoseph@gmail.com>
 * @package  silverstripe-fontawesome-iconpickerfield
 */
class FontAwesomeIconPickerField extends TextField {

    public function Field($properties = array()) {
        $this->addExtraClass('form-control icp icp-auto');

        Requirements::css("//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css");
        Requirements::css('thisisbd/silverstripe-fontawesome-iconpickerfield: assets/thirdparty/fontawesome-iconpicker-1.0.0/dist/css/fontawesome-iconpicker.min.css');

        Requirements::set_force_js_to_bottom(true);
        Requirements::javascript('thisisbd/silverstripe-fontawesome-iconpickerfield: assets/thirdparty/fontawesome-iconpicker-1.0.0/dist/js/fontawesome-iconpicker.js');
        Requirements::javascript('thisisbd/silverstripe-fontawesome-iconpickerfield: assets/thirdparty/jsyaml/dist/js-yaml.min.js');
        Requirements::javascript('thisisbd/silverstripe-fontawesome-iconpickerfield: assets/setup-icon-picker.js');

        return parent::Field($properties);
    }

    /**
     * Override the type to get the proper class name on the field
     * "text" is needed here to render the form field as a normal text-field
     * @see FormField::Type()
     */
    public function Type(){
        return 'text';
    }

    /**
     * Ensure the value is a valid Font Awesome value beginning with 'fa-'
     * @see FormField::validate()
     */
    public function validate($validator)
    {
        if(!empty ($this->value) && !preg_match('/^fa-[a-z]+/', $this->value))
        {
            $validator->validationError(
                $this->name,
                _t('FontAwesomeIconPickerField.VALIDFONT', 'Please enter a valid Font Awesome font name format.'),
                'validation',
                false
            );
            return false;
        }
        return true;
    }



}
