<?php

namespace App\Console\Commands;

use App\Models\Service;
use App\Models\Service_categories;
use App\Models\Stylist;
use Illuminate\Console\Command;

class CreateData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Service_categories::query()->updateOrCreate([
            'name' => 'Cắt gội xả massage',
            'is_active' => 1
        ]);

        Stylist::query()->updateOrCreate([

        ]);
    }
}
