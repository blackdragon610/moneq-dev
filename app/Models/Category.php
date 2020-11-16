<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;



class Category extends ModelClass
{
    use SoftDeletes;

    protected $hidden = [
    ];

    public function getSelectAll() : array
    {
        $Category = clone $this;

        $categoriesDb = $Category->get();

        foreach ($categoriesDb as $key => $category){
            $categories[$category->id]["name"] = $category->category_name;

            foreach ($category->subCategories as $subCategory){
                $categories[$category->id]["groups"][$subCategory->id] = $subCategory->sub_name;
            }
        }

        return $categories;
    }
    public function subCategories()
    {
        return $this->hasMany(app("SubCategory"), "parent_slash", "slash");
    }
}
