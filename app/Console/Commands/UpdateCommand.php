<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run tasks after repository is updated';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Updating system sytings and configs');
        $bar = $this->output->createProgressBar(10);
        try {
            $this->call('db:seed');
        } catch (\Exception $e) {
        }

        for ($i = 1; $i <= 10; ++$i) {
            sleep(1);
            $bar->advance();
        }
        sleep(1);
        $bar->finish();
        $this->comment("\n");
        $this->info('Update was successful!');
    }
}
