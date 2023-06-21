<?php

namespace App\Console\Commands;

use App\Models\Reservations;
use Illuminate\Console\Command;

class UpdateReservationStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reservations:purge-past';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates the status of pending reservation to canceled if in the past automatically';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $reservations = Reservations::where('status', 'pending')
    ->where('reserve_date', '<', now()->toDateString())
    ->orWhere(function ($query) {
        $query->whereDate('reserve_date', now()->toDateString())
              ->whereTime('reserve_time', '<', now()->toTimeString());
    })->update(['status' => 'canceled']);

    $this->info($reservations . ' reservations have been canceled.');
    }
}
