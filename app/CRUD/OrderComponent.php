<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\Order;

class OrderComponent implements CRUDComponent
{
    // Manage actions in crud
    // public $create = true;
    public $delete = true;
    // public $update = true;

    // If you will set it true it will automatically
    // add `user_id` to create and update action
    public $with_user_id = true;

    public function getModel()
    {
        return Order::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return [
            'user_id',
            'status.name' => Field::title('Status'),
            'sub_total',
            'total',
            'discount',
            'tax',
            'delivery_charges',
            'payment_method',
            'payment_id',
            'shipping_method',
            'shipping_eta',
            'tracking_id'
        ];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return [
            'payment_method',
            'shipping_method'
        ];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        return [];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [];
    }
}
