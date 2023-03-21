<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\Site;

class SiteComponent implements CRUDComponent
{
    // Manage actions in crud
    public $create = true;
    public $delete = false;
    public $update = true;

    // If you will set it true it will automatically
    // add `user_id` to create and update action
    public $with_user_id = true;

    public function getModel()
    {
        return Site::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return [
            'discount_text',
            'discount',
            'delivery_charges',
            'tax_charges',
            'currency_multiplier',
            'iban',
            'address',
            'phone',
            'email',
            'instagram',
            'facebook'
        ];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return [
            'discount_text',
            'discount',
            'delivery_charges',
            'tax_charges',
            'currency_multiplier',
            'iban',
            'address',
            'phone',
            'email',
            'instagram',
            'facebook'
        ];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        return [
            'discount_text' => 'text',
            'discount' => 'number',
            'delivery_charges' => 'number',
            'tax_charges' => 'number',
            'currency_multiplier' => 'number',
            'iban' => 'text',
            'address' => 'text',
            'phone' => 'text',
            'email' => 'email',
            'instagram' => 'text',
            'facebook' => 'text'
        ];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [
            'discount_text' => 'required',
            'discount' => 'required',
            'delivery_charges' => 'required',
            'tax_charges' => 'required',
            'currency_multiplier' => 'required',
            'iban' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'instagram' => 'required',
            'facebook' => 'required'
        ];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [];
    }
}
