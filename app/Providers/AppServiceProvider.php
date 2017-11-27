<?php

namespace App\Providers;
use Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Validator;
use App\Group;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // $results= DB::table('total_produce_per_group')->get();

        //     View::share('results',$results);

            $group= DB::table('groups')->get();
            View::share('group',$group);
    //following variables are accessible to all views within the application
          View::composer('*', function($view){

            $view->with('user',Auth::user());
            $view->with('produce',DB::table('produces')->get());
          // $view->with('group', new Group());
          });

          $this->app['validator']->extend('min_array_size', function($attribute, $value, $parameters) {

            $data = $value;

            if( ! is_array($data)){
                return true;
            }
            return count($data) >= $parameters[0];
});
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
