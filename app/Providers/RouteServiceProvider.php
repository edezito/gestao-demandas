public function boot(): void
{
    $this->routes(function () {

        // API routes
        Route::prefix('api')
            ->middleware('api')
            ->group(base_path('routes/api.php'));

        // Web routes
        Route::middleware('web')
            ->group(base_path('routes/web.php'));
    });
}