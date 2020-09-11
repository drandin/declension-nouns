<?php

namespace Drandin\DeclensionNouns;

use Illuminate\Support\ServiceProvider;

/**
 * Class DeclensionNounsServiceProvider
 * @package Drandin\DeclensionNouns
 */
class DeclensionNounsServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = false;

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton('DeclensionNoun', function () {
            return new DeclensionNouns(
                new Dictionary(),
                new Core()
            );
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/declension-nouns.php' => config_path('declension-nouns.php'),
        ], 'config');
    }
}
