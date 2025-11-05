use App\Http\Controllers\MahasiswaController;

Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::post('/store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::post('/update/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::delete('/delete/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
