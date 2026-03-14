<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            [
                'code'    => 'CCS',
                'name'    => 'College of Computer Studies',
                'dean'    => 'Dr. Maribel T. Santos',
                'email'   => 'ccs@school.edu.ph',
                'contact' => '(082) 221-1001',
                'status'  => 'Active',
            ],
            [
                'code'    => 'COE',
                'name'    => 'College of Engineering',
                'dean'    => 'Engr. Ramon F. Dela Cruz',
                'email'   => 'coe@school.edu.ph',
                'contact' => '(082) 221-1002',
                'status'  => 'Active',
            ],
            [
                'code'    => 'CBA',
                'name'    => 'College of Business Administration',
                'dean'    => 'Dr. Lorna C. Villanueva',
                'email'   => 'cba@school.edu.ph',
                'contact' => '(082) 221-1003',
                'status'  => 'Active',
            ],
            [
                'code'    => 'CED',
                'name'    => 'College of Education',
                'dean'    => 'Dr. Evangeline M. Reyes',
                'email'   => 'ced@school.edu.ph',
                'contact' => '(082) 221-1004',
                'status'  => 'Active',
            ],
            [
                'code'    => 'CAS',
                'name'    => 'College of Arts and Sciences',
                'dean'    => 'Dr. Jose P. Mercado',
                'email'   => 'cas@school.edu.ph',
                'contact' => '(082) 221-1005',
                'status'  => 'Active',
            ],
            [
                'code'    => 'CON',
                'name'    => 'College of Nursing',
                'dean'    => 'Dr. Flordeliza A. Bautista',
                'email'   => 'con@school.edu.ph',
                'contact' => '(082) 221-1006',
                'status'  => 'Active',
            ],
            [
                'code'    => 'CCJ',
                'name'    => 'College of Criminal Justice',
                'dean'    => 'Atty. Rodrigo N. Soriano',
                'email'   => 'ccj@school.edu.ph',
                'contact' => '(082) 221-1007',
                'status'  => 'Active',
            ],
            [
                'code'    => 'CTM',
                'name'    => 'College of Tourism Management',
                'dean'    => 'Dr. Cristina B. Flores',
                'email'   => 'ctm@school.edu.ph',
                'contact' => '(082) 221-1008',
                'status'  => 'Active',
            ],
        ];

        foreach ($departments as $dept) {
            Department::create($dept);
        }
    }
}