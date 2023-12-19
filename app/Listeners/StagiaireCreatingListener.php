<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\StagiaireCreating;
use App\Models\Stagiaire;

class StagiaireCreatingListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */


     public function handle(StagiaireCreating $event)
    {
        $year = now()->year;
        $count = $event->stagiaire::whereYear('created_at', $year)->count() + 1;
        $event->stagiaire->code = $year . sprintf('%04d', $count);

    // Set a default value if the 'code' field is nullable
    if ($event->stagiaire->code === null) {
        $event->stagiaire->code = $year . '0001';
    }
    }

}
