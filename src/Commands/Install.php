<?php
namespace Xiaotianhu\Markdoc\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'markdoc:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'install for markdoc';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("==================== Begin Install =====================");
        $start = microtime(true);
        $this->publish();
        $end   = microtime(true);
        $t     = round($end-$start);
        $this->info("================ Install done in {$t} seconds =================");
    }

    /**
     * public config
     *
     * @return void
     */
    public function publish()
    {
        $this->call('vendor:publish', ["--provider"=>"Xiaotianhu\Markdoc\ServiceProvider", "--tag" => "markdoc-config"]);
        $this->call('vendor:publish', ["--provider"=>"Xiaotianhu\Markdoc\ServiceProvider", "--tag" => "markdoc-assets"]);
        
        $file = new Filesystem();
        $i = $file->copyDirectory(__DIR__."/../doc", base_path('doc'));        
        if($i) echo "Copied Directory ".__DIR__."/../doc to ".base_path('doc')."\r\n";
    }
}
