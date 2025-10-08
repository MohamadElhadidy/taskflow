<?php

use App\Http\Controllers\TeamInvitationController;
use App\Livewire\Dashboard;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\TwoFactor;
use App\Livewire\Team;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return view('welcome');
})->name('home');




Route::middleware(['auth', 'verified'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::get('settings/two-factor', TwoFactor::class)
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');

    Route::get('dashboard', Dashboard::class)->name('dashboard');

    Route::get('/team/{team}', Team::class)->name('team');

    Route::get('/invitations/accept/{token}', [TeamInvitationController::class, 'accept'])->name('team.invite.accept');
});

require __DIR__ . '/auth.php';
