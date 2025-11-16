<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-admin-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create admin user with email admin@admin.com';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Önce mevcut admin kullanıcısını sil
        User::where('email', 'admin@admin.com')->delete();

        // Yeni admin kullanıcısı oluştur
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now(),
        ]);

        $this->info('Admin kullanıcısı başarıyla oluşturuldu!');
        $this->info('Email: admin@admin.com');
        $this->info('Şifre: admin123');

        return Command::SUCCESS;
    }
}
