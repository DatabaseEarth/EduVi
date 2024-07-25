<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\View;
use App\Models\category;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();


        // load dữ liệu danh mục ra header  
        View::composer('clients.block.template_header', function ($view) {
            $categories = Category::where('hide', 1)->get(); // Lấy danh sách các category từ cơ sở dữ liệu hoặc từ bất kỳ nguồn nào khác

            $view->with('categories', $categories); // Truyền biến categories vào view header
        });
        // load dữ liệu khóa học ra header 
        View::composer('clients.block.template_header', function ($view) {
            $categories = Category::where('hide', 1)->get(); // Lấy danh sách các category từ cơ sở dữ liệu hoặc từ bất kỳ nguồn nào khác

            $view->with('categories', $categories); // Truyền biến categories vào view header
        });
    }
}
