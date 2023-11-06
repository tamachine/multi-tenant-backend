<?php

namespace App\Console\Commands;

use App\Models\Landlord\Tenant;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateTenant extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:create
                        {--long_name= : Long name of the tenant: Reykjavik Auto, Iceland Cars, etc ...}
                        {--name= : string id of the tenant: ra, ic, etc ...}
                        {--domain= : domain of the tenant: api.reykjavikauto.com, api.icelandcars.id, etc ...}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to create a new tenant';

    protected $values = [];

    protected $tenant = null;

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->setValues();

        $this->createTenant();
        
        $this->createEnvFile();

        $this->createToken();
    }

    protected function setValues() {
        $options = [
            'long_name' => 'What is the name of the tenant? (Reykjavik Auto, Iceland Cars, Motorhome Iceland, etc ...)',
            'name' => 'What is the if the tenant? (ra, ic, mhi, etc ...)', 
            'domain' => 'What is the domain of the tenant? (api.reykjavikauto.com, api.icelandcars.is, api.motorhomeiceland.com, etc ...)'];

        foreach ($options as $name => $message) {
            $value = $this->option($name);

            while (empty($value)) {
                $value = $this->ask($message);
            }

            $this->values[$name] = $value;
        }

        $this->values['database'] = 'tenant'.$this->values['name'];
    }

    protected function createTenant() {
        $this->tenant = Tenant::create($this->values);

        $this->info('TENANT CREATED. Please follow the next steps to finish the configuration: '. PHP_EOL);

        $this->info('1. Create the" '. $this->tenant->database . '" database and the "'. $this->tenant->domain. '" domain' . PHP_EOL);
    }

    protected function createEnvFile() {
        $sourcePath      = base_path('.env.tenant.example');
        $tenantEnvName   = '.env.'.$this->tenant->name;
        $destinationPath = base_path($tenantEnvName); 

        if (File::exists($sourcePath)) {
            
            File::copy($sourcePath, $destinationPath);

            $this->info('2.'. $tenantEnvName  .' file has been created. Fill it according to your tenant and add ' . $tenantEnvName . ' to .gitignore file.'. PHP_EOL);
        }
    }

    protected function createToken() {
        $this->info('3. Once you have created and migrated the tenant database, run the command: php artisan web:create-token --tenant='. $this->tenant->id . ' in order to get a token for ' . $this->tenant->domain . PHP_EOL);
    }

}
