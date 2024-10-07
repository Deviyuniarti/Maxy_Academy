<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ProductController};
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SalesOrderController;
use App\Http\Controllers\PurchaseOrderController;


Route::middleware(['auth'])->group(function () { 

    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/product/create', [ProductController::class, 'create']);
    Route::post('/product/simpan-data', [ProductController::class, 'store']);
    Route::get('/product/view/{id}', [ProductController::class, 'view']); 
    Route::get('/product/edit/{id}', [ProductController::class, 'formEdit']);
    Route::post('/product/update/{id}', [ProductController::class, 'update']);
    Route::delete('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    
    Route::get('/customer', [CustomerController::class, 'index']);
    Route::get('/customer/create', [CustomerController::class, 'create']);
    Route::post('/customer/simpan-data', [CustomerController::class, 'store']);
    Route::get('/customer/view/{id}', [CustomerController::class, 'view']); 
    Route::get('/customer/edit/{id}', [CustomerController::class, 'formEdit']);
    Route::post('/customer/update/{id}', [CustomerController::class, 'update']);
    Route::delete('/customer/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');
    
    Route::get('/sales_order', [SalesOrderController::class, 'index']);
    Route::get('/sales_order/create', [SalesOrderController::class, 'create']);
    Route::post('/sales_order/simpan-data', [SalesOrderController::class, 'store']);
    Route::get('/sales_order/view/{id}', [SalesOrderController::class, 'view']); 
    Route::get('/sales_order/edit/{id}', [SalesOrderController::class, 'formEdit']);
    Route::post('/sales_order/update/{id}', [SalesOrderController::class, 'update']);
    Route::delete('/sales_order/delete/{id}', [SalesOrderController::class, 'delete'])->name('sales_order.delete');
    
    Route::get('/purchase_order', [PurchaseOrderController::class, 'index']);
    Route::get('/purchase_order/create', [PurchaseOrderController::class, 'create']);
    Route::post('/purchase_order/simpan-data', [PurchaseOrderController::class, 'store']);
    Route::get('/purchase_order/view/{id}', [PurchaseOrderController::class, 'view']); 
    Route::get('/purchase_order/edit/{id}', [PurchaseOrderController::class, 'formEdit']);
    Route::post('/purchase_order/update/{id}', [PurchaseOrderController::class, 'update']);
    Route::delete('/purchase_order/delete/{id}', [PurchaseOrderController::class, 'delete'])->name('purchase_order.delete');
    
    Route::get('/user', [userController::class, 'index']);
    Route::get('/user/create', [userController::class, 'create']);
    Route::post('/user/simpan-data', [userController::class, 'store']);
    Route::get('/user/view/{id}', [userController::class, 'view']);
    Route::get('/user/edit/{id}', [userController::class, 'formEdit']);
    Route::post('/user/update/{id}', [userController::class, 'update']);
    Route::delete('/user/delete/{id}', [userController::class, 'delete'])->name('user.delete');
    Route::get('/logout', [Auth\LoginController::class, 'logout']);
});


Route::get('/login', [Auth\LoginController::class, 'index'])->name('login');
Route::post('/login/proses', [Auth\LoginController::class, 'login'])->name('login.proses');
Route::get('/register', [Auth\RegisterController::class, 'index']);
Route::post('/register/proses', [Auth\RegisterController::class, 'register']);