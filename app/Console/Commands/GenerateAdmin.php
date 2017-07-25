<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Admin;

class GenerateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin {--name=} {--pwd=} {--email=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new admin ';


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
        $name = $this->option('name')?:'admin';
        $admin=Admin::where('name',$name)->first();
        if($admin) {
            echo "the admin's name already exists!";
            return ;
        }
        $password = $this->option('pwd')?:'123456';
        $email = $this->option('email')?:'admin@admin.com';
        Admin::create(['name'=>$name,'password'=>bcrypt($password),'email'=>$email]);
        echo 'create admin success!';
    }
}
