<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class generateGrupRoot extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate_grup:root {username?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate menu untuk root user';

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
     * @return mixed
     */
    public function handle()
    {
        if (empty($this->argument('username'))) {
            $this->error('Username harus dimasukkan. Contoh command ("generate_grup:root ojisatriani")');
        } else {
            if (config('master.artisan_password')==FALSE) {
                $this->eksekusi();
            } else {
                $password = $this->secret('Masukkan password Artisan!!!');
                if ($password == config('master.artisan_password')) {
                    $this->eksekusi();
                } else {
                    $this->error('Password Artisan Salah!!!');
                }
            }
        }
        
       
    }

    public function eksekusi()
    {
        $user = User::whereUsername($this->argument('username'))->latest()->first();
        if ($user !== NULL) {
            if (with(new Aksesgrup)->generateRoot($user->id)) {
                $this->info('Berhasil Generate Root '. $user->nama);
            } else {
                $this->error('Gagal Generate Root');
            }
        } else {
            $this->error('User "'.$this->argument('username').'" tidak ditemukan');
        }
    }
}
