<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
use Illuminate\Support\Facades\Storage;

class MakeModules extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Module';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $argument = $this->argument('name');
        $pathServiceProvider = "<?php

namespace Mlk\\$argument\Providers;

use Illuminate\Support\ServiceProvider;

class {$argument}ServiceProvider extends ServiceProvider
{

}
";
// -------------------------------------------------------------------------------------
        $pathRepo = "<?php

namespace Mlk\\$argument\Repositories;

class {$argument}Repo
{

}
";
        File::makeDirectory('Modules/Mlk/' . $argument);
        // Databse
        File::makeDirectory('Modules/Mlk/' . $argument . '/Database');
        File::makeDirectory('Modules/Mlk/' . $argument . '/Database/Migrations');
        // Providers
        File::makeDirectory('Modules/Mlk/' . $argument . '/Providers');
        File::put('Modules/Mlk/' . $argument . '/Providers/' . $argument . 'ServiceProvider.php', $pathServiceProvider);
        // Reposiory
        File::makeDirectory('Modules/Mlk/' . $argument . '/Repositories');
        File::put('Modules/Mlk/' . $argument . '/Repositories/' . $argument . 'Repo.php', $pathRepo);
        // Http
        File::makeDirectory('Modules/Mlk/' . $argument . '/Http');
        File::makeDirectory('Modules/Mlk/' . $argument . '/Http/Controllers');
        // Models
        File::makeDirectory('Modules/Mlk/' . $argument . '/Models');
        // Routes
        File::makeDirectory('Modules/Mlk/' . $argument . '/Routes');
        File::put('Modules/Mlk/' . $argument . '/Routes/' . strtolower($argument) . '_routes.php', '<?php');
        // Views
        File::makeDirectory('Modules/Mlk/' . $argument . '/Resources');
        File::makeDirectory('Modules/Mlk/' . $argument . '/Resources/Views');

        $this->info("Your Modules {$argument} Make Successfully");
    }
}
