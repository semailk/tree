<?php

namespace App\Providers;

use App\Repository\Certificate\CertificateRepository;
use App\Repository\Certificate\Contract\CertificateRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class CertificateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CertificateRepositoryInterface::class,CertificateRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
