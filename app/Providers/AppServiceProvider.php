<?php

namespace App\Providers;

use App\Library\Repository\BorrowerRepository;
use App\Library\Repository\BorrowerRepositoryInterface;
use App\Library\Repository\LoanApplicationRepository;
use App\Library\Repository\LoanApplicationRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {

        $this->app->singleton(LoanApplicationRepositoryInterface::class, function(){
            return new LoanApplicationRepository();
        });

        $this->app->singleton(BorrowerRepositoryInterface::class, function(){
            return new BorrowerRepository();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
