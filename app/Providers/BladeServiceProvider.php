<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        /* @Commonmark($var) */
        \Blade::extend(function($view, $compiler)
        {
            $pattern = $compiler->createOpenMatcher('Commonmark');
			
            return preg_replace($pattern, '$1<?php $converter = new League\CommonMark\CommonMarkConverter(); echo $converter->convertToHtml($2)); ?>', $view);
        });
    }

    public function register()
    {
        //
    }
}