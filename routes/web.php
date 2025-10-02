<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\ReportController;

Route::middleware(['auth','role:Admin'])->group(function(){
    Route::get('/admin/dashboard', function(){ /* ... */ });
});

Route::middleware(['auth','role:Manager'])->group(function(){
    Route::get('/manager/staff', [ReportController::class,'staffList']);
    Route::get('/manager/reports', [ReportController::class,'index']);
});

Route::middleware(['auth','permission:approve members'])->post('/members/{member}/approve', [MemberController::class,'approve']);

