<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\Product;
use App\Models\Sub;

class ProductComponent implements CRUDComponent
{
    // Manage actions in crud
    public $create = true;
    public $delete = true;
    public $update = true;

    // If you will set it true it will automatically
    // add `user_id` to create and update action
    public $with_user_id = true;

    private function sub_categories()
    {
        $sub_categories = ['0' => 'Select'];

        foreach (Sub::all() as $category)
        {
            $sub_categories[$category->id] = $category->name;
        }

        return $sub_categories;
    }

    public function getModel()
    {
        return Product::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return [
            'sub.name' => Field::title('Sub Category'),
            'name',
            'description',
            'unit_price',
            'discount',
            'quantity'
        ];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return [
            'name',
            'description'
        ];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        return [
            'sub_id' => ['select' => $this->sub_categories()],
            'name' => 'text',
            'description' => 'text',
            'unit_price' => 'number',
            'discount' => 'number',
            'quantity' => 'number'
        ];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [
            'sub_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'unit_price' => 'required',
            'discount' => 'required',
            'quantity' => 'required'
        ];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [];
    }
}
