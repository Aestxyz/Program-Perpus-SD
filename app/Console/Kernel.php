<?php

namespace App\Console;

use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        // Mengupdate data transaksi untuk yang berstatus "Berjalan" dan lewat dari tanggal hari ini menjadi Terlambat ->daily();

        $schedule->call(function () {
            DB::table('transactions')
                ->where('status', 'Berjalan')
                ->whereDate('return_date', '<', Carbon::today())
                ->update(['status' => 'Terlambat']);
        })->everyMinute(); // ubah ke ->everyMinute(); untuk melakukan test

        // Menghapus data transaksi berstatus "Batal" setiap tahunnya ->yearly();

        $schedule->call(function () {
            DB::table('transactions')
                ->where('status', 'Tolak')
                ->delete();
        })->everyMinute(); // ubah ke ->everyMinute(); untuk melakukan test
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
