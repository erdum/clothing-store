<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\Sub;
use App\Models\Category;

class SubComponent implements CRUDComponent
{
    // Manage actions in crud
    public $create = true;
    public $delete = true;
    public $update = true;

    // If you will set it true it will automatically
    // add `user_id` to create and update action
    public $with_user_id = true;

    private function categories()
    {
        $categories = ['0' => 'Select'];

        foreach (Category::all() as $category)
        {
            $categories[$category->id] = $category->name;
        }

        return $categories;
    }

    public function getModel()
    {
        return Sub::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return [
            'category.name' => Field::title('Category'),
            'name',
            'extra_text',
            'cover_image' => Field::title('Image')
                ->asImage()
        ];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return [
            'name'
        ];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        return [
            'category_id' => ['select' => $this->categories()],
            'name' => 'text',
            'extra_text' => 'text',
            'cover_image' => 'file'
        ];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [
            'category_id' => 'required',
            'name' => 'required',
            'extra_text' => 'required',
            'cover_image' => 'required'
        ];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [
            'cover_image' => 'photos/sub-categories-images'
        ];
    }
}
