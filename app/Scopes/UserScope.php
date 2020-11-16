<?php
    namespace App\Scopes;
    use Illuminate\Database\Eloquent\Scope;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Support\Facades\Auth;

    class UserScope implements Scope
    {
        /**
         * 自分自身に限定するスコープ
         * @param  \Illuminate\Database\Eloquent\Builder  $builder
         * @param  \Illuminate\Database\Eloquent\Model  $model
         * @return void
         */
        public function apply(Builder $builder, Model $model)
        {
            return $builder->where($model->getTable() . '.user_id', '=', Auth::user()->id);
        }
    }
