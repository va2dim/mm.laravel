<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //$value = session('userAgent');
        if (isSet($_SERVER['HTTP_USER_AGENT']) && isSet($_SERVER['REMOTE_ADDR'])) {

            session(
                [
                    'userAgent' => $_SERVER['HTTP_USER_AGENT'],
                    'ip' => $_SERVER['REMOTE_ADDR'],
                ]
            );

            $user = User::where('ip_address', session('ip'))->first();
            //dd($user);
            if (!empty($user)) {
                $user->ip_address = session('ip');
                $user->user_agent = session('userAgent');
                $user->save();
            } else {
                $user = new User();
                $user->ip_address = session('ip');
                $user->user_agent = session('userAgent');
                $user->save();
            }

        }

        view()->composer(
            'layouts.sidebar',
            function ($view) {
                $statistic = \App\User::getUserAgents();
                //dd($statistic->all());
                //$statistic = session()->all();


                $view->with(compact('statistic'));
            }
        );

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
