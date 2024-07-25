<?php

use App\Http\Controllers\admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\admin\ChapterController as AdminChapterController;
use App\Http\Controllers\admin\CommentController as AdminCommentController;
use App\Http\Controllers\admin\CourseController as AdminCourseController;
use App\Http\Controllers\admin\DashBoardController as AdminDashboardController;
use App\Http\Controllers\admin\LessonController as AdminLessonController;
use App\Http\Controllers\admin\OrderController as AdminOrderController;
use App\Http\Controllers\admin\ProductController as AdminProductController;
use App\Http\Controllers\admin\UserController as AdminUserController;
use App\Http\Controllers\auth\PasswordController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\clients\CategoryController;
use App\Http\Controllers\clients\CommentController;
use App\Http\Controllers\clients\CourseController;
use App\Http\Controllers\clients\HomeController;
use App\Http\Controllers\clients\OrderController;
use App\Http\Controllers\clients\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{id}', [CategoryController::class, 'category_detail'])->name('category_detail');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/my-course', [CourseController::class, 'my_course'])->name('my_course');
Route::prefix('course')->group(function () {
    Route::get('/{id}', [CourseController::class, 'course'])->name('course');
    Route::get('/{course}/lesson/{lesson?}', [CourseController::class, 'lesson'])->name('lesson');
});
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'register_add'])->name('register_add');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'login_in'])->name('login_in');

Route::get('/forgot-password', [PasswordController::class, 'showForgetPasswordForm'])->name('forgot.password.form');
Route::post('/forgot-password', [PasswordController::class, 'submitForgetPasswordForm'])->name('forgot.password.submit');
Route::get('/reset-password/{id}/{token}', [PasswordController::class, 'showResetPasswordForm'])->name('reset.password.form');
Route::post('/reset-password', [PasswordController::class, 'submitResetPasswordForm'])->name('reset.password.submit');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/account', [UserController::class, 'account'])->name('account');
Route::post('/account/update', [UserController::class, 'account_update'])->name('account_update');
Route::get('/product/{id}', [ProductController::class, 'product_detail'])->name('product_detail');
Route::post('/comment/product/{id}', [CommentController::class, 'comment_product'])->name('comment_product');
Route::post('/add-to-cart', [OrderController::class, 'addToCart'])->name('add_to_cart');
Route::get('/cart', [OrderController::class, 'cart'])->name('cart');
Route::get('/cart/detail', [OrderController::class, 'cart_detail'])->name('cart_detail');
Route::put('/cart/product/edit', [OrderController::class, 'quantity_cart'])->name('quantity_cart');
Route::post('/cart/bill', [OrderController::class, 'bill'])->name('bill_post');
Route::delete('/cart/delete/product', [OrderController::class, 'delete_product'])->name('delete_product');
Route::delete('/cart/delete/all', [OrderController::class, 'delete_bill'])->name('delete_bill');

Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/', [AdminCategoryController::class, 'category'])->name('read');
        Route::get('/add', [AdminCategoryController::class, 'category_add'])->name('create');
        Route::post('/add', [AdminCategoryController::class, 'category_create'])->name('create_post');
        Route::get('/edit/{id}', [AdminCategoryController::class, 'category_edit'])->name('edit');
        Route::put('/edit/{id}', [AdminCategoryController::class, 'category_update'])->name('update');
        Route::delete('/delete/{id}', [AdminCategoryController::class, 'category_delete'])->name('delete');
    });
    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/', [AdminProductController::class, 'product'])->name('read');
        Route::get('/add', [AdminProductController::class, 'product_add'])->name('create');
        Route::post('/add', [AdminProductController::class, 'product_create'])->name('create_post');
        Route::get('/edit/{id}', [AdminProductController::class, 'product_edit'])->name('edit');
        Route::put('/edit/{id}', [AdminProductController::class, 'product_update'])->name('update');
        Route::delete('/delete/{id}', [AdminProductController::class, 'product_delete'])->name('delete');
    });
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [AdminUserController::class, 'user'])->name('read');
        Route::get('/add', [AdminUserController::class, 'user_add'])->name('create');
        Route::post('/add', [AdminUserController::class, 'user_create'])->name('create_post');
        Route::get('/edit/{id}', [AdminUserController::class, 'user_edit'])->name('edit');
        Route::put('/update/{id}', [AdminUserController::class, 'user_update'])->name('update');
    });
    Route::prefix('comment')->name('comment.')->group(function () {
        Route::get('/', [AdminCommentController::class, 'comment'])->name('read');
        Route::get('/feedback/{id}', [AdminCommentController::class, 'feedback_comment'])->name('feedback');
    });
    Route::prefix('course')->name('course.')->group(function () {
        Route::get('/', [AdminCourseController::class, 'course'])->name('read');
        Route::get('/{id}', [AdminCourseController::class, 'course_chapter'])->name('course_chapter');
        Route::get('/add', [AdminCourseController::class, 'course_add'])->name('create');
        Route::post('/add', [AdminCourseController::class, 'course_create'])->name('create_post');
        Route::get('/edit/{id}', [AdminCourseController::class, 'course_edit'])->name('edit');
        Route::put('/update/{id}', [AdminCourseController::class, 'course_update'])->name('update');
        Route::delete('/delete/{id}', [AdminCourseController::class, 'course_delete'])->name('delete');
    });
    Route::prefix('chapter')->name('chapter.')->group(function () {
        Route::get('/', [AdminChapterController::class, 'chapter'])->name('read');
        Route::get('/add', [AdminChapterController::class, 'chapter_add'])->name('create');
        Route::post('/add', [AdminChapterController::class, 'chapter_create'])->name('create_post');
        Route::get('/edit/{id}', [AdminChapterController::class, 'chapter_edit'])->name('edit');
        Route::put('/update/{id}', [AdminChapterController::class, 'chapter_update'])->name('update');
        Route::delete('/delete/{id}', [AdminChapterController::class, 'chapter_delete'])->name('delete');
    });
    Route::prefix('lesson')->name('lesson.')->group(function () {
        Route::get('/', [AdminLessonController::class, 'lesson'])->name('read');
        Route::get('/add', [AdminLessonController::class, 'lesson_add'])->name('create');
        Route::post('/add', [AdminLessonController::class, 'lesson_create'])->name('create_post');
        Route::get('/edit/{id}', [AdminLessonController::class, 'lesson_edit'])->name('edit');
        Route::put('/update/{id}', [AdminLessonController::class, 'lesson_update'])->name('update');
    });
    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('/', [AdminOrderController::class, 'order'])->name('read');
        Route::put('/update/status', [AdminOrderController::class, 'bill_update'])->name('bill_update');
        Route::get('/detail/{id}', [AdminOrderController::class, 'order_detail'])->name('order_detail');
    });
});
