<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\Image;
use App\Models\Product;

class ImageComponent implements CRUDComponent
{
    // Manage actions in crud
    public $create = true;
    public $delete = true;
    public $update = true;

    // If you will set it true it will automatically
    // add `user_id` to create and update action
    public $with_user_id = true;

    private function products()
    {
        $products = ['0' => 'Select'];

        foreach (Product::all() as $product)
        {
            $products[$product->id] = $product->name;
        }

        return $products;
    }

    public function getModel()
    {
        return Image::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return [
            'product.name',
            'ulr' => Field::title('Image')
                ->asImage()
        ];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return [
            'product.name'
        ];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        return [
            'product_id' => ['select' => $this->products()],
            'url' => 'file'
        ];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [
            'product_id' => 'required',
            'url' => 'required'
        ];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [
            'url' => 'photos/products'
        ];
    }
}
