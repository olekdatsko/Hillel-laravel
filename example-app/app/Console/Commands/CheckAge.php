<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckAge extends Command
{
    protected $signature = 'check:age {name : The user name}';
    protected $description = 'Check users age';

    public function handle(): void
    {
        $name = $this->argument('name');
        $age = $this->ask('Вкажіть Ваш вік:');

        if ($age < 18) {
            if (!$this->confirm('Ви дійсно хочете продовжити?')) {
                return;
            }
        }

        $choice = $this->choice('Choose an option:', ['read', 'write']);

        if ($choice === 'read') {
            $filename = 'file.txt';

            if (file_exists($filename)) {
                $content = file_get_contents($filename);
                $this->info($content);
            } else {
                $this->error('Файл не знайдено.');
            }
        } elseif ($choice === 'write') {
            $gender = $this->ask('Вкажіть стать:');
            $city = $this->ask('Місто в якому проживаєте:');
            $phone = $this->ask('Телефончик теж залиште:');

            $data = [
                'name' => $name,
                'age' => $age,
                'gender' => $gender,
                'city' => $city,
                'phone' => $phone,
            ];

            $jsonData = json_encode($data);

            if (file_put_contents('file.txt', $jsonData)) {
                $this->info('Успіх!');
            } else {
                $this->error('Помилочка :(');
            }
        }
    }
}
