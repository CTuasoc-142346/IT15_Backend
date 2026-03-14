<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;
use App\Models\Department;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $dept = fn(string $code) => Department::where('code', $code)->value('id');

        $programs = [

            // ── CCS ──────────────────────────────────────────────────────────
            [
                'department_id'  => $dept('CCS'),
                'code'           => 'BSIT',
                'name'           => 'Bachelor of Science in Information Technology',
                'duration_years' => 4,
                'total_units'    => 170,
                'description'    => 'Prepares students in the design, development, and management of IT systems and infrastructure. Covers networking, web development, systems administration, and database management.',
                'status'         => 'Active',
            ],
            [
                'department_id'  => $dept('CCS'),
                'code'           => 'BSCS',
                'name'           => 'Bachelor of Science in Computer Science',
                'duration_years' => 4,
                'total_units'    => 175,
                'description'    => 'Focuses on the theoretical foundations and practical applications of computing, algorithms, and software development. Includes machine learning, systems programming, and computer theory.',
                'status'         => 'Active',
            ],
            [
                'department_id'  => $dept('CCS'),
                'code'           => 'BSIS',
                'name'           => 'Bachelor of Science in Information Systems',
                'duration_years' => 4,
                'total_units'    => 168,
                'description'    => 'Bridges business processes and technology through the design and management of information systems. Emphasizes enterprise systems, systems analysis, and business intelligence.',
                'status'         => 'Active',
            ],
            [
                'department_id'  => $dept('CCS'),
                'code'           => 'DICT',
                'name'           => 'Diploma in Information and Communications Technology',
                'duration_years' => 2,
                'total_units'    => 90,
                'description'    => 'A two-year diploma program covering core ICT skills for technical and support roles in industry.',
                'status'         => 'Active',
            ],

            // ── COE ──────────────────────────────────────────────────────────
            [
                'department_id'  => $dept('COE'),
                'code'           => 'BSCE',
                'name'           => 'Bachelor of Science in Civil Engineering',
                'duration_years' => 5,
                'total_units'    => 198,
                'description'    => 'Covers the design, construction, and maintenance of infrastructure such as roads, bridges, and buildings. Includes structural, hydraulic, and geotechnical engineering.',
                'status'         => 'Active',
            ],
            [
                'department_id'  => $dept('COE'),
                'code'           => 'BSECE',
                'name'           => 'Bachelor of Science in Electronics Engineering',
                'duration_years' => 5,
                'total_units'    => 200,
                'description'    => 'Covers electronics, communications, and control systems engineering principles. Prepares students for the ECE licensure examination.',
                'status'         => 'Active',
            ],
            [
                'department_id'  => $dept('COE'),
                'code'           => 'BSME',
                'name'           => 'Bachelor of Science in Mechanical Engineering',
                'duration_years' => 5,
                'total_units'    => 202,
                'description'    => 'Deals with the design, analysis, and manufacturing of mechanical systems and machinery. Covers thermodynamics, fluid mechanics, and machine design.',
                'status'         => 'Active',
            ],

            // ── CBA ──────────────────────────────────────────────────────────
            [
                'department_id'  => $dept('CBA'),
                'code'           => 'BSBA-FM',
                'name'           => 'BS Business Administration major in Financial Management',
                'duration_years' => 4,
                'total_units'    => 165,
                'description'    => 'Focuses on financial planning, investment analysis, and corporate finance. Prepares graduates for roles in banking, treasury, and financial consulting.',
                'status'         => 'Active',
            ],
            [
                'department_id'  => $dept('CBA'),
                'code'           => 'BSBA-MM',
                'name'           => 'BS Business Administration major in Marketing Management',
                'duration_years' => 4,
                'total_units'    => 165,
                'description'    => 'Covers market research, consumer behavior, advertising, and brand management. Prepares graduates for careers in digital marketing and brand strategy.',
                'status'         => 'Active',
            ],
            [
                'department_id'  => $dept('CBA'),
                'code'           => 'BSA',
                'name'           => 'Bachelor of Science in Accountancy',
                'duration_years' => 5,
                'total_units'    => 195,
                'description'    => 'Prepares students for the CPA licensure examination covering auditing, taxation, and financial reporting standards.',
                'status'         => 'Active',
            ],

            // ── CED ──────────────────────────────────────────────────────────
            [
                'department_id'  => $dept('CED'),
                'code'           => 'BEED',
                'name'           => 'Bachelor of Elementary Education',
                'duration_years' => 4,
                'total_units'    => 162,
                'description'    => 'Prepares graduates to teach in elementary schools with focus on child development, curriculum design, and pedagogy.',
                'status'         => 'Active',
            ],
            [
                'department_id'  => $dept('CED'),
                'code'           => 'BSED-ENG',
                'name'           => 'Bachelor of Secondary Education major in English',
                'duration_years' => 4,
                'total_units'    => 164,
                'description'    => 'Prepares future high school English teachers with focus on language, literature, and communication skills.',
                'status'         => 'Active',
            ],
            [
                'department_id'  => $dept('CED'),
                'code'           => 'BSED-MATH',
                'name'           => 'Bachelor of Secondary Education major in Mathematics',
                'duration_years' => 4,
                'total_units'    => 164,
                'description'    => 'Equips students to teach secondary mathematics with emphasis on problem-solving, reasoning, and critical thinking.',
                'status'         => 'Active',
            ],

            // ── CAS ──────────────────────────────────────────────────────────
            [
                'department_id'  => $dept('CAS'),
                'code'           => 'BSPSYCH',
                'name'           => 'Bachelor of Science in Psychology',
                'duration_years' => 4,
                'total_units'    => 158,
                'description'    => 'Studies human behavior and mental processes with applications in counseling, organizational psychology, and research.',
                'status'         => 'Active',
            ],
            [
                'department_id'  => $dept('CAS'),
                'code'           => 'ABSOC',
                'name'           => 'Bachelor of Arts in Sociology',
                'duration_years' => 4,
                'total_units'    => 155,
                'description'    => 'Examines social structures, institutions, and human interaction at the individual and societal level.',
                'status'         => 'Active',
            ],

            // ── CON ──────────────────────────────────────────────────────────
            [
                'department_id'  => $dept('CON'),
                'code'           => 'BSN',
                'name'           => 'Bachelor of Science in Nursing',
                'duration_years' => 4,
                'total_units'    => 180,
                'description'    => 'Provides comprehensive nursing education covering clinical practice, patient care, pharmacology, and health sciences.',
                'status'         => 'Active',
            ],

            // ── CCJ ──────────────────────────────────────────────────────────
            [
                'department_id'  => $dept('CCJ'),
                'code'           => 'BSCRIM',
                'name'           => 'Bachelor of Science in Criminology',
                'duration_years' => 4,
                'total_units'    => 162,
                'description'    => 'Prepares students for careers in law enforcement, corrections, and the criminal justice system. Includes criminalistics, criminal law, and forensic science.',
                'status'         => 'Active',
            ],

            // ── CTM ──────────────────────────────────────────────────────────
            [
                'department_id'  => $dept('CTM'),
                'code'           => 'BSTM',
                'name'           => 'Bachelor of Science in Tourism Management',
                'duration_years' => 4,
                'total_units'    => 160,
                'description'    => 'Covers tourism planning, hospitality operations, travel management, and eco-tourism. Prepares graduates for the global tourism industry.',
                'status'         => 'Active',
            ],
            [
                'department_id'  => $dept('CTM'),
                'code'           => 'BSHM',
                'name'           => 'Bachelor of Science in Hospitality Management',
                'duration_years' => 4,
                'total_units'    => 160,
                'description'    => 'Prepares graduates for hotel, restaurant, and event management careers. Includes food and beverage management, front office operations, and catering.',
                'status'         => 'Active',
            ],
        ];

        foreach ($programs as $program) {
            Program::create($program);
        }
    }
}