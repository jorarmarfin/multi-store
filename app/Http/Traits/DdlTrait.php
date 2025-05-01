<?php

namespace App\Http\Traits;

use App\Models\Category;
use App\Models\Unit;

trait DdlTrait
{
    public function ddlCategories()
    {
        return $this->getDdl(Category::class);
    }
    public function ddlUnits()
    {
        return $this->getDdl(Unit::class);
    }
    public function getDdl($model, $key = 'id', $value = 'code')
    {
        return $model::query()->pluck($value, $key);
    }

    public function getDdlWithCondition($model, $condition, $key = 'id', $value = 'name')
    {
        return $model::query()->where($condition)->pluck($value, $key);
    }

}
