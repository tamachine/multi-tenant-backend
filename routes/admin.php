<?php

Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

?>