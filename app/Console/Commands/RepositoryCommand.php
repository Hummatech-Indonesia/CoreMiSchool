<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class RepositoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to make an repository';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');

        $directory = app_path('Contracts/Repositories');
        $filePath = $directory . '/' . $name . 'Repository.php';

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        if (File::exists($filePath)) {
            $this->error('Repository already exists!');
            return;
        }

        $stub = <<<EOT
            <?php

                namespace App\Contracts\Repositories;

                interface {$name}Repository extends BaseRepository
                {
                    // Add your repository methods here
                }
            EOT;

        File::put($filePath, $stub);

        $this->info("Repository {$name} created successfully. at {$filePath}");
    }
}
