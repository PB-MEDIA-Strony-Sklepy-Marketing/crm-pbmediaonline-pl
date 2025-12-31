<?php

namespace Webkul\Category\Providers;

use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
  /**
   * Bootstrap the services.
   *
   * @return void
   */
  public function boot()
  {
    //  ... 

    $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'category');
  }
}