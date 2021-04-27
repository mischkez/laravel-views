<?php

namespace Mischkez\LaravelViews\Console;

use Illuminate\Console\Command;

class ScaffoldViews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scaffold:views 
                            {directory : The name of the directory you want to store your views eg. (users)} 
                            {names* : List of views you want to create eg. (index show update....)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates views for your controllers';

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
        $dir = $this->argument('directory');
        $views = $this->argument('names');

        $path = base_path() . '/resources/views/' . $dir . '/';
        $view_source = "@extends('layouts.app')\n\n@section('content')\n\n@endsection";

        if (!is_dir($path)) mkdir($path, 0777, 1);

        foreach ($views as $view) {
            $isPartial = substr($view, 0, 2) === "p_";

            if ($isPartial) {
                $view = str_replace('p_', '', $view);
            }

            $view_path = $path . $view . '.blade.php';
            file_put_contents($view_path, $isPartial ? null : $view_source);
        }
    }
}
