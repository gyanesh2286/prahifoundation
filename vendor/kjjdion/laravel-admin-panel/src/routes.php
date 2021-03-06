<?php

Route::group(['middleware' => 'web'], function () {

    // auth
    Route::get('admin/login', config('lap.controllers.auth.login') . '@loginForm')->name('admin.login');
    Route::post('admin/login', config('lap.controllers.auth.login') . '@login');
    Route::post('admin/logout', config('lap.controllers.auth.login') . '@logout')->name('admin.logout');
    Route::get('admin/profile', config('lap.controllers.auth.profile') . '@updateForm')->name('admin.profile');
    Route::patch('admin/profile', config('lap.controllers.auth.profile') . '@update');
    Route::get('admin/password/change', config('lap.controllers.auth.change_password') . '@changeForm')->name('admin.password.change');
    Route::patch('admin/password/change', config('lap.controllers.auth.change_password') . '@change');
    Route::get('admin/password/reset', config('lap.controllers.auth.forgot_password') . '@emailForm')->name('admin.password.request');
    Route::post('admin/password/email', config('lap.controllers.auth.forgot_password') . '@sendResetLinkEmail')->name('admin.password.email');
    Route::get('admin/password/reset/{token?}', config('lap.controllers.auth.reset_password') . '@resetForm')->name('admin.password.reset');
    Route::post('admin/password/reset', config('lap.controllers.auth.reset_password') . '@reset')->name('admin.password.update');

    // backend
    Route::get('admin', config('lap.controllers.backend') . '@index')->name('admin');
    Route::get('admin/dashboard', config('lap.controllers.backend') . '@dashboard')->name('admin.dashboard');
    Route::get('admin/settings', config('lap.controllers.backend') . '@settingsForm')->name('admin.settings');
    Route::patch('admin/settings', config('lap.controllers.backend') . '@settings');

    // role
    Route::get('admin/roles', config('lap.controllers.role') . '@index')->name('admin.roles');
    Route::get('admin/roles/create', config('lap.controllers.role') . '@createForm')->name('admin.roles.create');
    Route::post('admin/roles/create', config('lap.controllers.role') . '@create');
    Route::get('admin/roles/read/{id}', config('lap.controllers.role') . '@read')->name('admin.roles.read');
    Route::get('admin/roles/update/{id}', config('lap.controllers.role') . '@updateForm')->name('admin.roles.update');
    Route::patch('admin/roles/update/{id}', config('lap.controllers.role') . '@update');
    Route::delete('admin/roles/delete/{id}', config('lap.controllers.role') . '@delete')->name('admin.roles.delete');
    
    // district
    Route::get('admin/district', config('lap.controllers.district') . '@index')->name('admin.district');
    Route::get('admin/district/create', config('lap.controllers.district') . '@createForm')->name('admin.district.create');
    Route::post('admin/district/create', config('lap.controllers.district') . '@create');
    Route::get('admin/district/read/{id}', config('lap.controllers.district') . '@read')->name('admin.district.read');
    Route::get('admin/district/update/{id}', config('lap.controllers.district') . '@updateForm')->name('admin.district.update');
    Route::patch('admin/district/update/{id}', config('lap.controllers.district') . '@update');
    Route::delete('admin/district/delete/{id}', config('lap.controllers.district') . '@delete')->name('admin.district.delete');

    // hospitals
    Route::get('admin/hospital', config('lap.controllers.hospital') . '@index')->name('admin.hospital');
    Route::get('admin/hospital/create', config('lap.controllers.hospital') . '@createForm')->name('admin.hospital.create');
    Route::post('admin/hospital/create', config('lap.controllers.hospital') . '@create');
    Route::get('admin/hospital/read/{id}', config('lap.controllers.hospital') . '@read')->name('admin.hospital.read');
    Route::get('admin/hospital/update/{id}', config('lap.controllers.hospital') . '@updateForm')->name('admin.hospital.update');
    Route::patch('admin/hospital/update/{id}', config('lap.controllers.hospital') . '@update');
    Route::delete('admin/hospital/delete/{id}', config('lap.controllers.hospital') . '@delete')->name('admin.hospital.delete');

    // user
    Route::get('admin/users', config('lap.controllers.user') . '@index')->name('admin.users');
    Route::get('admin/users/create', config('lap.controllers.user') . '@createForm')->name('admin.users.create');
    Route::post('admin/users/create', config('lap.controllers.user') . '@create');
    Route::get('admin/users/read/{id}', config('lap.controllers.user') . '@read')->name('admin.users.read');
    Route::get('admin/users/update/{id}', config('lap.controllers.user') . '@updateForm')->name('admin.users.update');
    Route::patch('admin/users/update/{id}', config('lap.controllers.user') . '@update');
    Route::get('admin/users/password/{id}', config('lap.controllers.user') . '@passwordForm')->name('admin.users.password');
    Route::patch('admin/users/password/{id}', config('lap.controllers.user') . '@password');
    Route::delete('admin/users/delete/{id}', config('lap.controllers.user') . '@delete')->name('admin.users.delete');
    Route::get('admin/users/print-id-card/{id}', config('lap.controllers.user') . '@printIdCard')->name('admin.users.print-id-card');

    // user
    Route::get('admin/members', config('lap.controllers.member') . '@index')->name('admin.members');
    Route::get('admin/members/create', config('lap.controllers.member') . '@createForm')->name('admin.members.create');
    Route::post('admin/members/create', config('lap.controllers.member') . '@create');
    Route::get('admin/members/read/{id}', config('lap.controllers.member') . '@read')->name('admin.members.read');
    Route::get('admin/members/update/{id}', config('lap.controllers.member') . '@updateForm')->name('admin.members.update');
    Route::patch('admin/members/update/{id}', config('lap.controllers.member') . '@update');
    Route::get('admin/members/password/{id}', config('lap.controllers.member') . '@passwordForm')->name('admin.usemembersrs.password');
    Route::patch('admin/members/password/{id}', config('lap.controllers.member') . '@password');
    Route::delete('admin/members/delete/{id}', config('lap.controllers.member') . '@delete')->name('admin.members.delete');

    // activity_logs
    Route::get('admin/activity_logs', config('lap.controllers.activity_log') . '@index')->name('admin.activity_logs');
    Route::get('admin/activity_logs/read/{id}', config('lap.controllers.activity_log') . '@read')->name('admin.activity_logs.read');
    
    // docs
    Route::get('docs/{id?}/{slug?}', config('lap.controllers.doc') . '@frontend')->name('docs');
    Route::get('admin/docs', config('lap.controllers.doc') . '@index')->name('admin.docs');
    Route::get('admin/docs/create', config('lap.controllers.doc') . '@createForm')->name('admin.docs.create');
    Route::post('admin/docs/create', config('lap.controllers.doc') . '@create');
    Route::get('admin/docs/read/{id}', config('lap.controllers.doc') . '@read')->name('admin.docs.read');
    Route::get('admin/docs/update/{id}', config('lap.controllers.doc') . '@updateForm')->name('admin.docs.update');
    Route::patch('admin/docs/update/{id}', config('lap.controllers.doc') . '@update');
    Route::patch('admin/docs/move/{id}', config('lap.controllers.doc') . '@move')->name('admin.docs.move');
    Route::delete('admin/docs/delete/{id}', config('lap.controllers.doc') . '@delete')->name('admin.docs.delete');
    
    Route::get('images/{image}', function($image) {
    if (File::exists($imagePath = storage_path("app/images/{$image}"))) {
        return Image::make($imagePath)->response();
    }
})->where('image', '.+');
    
});