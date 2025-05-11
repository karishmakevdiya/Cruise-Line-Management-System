<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use App\Models\Port;

class AddPortDataToTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'AddPortDataToTable';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command To add All Teh Port Data to Table From json File';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $contents = File::get(base_path('public/ports.json'));
        $json = json_decode(json: $contents, associative: true);
        foreach($json as $port){
            Port::create([

                'name' => $port['name'],
                'city' => $port['city'],
                'country' => $port['country'],
                'alias' => json_encode($port['alias']),
                'regions' => json_encode($port['regions']),
                'coordinates' => isset($port['coordinates']) ? json_encode($port['coordinates']) : null,
                'province' => isset($port['province']) ? $port['province'] : null,
                'timezone' => isset($port['timezone']) ? $port['timezone'] : null,
                'unlocs' => json_encode($port['unlocs']),
                'code' => isset($port['code']) ? $port['code'] : null,

            ]);

        }

        dd('Command run successfully');
    }
}
