<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InterfaceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:interface {name : The name of the interface}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to make an interface';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $directory = app_path('Contracts/Interfaces');

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
            $this->info('Directory created successfully.');
        }

        $filePath = $directory . '/' . $name . '.php';

        if (File::exists($filePath)) {
            $this->error('Interface already exists!');
            return;
        }

        $interfaceContent = "<?php
        \nnamespace App\Contracts\Interfaces;
        \nuse App\Contracts\Interfaces\Eloquent\DeleteInterface; \nuse App\Contracts\Interfaces\Eloquent\GetInterface; \nuse App\Contracts\Interfaces\Eloquent\ShowInterface; \nuse App\Contracts\Interfaces\Eloquent\StoreInterface; \nuse App\Contracts\Interfaces\Eloquent\UpdateInterface;
        \ninterface $name extends GetInterface, StoreInterface, UpdateInterface, ShowInterface, DeleteInterface \n{\n    // Define your methods here\n}";

        File::put($filePath, $interfaceContent);
        $this->info("Interface $name created successfully in app/Contracts/Interfaces.");
    }
}
