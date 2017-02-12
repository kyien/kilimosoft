<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
class ComposerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        //
        View::creator(['home','profile.profile','profile.edit_profile','layouts.profile_layout','layouts.message_layout','messenger.show'
      ,'layouts.layout','groups.index','groups.layout.layout'],
        'App\Http\ViewComposers\ProfileComposer');


    }


    public function register()
    {
        //
    }
}
