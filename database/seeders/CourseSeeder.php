<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Department;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $dept = fn(string $code) => Department::where('code', $code)->value('id');

        $instructors = [
            'CCS' => ['Prof. Ana Reyes', 'Prof. Mark Salazar', 'Prof. Lyn Torralba', 'Prof. Ian dela Torre', 'Prof. Cara Montoya'],
            'COE' => ['Engr. Joel Santos', 'Engr. Mia Cruz', 'Engr. Rey Pascual', 'Engr. Donna Villarin'],
            'CBA' => ['Prof. Tess Aguilar', 'Prof. Rex Camposano', 'Prof. Len Quiambao'],
            'CED' => ['Prof. Nina Garcia', 'Prof. Ben Malabanan', 'Prof. Sol Paras'],
            'CAS' => ['Prof. Ed Bernardo', 'Prof. Cora Lim'],
            'CON' => ['Ms. Vicky Balagtas RN', 'Ms. Joy Obina RN', 'Ms. Rose Taguibao RN'],
            'CCJ' => ['Insp. Dan Sison', 'Atty. Mike Alvarado'],
            'CTM' => ['Prof. Sandra Ilao', 'Prof. Ric Espino'],
        ];

        $rooms = ['RLE 101', 'Lab 201', 'Room 302', 'Auditorium A', 'Lab 105', 'Room 410', 'Seminar Hall', 'CISCO Lab', 'Lab 301'];

        $courses = [
            // ── CCS ─────────────────────────────────────────────────────────
            ['department_id'=>$dept('CCS'),'code'=>'CCS-WD-01','name'=>'Web Development','units'=>3,'instructor'=>$instructors['CCS'][0],'schedule'=>'MWF 7:30-9:00','room'=>$rooms[7],'slots'=>35,'type'=>'Lecture & Lab','status'=>'Active'],
            ['department_id'=>$dept('CCS'),'code'=>'CCS-DB-01','name'=>'Database Administration','units'=>3,'instructor'=>$instructors['CCS'][1],'schedule'=>'TTh 10:30-12:00','room'=>$rooms[1],'slots'=>30,'type'=>'Laboratory','status'=>'Active'],
            ['department_id'=>$dept('CCS'),'code'=>'CCS-NET-01','name'=>'Network Administration','units'=>3,'instructor'=>$instructors['CCS'][2],'schedule'=>'MWF 1:00-2:30','room'=>$rooms[8],'slots'=>30,'type'=>'Lecture & Lab','status'=>'Active'],
            ['department_id'=>$dept('CCS'),'code'=>'CCS-AI-01','name'=>'Artificial Intelligence Fundamentals','units'=>3,'instructor'=>$instructors['CCS'][3],'schedule'=>'TTh 7:30-9:00','room'=>$rooms[2],'slots'=>40,'type'=>'Lecture','status'=>'Active'],
            ['department_id'=>$dept('CCS'),'code'=>'CCS-MOB-01','name'=>'Mobile Development (Android)','units'=>3,'instructor'=>$instructors['CCS'][4],'schedule'=>'WF 1:00-3:00','room'=>$rooms[1],'slots'=>30,'type'=>'Lecture & Lab','status'=>'Active'],
            ['department_id'=>$dept('CCS'),'code'=>'CCS-SEC-01','name'=>'Cybersecurity Fundamentals','units'=>3,'instructor'=>$instructors['CCS'][0],'schedule'=>'MWF 10:30-12:00','room'=>$rooms[7],'slots'=>35,'type'=>'Lecture','status'=>'Active'],

            // ── COE ─────────────────────────────────────────────────────────
            ['department_id'=>$dept('COE'),'code'=>'COE-STRUCT-01','name'=>'Structural Analysis','units'=>4,'instructor'=>$instructors['COE'][0],'schedule'=>'MWF 7:30-9:00','room'=>$rooms[2],'slots'=>35,'type'=>'Lecture','status'=>'Active'],
            ['department_id'=>$dept('COE'),'code'=>'COE-FLUID-01','name'=>'Fluid Mechanics','units'=>3,'instructor'=>$instructors['COE'][1],'schedule'=>'TTh 1:00-2:30','room'=>$rooms[2],'slots'=>35,'type'=>'Lecture','status'=>'Active'],
            ['department_id'=>$dept('COE'),'code'=>'COE-CIRCUIT-01','name'=>'Electric Circuits','units'=>3,'instructor'=>$instructors['COE'][2],'schedule'=>'MWF 10:30-12:00','room'=>$rooms[0],'slots'=>40,'type'=>'Lecture','status'=>'Active'],
            ['department_id'=>$dept('COE'),'code'=>'COE-THERMO-01','name'=>'Thermodynamics','units'=>3,'instructor'=>$instructors['COE'][3],'schedule'=>'TTh 7:30-9:00','room'=>$rooms[2],'slots'=>35,'type'=>'Lecture','status'=>'Active'],

            // ── CBA ─────────────────────────────────────────────────────────
            ['department_id'=>$dept('CBA'),'code'=>'CBA-ACCTG-01','name'=>'Financial Accounting','units'=>3,'instructor'=>$instructors['CBA'][0],'schedule'=>'MWF 7:30-9:00','room'=>$rooms[2],'slots'=>45,'type'=>'Lecture','status'=>'Active'],
            ['department_id'=>$dept('CBA'),'code'=>'CBA-MKTG-01','name'=>'Principles of Marketing','units'=>3,'instructor'=>$instructors['CBA'][1],'schedule'=>'TTh 10:30-12:00','room'=>$rooms[2],'slots'=>45,'type'=>'Lecture','status'=>'Active'],
            ['department_id'=>$dept('CBA'),'code'=>'CBA-FIN-01','name'=>'Corporate Finance','units'=>3,'instructor'=>$instructors['CBA'][2],'schedule'=>'MWF 1:00-2:30','room'=>$rooms[2],'slots'=>40,'type'=>'Lecture','status'=>'Active'],

            // ── CED ─────────────────────────────────────────────────────────
            ['department_id'=>$dept('CED'),'code'=>'CED-CURRIC-01','name'=>'Curriculum Development','units'=>3,'instructor'=>$instructors['CED'][0],'schedule'=>'TTh 7:30-9:00','room'=>$rooms[2],'slots'=>40,'type'=>'Lecture','status'=>'Active'],
            ['department_id'=>$dept('CED'),'code'=>'CED-ASSESS-01','name'=>'Assessment in Learning','units'=>3,'instructor'=>$instructors['CED'][1],'schedule'=>'MWF 10:30-12:00','room'=>$rooms[2],'slots'=>40,'type'=>'Lecture','status'=>'Active'],
            ['department_id'=>$dept('CED'),'code'=>'CED-TECH-01','name'=>'Technology for Teaching and Learning','units'=>3,'instructor'=>$instructors['CED'][2],'schedule'=>'TTh 1:00-2:30','room'=>$rooms[1],'slots'=>35,'type'=>'Lecture & Lab','status'=>'Active'],

            // ── CAS ─────────────────────────────────────────────────────────
            ['department_id'=>$dept('CAS'),'code'=>'CAS-PSY-01','name'=>'General Psychology','units'=>3,'instructor'=>$instructors['CAS'][0],'schedule'=>'MWF 7:30-9:00','room'=>$rooms[2],'slots'=>50,'type'=>'Lecture','status'=>'Active'],
            ['department_id'=>$dept('CAS'),'code'=>'CAS-SOC-01','name'=>'Introduction to Sociology','units'=>3,'instructor'=>$instructors['CAS'][1],'schedule'=>'TTh 1:00-2:30','room'=>$rooms[2],'slots'=>50,'type'=>'Lecture','status'=>'Active'],

            // ── CON ─────────────────────────────────────────────────────────
            ['department_id'=>$dept('CON'),'code'=>'CON-RLE-01','name'=>'Related Learning Experience — Med-Surg','units'=>3,'instructor'=>$instructors['CON'][0],'schedule'=>'MWF 6:00-9:00','room'=>'Hospital RLE','slots'=>20,'type'=>'Laboratory','status'=>'Active'],
            ['department_id'=>$dept('CON'),'code'=>'CON-RLE-02','name'=>'Related Learning Experience — Community Health','units'=>3,'instructor'=>$instructors['CON'][1],'schedule'=>'TTh 6:00-9:00','room'=>'Community Site','slots'=>20,'type'=>'Laboratory','status'=>'Active'],

            // ── CCJ ─────────────────────────────────────────────────────────
            ['department_id'=>$dept('CCJ'),'code'=>'CCJ-LAW-01','name'=>'Criminal Law Review','units'=>3,'instructor'=>$instructors['CCJ'][0],'schedule'=>'TTh 1:00-2:30','room'=>$rooms[2],'slots'=>40,'type'=>'Lecture','status'=>'Active'],
            ['department_id'=>$dept('CCJ'),'code'=>'CCJ-FORENSIC-01','name'=>'Forensic Science Lab','units'=>3,'instructor'=>$instructors['CCJ'][1],'schedule'=>'MWF 1:00-3:00','room'=>'Forensic Lab','slots'=>25,'type'=>'Laboratory','status'=>'Active'],

            // ── CTM ─────────────────────────────────────────────────────────
            ['department_id'=>$dept('CTM'),'code'=>'CTM-FNBSVC-01','name'=>'Food and Beverage Service','units'=>3,'instructor'=>$instructors['CTM'][0],'schedule'=>'TTh 10:30-12:00','room'=>'Demo Kitchen','slots'=>25,'type'=>'Lecture & Lab','status'=>'Active'],
            ['department_id'=>$dept('CTM'),'code'=>'CTM-TOUR-01','name'=>'Tour Guiding and Operations','units'=>3,'instructor'=>$instructors['CTM'][1],'schedule'=>'MWF 7:30-9:00','room'=>$rooms[2],'slots'=>35,'type'=>'Lecture','status'=>'Active'],
        ];

        foreach (array_chunk($courses, 30) as $chunk) {
            Course::insert(array_map(function ($c) {
                $now = now();
                return array_merge($c, ['created_at' => $now, 'updated_at' => $now]);
            }, $chunk));
        }
    }
}