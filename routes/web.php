
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\promotionController;
use App\Http\Controllers\SearchController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('product')->group(function () {
        Route::get('/products', [ProductController::class, 'index'])->name('product.index');
        Route::get('', [ProductController::class, 'index'])->name('product');
        Route::get('add', [ProductController::class, 'add'])->name('product.add');
        Route::post('add', [ProductController::class, 'save'])->name('product.save');
        Route::get('edit/{product_id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('edit/{product_id}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('delete/{product_id}', [ProductController::class, 'delete'])->name('product.delete');
        Route::get('search', [ProductController::class, 'search'])->name('product.search');
    });
    

    Route::middleware(['auth'])->group(function () {
        Route::get('/promotion', [promotionController::class, 'index'])->name('promotion.index');
        Route::get('', [promotionController::class, 'index'])->name('promotion');
        Route::get('/promotion/create', [promotionController::class, 'create'])->name('promotion.create');
        Route::post('/promotion', [promotionController::class, 'store'])->name('promotion.store');
        Route::get('/promotion/{id}', [promotionController::class, 'show'])->name('promotion.show');
        Route::get('/promotion/{id}/edit', [promotionController::class, 'edit'])->name('promotion.edit');
        Route::put('/promotion/{id}', [promotionController::class, 'update'])->name('promotion.update');
        Route::delete('/promotion/{id}', [promotionController::class, 'destroy'])->name('promotion.destroy');
});

    Route::prefix('category')->group(function () {
        Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
        Route::get('', [CategoryController::class, 'index'])->name('category');
        Route::get('add', [CategoryController::class, 'add'])->name('category.add');
        Route::post('save', [CategoryController::class, 'save'])->name('category.save');
        Route::get('edit/{category_id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('edit/{category_id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('delete/{category_id}', [CategoryController::class, 'delete'])->name('category.delete');
    });

    Route::prefix('user')->group(function () {
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::get('', [UserController::class, 'index'])->name('user');
        Route::get('/user/add', [UserController::class, 'add'])->name('user.add');
        Route::post('/save', [UserController::class, 'save'])->name('user.save');
        Route::get('/edit/{user_id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/update/{user_id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/delete/{user_id}', [UserController::class, 'delete'])->name('user.delete');
        Route::get('/users/search', [UserController::class, 'search'])->name('user.search');


    });

    Route::prefix('employees')->group(function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('employees.index');
        Route::get('', [EmployeeController::class, 'index'])->name('employees');
        Route::get('/create', [EmployeeController::class, 'create'])->name('employees.create');
        Route::post('/', [EmployeeController::class, 'store'])->name('employees.store');
        Route::get('/{id}', [EmployeeController::class, 'show'])->name('employees.show');
        Route::get('/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
        Route::put('/{id}', [EmployeeController::class, 'update'])->name('employees.update');
        Route::delete('/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
    });

    Route::resource('image', ImageController::class);
    Route::get('/search', [SearchController::class, 'search'])->name('search');

});
