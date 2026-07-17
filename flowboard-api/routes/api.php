<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\URL;
// use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/ping', function () {
    return response()->json([
        'message' => 'Laravel API Working'
    ]);
});


Route::post('register',[AuthController::class,'register']);

Route::post('login',[AuthController::class,'login']);



// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();

//     return response()->json(['message' => 'Email verified successfully.']);
// })->middleware('signed')->name('verification.verify');




Route::get('/email/verify/{id}/{hash}', function ($id, $hash) {

    $user = User::findOrFail($id);

    if (! hash_equals(sha1($user->getEmailForVerification()), $hash)) {
        return response()->json([
            'message' => 'Invalid verification link'
        ], 400);
    }

    if (!$user->hasVerifiedEmail()) {
        $user->markEmailAsVerified();
    }

    return response()->json([
        'message' => 'Email verified successfully'
    ]);

})->middleware('signed')->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {

    if ($request->user()->hasVerifiedEmail()) {
        return response()->json([
            'message' => 'Email already verified.'
        ]);
    }

    $request->user()->sendEmailVerificationNotification();

    return response()->json([
        'message' => 'Verification link sent.'
    ]);
})->middleware(['auth:sanctum', 'throttle:6,1'])
->name('verification.send');


Route::group(['middleware'=>'auth:sanctum'],function(){
Route::post('logout',[AuthController::class,'logout']);
});

