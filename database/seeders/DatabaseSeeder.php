<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{TrainingType, EmployeeProfile, Employee, Training};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $trainingTypes = ['Brevet', 'Cisco', 'BNSP'];

        $employees = [
            [
                'nip'   => '11090911',
                'name'  => 'Ricky Darmawan'
            ],
            [
                'nip'   => '19809822',
                'name'  => 'Firda Sanjaya'
            ],
            [
                'nip'   => '32909877',
                'name'  => 'Daniel Sahuleka'
            ]
        ];

        $trainings = [
            [
                'type'              => 2,
                'certificate_date'  => '2018-01-12',
                'employee'       => 1,
            ],
            [
                'type'              => 3,
                'certificate_date'  => '2020-08-19',
                'employee'       => 1,
            ],
            [
                'type'              => 1,
                'certificate_date'  => '2019-01-15',
                'employee'       => 2,
            ]
            ];

        foreach ($trainingTypes as $type) {
            TrainingType::create([
                'type'  => $type
            ]);
        }

        foreach ($employees as $key => $employee) {
            EmployeeProfile::create([
                'nip'  => $employee['nip'],
                'name'  => $employee['name'],
            ]);

            Employee::create([
                'profile_id'   => $key+1,
            ]);
        }

        foreach ($trainings as $training) {
            Training::create([
                'type_id'  => $training['type'],
                'certificate_date'  => $training['certificate_date'],
                'employee_id'  => $training['employee']
            ]);
        }
    }
}
