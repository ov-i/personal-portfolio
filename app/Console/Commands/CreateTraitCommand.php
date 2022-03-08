<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateTraitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:trait {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Trait in App\Traits with passed name';

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
    public function handle(): int
    {
        $name = $this->argument('name');

        $name = str_replace('-', '', $name);
        $name = ucwords($name);

        if($this->confirm("This will create Trait '{$name}' in App\Trait namespace. Continue? ", true)) {

            $destination = "app/Traits";
            if (!is_dir($destination))
                mkdir($destination, 0777, true);

            $file = fopen("{$destination}/{$name}.php",'a')
                or die("File {$name}.php could not be opened");

            $content = "<?php

namespace App\Traits;

trait {$name}
{
    //
}
";

            fwrite($file, $content);
            fclose($file);
            $this->info("Trait '{$name}' has been created successfully");
        } else {
            $this->info('Operation ended. No trait has been created.');
        }

        return 0;
    }
}
