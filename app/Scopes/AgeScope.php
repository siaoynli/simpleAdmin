<?php
namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
namespace App\Models;
use App\Scopes\AgeScope;
use Illuminate\Database\Eloquent\Model;
class Admin extends Model{
protected static function boot()
{
    parent::boot();
    static::addGlobalScope(new AgeScope);
}
}*/

/**
 * 全局作用域
 * @package App\Scopes
 */
class AgeScope implements Scope {
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        return $builder->where('age', '>', 200);
    }
}
