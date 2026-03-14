<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StudentSeeder extends Seeder
{
    // ── Filipino first names ───────────────────────────────────
    private array $maleFirstNames = [
        'Juan', 'Jose', 'Miguel', 'Carlo', 'Marco', 'Rafael', 'Gabriel', 'Andres',
        'Ramon', 'Eduardo', 'Ricardo', 'Fernando', 'Alfonso', 'Rodrigo', 'Manuel',
        'Lorenzo', 'Diego', 'Luis', 'Paulo', 'Angelo', 'Christian', 'John', 'Mark',
        'Ryan', 'Kevin', 'Patrick', 'Jerome', 'Renz', 'Jomar', 'Aldrin',
        'Marvin', 'Ronnie', 'Arvin', 'Danilo', 'Noel', 'Rey', 'Rommel', 'Allan',
        'Derick', 'Jayson', 'Renato', 'Emilio', 'Cesar', 'Victor', 'Romel',
        'Lester', 'Kristoffer', 'Harold', 'Edmar', 'Joselito', 'Rodel', 'Efren',
        'Dominic', 'Nathaniel', 'Elijah', 'Isaiah', 'Aaron', 'Nathan', 'Ethan',
        'Ivan', 'Adrian', 'Anton', 'Francis', 'Jericho', 'Kenneth', 'Alvin',
    ];

    private array $femaleFirstNames = [
        'Maria', 'Ana', 'Rosa', 'Luisa', 'Carmen', 'Elena', 'Isabel', 'Patricia',
        'Marites', 'Lorna', 'Cristina', 'Maricel', 'Jenalyn', 'Rowena', 'Sheila',
        'Aileen', 'Kathleen', 'Melissa', 'Jennifer', 'Angela', 'Nicole', 'Kristine',
        'Lovely', 'Princess', 'Sunshine', 'Rhea', 'Rachelle', 'Camille', 'Dianne',
        'Jasmine', 'Hazel', 'Cheryl', 'Joanne', 'Marianne', 'Tricia', 'Yvonne',
        'Alyssa', 'Bianca', 'Clarissa', 'Denise', 'Erica', 'Fatima', 'Grace',
        'Hannah', 'Irene', 'Joan', 'Karen', 'Leilani', 'Monica', 'Nadine',
        'Olivia', 'Pauline', 'Queenie', 'Regina', 'Sandra', 'Teresa', 'Ursula',
        'Vanessa', 'Wilma', 'Xenia', 'Yvette', 'Zenaida', 'Abby', 'Bea',
    ];

    private array $lastNames = [
        'Santos', 'Reyes', 'Cruz', 'Bautista', 'Ocampo', 'Garcia', 'Mendoza',
        'Torres', 'Flores', 'Ramos', 'Villanueva', 'Castro', 'Hernandez', 'Dela Cruz',
        'Gonzales', 'Aquino', 'Lim', 'Tan', 'Co', 'Go', 'Uy', 'Sy', 'Chua',
        'Manalo', 'Pascual', 'Santiago', 'Macaraeg', 'Soriano', 'Andres', 'Perez',
        'Lopez', 'Fernandez', 'Diaz', 'Ramirez', 'Morales', 'Gutierrez', 'Romero',
        'Navarro', 'Guerrero', 'Jimenez', 'Espiritu', 'Bondoc', 'Mateo', 'Paglinawan',
        'Delos Reyes', 'Dela Torre', 'Estrada', 'Macapagal', 'Arroyo', 'Magno',
        'Buenaventura', 'Castillo', 'Domingo', 'Espino', 'Franco', 'Galang',
        'Halili', 'Ignacio', 'Jacinto', 'Lacson', 'Macario', 'Narciso', 'Obispo',
        'Pineda', 'Quizon', 'Rosales', 'Salazar', 'Tiongson', 'Umali', 'Valencia',
        'Yambao', 'Zabala', 'Atienza', 'Brillantes', 'Cabrera', 'Dalisay',
    ];

    private array $cities = [
        'Cagayan de Oro', 'Iligan', 'Gingoog', 'Ozamiz', 'Oroquieta',
        'Malaybalay', 'Valencia', 'Butuan', 'Surigao', 'Davao',
        'General Santos', 'Cotabato', 'Koronadal', 'Kidapawan', 'Pagadian',
        'Marawi', 'Dipolog', 'Dapitan', 'Zamboanga', 'Mambajao',
    ];

    private array $provinces = [
        'Misamis Oriental', 'Misamis Occidental', 'Bukidnon', 'Camiguin',
        'Lanao del Norte', 'Lanao del Sur', 'North Cotabato', 'South Cotabato',
        'Sarangani', 'Sultan Kudarat', 'Davao del Norte', 'Davao del Sur',
        'Zamboanga del Norte', 'Zamboanga del Sur', 'Agusan del Norte',
    ];

    private array $departments = [
        'College of Computer Studies',
        'College of Engineering',
        'College of Business Administration',
        'College of Education',
        'College of Arts and Sciences',
        'College of Nursing',
        'College of Criminology',
        'College of Tourism and Hospitality Management',
    ];

    private array $yearLevels = ['1st Year', '2nd Year', '3rd Year', '4th Year'];
    private array $statuses   = ['Active', 'Active', 'Active', 'Active', 'Inactive', 'Dropped']; // weighted toward Active

    public function run(): void
    {
        $students = [];
        $usedEmails  = [];
        $usedNumbers = [];

        for ($i = 1; $i <= 520; $i++) {
            $gender    = ($i % 2 === 0) ? 'Male' : 'Female';
            $firstName = $gender === 'Male'
                ? $this->maleFirstNames[array_rand($this->maleFirstNames)]
                : $this->femaleFirstNames[array_rand($this->femaleFirstNames)];
            $lastName  = $this->lastNames[array_rand($this->lastNames)];

            // Unique student number: S + year prefix + padded index
            $yearPrefix    = rand(2021, 2025);
            $studentNumber = "S{$yearPrefix}-" . str_pad($i, 4, '0', STR_PAD_LEFT);
            while (in_array($studentNumber, $usedNumbers)) {
                $studentNumber = "S{$yearPrefix}-" . str_pad($i + rand(1, 99), 4, '0', STR_PAD_LEFT);
            }
            $usedNumbers[] = $studentNumber;

            // Unique email
            $slug  = strtolower(str_replace([' ', "'"], ['', ''], "{$firstName}.{$lastName}"));
            $email = "{$slug}" . rand(10, 999) . "@student.edu.ph";
            while (in_array($email, $usedEmails)) {
                $email = "{$slug}" . rand(100, 9999) . "@student.edu.ph";
            }
            $usedEmails[] = $email;

            $birthYear  = rand(1999, 2006);
            $birthMonth = rand(1, 12);
            $birthDay   = rand(1, 28);
            $birthdate  = Carbon::create($birthYear, $birthMonth, $birthDay)->toDateString();

            $department     = $this->departments[array_rand($this->departments)];
            $yearLevel      = $this->yearLevels[array_rand($this->yearLevels)];
            $status         = $this->statuses[array_rand($this->statuses)];
            $city           = $this->cities[array_rand($this->cities)];
            $province       = $this->provinces[array_rand($this->provinces)];
            $enrollmentYear = rand(2021, 2025);

            $students[] = [
                'student_number'   => $studentNumber,
                'first_name'       => $firstName,
                'last_name'        => $lastName,
                'email'            => $email,
                'gender'           => $gender,
                'birthdate'        => $birthdate,
                'address'          => rand(1, 999) . ' ' . ['Rizal St.', 'Mabini Ave.', 'Bonifacio Rd.', 'Quezon Blvd.', 'Luna St.', 'Del Pilar St.', 'Aguinaldo St.'][array_rand(['Rizal St.', 'Mabini Ave.', 'Bonifacio Rd.', 'Quezon Blvd.', 'Luna St.', 'Del Pilar St.', 'Aguinaldo St.'])],
                'city'             => $city,
                'province'         => $province,
                'contact_number'   => '09' . rand(10, 99) . rand(1000000, 9999999),
                'guardian_name'    => $this->lastNames[array_rand($this->lastNames)] . ', ' . $this->femaleFirstNames[array_rand($this->femaleFirstNames)],
                'guardian_contact' => '09' . rand(10, 99) . rand(1000000, 9999999),
                'year_level'       => $yearLevel,
                'status'           => $status,
                'department'       => $department,
                'enrollment_date'  => Carbon::create($enrollmentYear, 6, rand(1, 15))->toDateString(),
                'created_at'       => now(),
                'updated_at'       => now(),
            ];
        }

        // Insert in chunks of 100 to avoid query size limits
        foreach (array_chunk($students, 100) as $chunk) {
            DB::table('students')->insert($chunk);
        }

        $this->command->info('✅  StudentSeeder: 520 students seeded.');
    }
}