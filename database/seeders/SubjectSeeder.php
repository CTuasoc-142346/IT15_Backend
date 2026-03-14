<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;
use App\Models\Program;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $prog = fn(string $code) => Program::where('code', $code)->value('id');

        // ─────────────────────────────────────────────────────────────────────
        // BSIT — Bachelor of Science in Information Technology
        // ─────────────────────────────────────────────────────────────────────
        $bsit = $prog('BSIT');
        $subjects = [

            // Year 1 — 1st Semester
            ['program_id'=>$bsit,'code'=>'IT-GEC1','title'=>'Understanding the Self','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bsit,'code'=>'IT-GEC2','title'=>'Readings in Philippine History','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bsit,'code'=>'IT-MATH1','title'=>'Mathematics in the Modern World','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bsit,'code'=>'IT-CS1','title'=>'Introduction to Computing','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bsit,'code'=>'IT-CS1L','title'=>'Introduction to Computing (Lab)','units'=>1,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Laboratory'],
            ['program_id'=>$bsit,'code'=>'IT-ENG1','title'=>'Purposive Communication','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bsit,'code'=>'IT-PE1','title'=>'Physical Education 1','units'=>2,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bsit,'code'=>'IT-NSTP1','title'=>'NSTP 1','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],

            // Year 1 — 2nd Semester
            ['program_id'=>$bsit,'code'=>'IT-GEC3','title'=>'The Contemporary World','units'=>3,'semester'=>'2nd','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bsit,'code'=>'IT-GEC4','title'=>'Art Appreciation','units'=>3,'semester'=>'2nd','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bsit,'code'=>'IT-PROG1','title'=>'Computer Programming 1','units'=>3,'semester'=>'2nd','year_level'=>1,'prerequisites'=>'IT-CS1','type'=>'Lecture'],
            ['program_id'=>$bsit,'code'=>'IT-PROG1L','title'=>'Computer Programming 1 (Lab)','units'=>1,'semester'=>'2nd','year_level'=>1,'prerequisites'=>'IT-CS1L','type'=>'Laboratory'],
            ['program_id'=>$bsit,'code'=>'IT-MATH2','title'=>'Discrete Mathematics','units'=>3,'semester'=>'2nd','year_level'=>1,'prerequisites'=>'IT-MATH1','type'=>'Lecture'],
            ['program_id'=>$bsit,'code'=>'IT-PE2','title'=>'Physical Education 2','units'=>2,'semester'=>'2nd','year_level'=>1,'prerequisites'=>'IT-PE1','type'=>'Lecture'],
            ['program_id'=>$bsit,'code'=>'IT-NSTP2','title'=>'NSTP 2','units'=>3,'semester'=>'2nd','year_level'=>1,'prerequisites'=>'IT-NSTP1','type'=>'Lecture'],

            // Year 2 — 1st Semester
            ['program_id'=>$bsit,'code'=>'IT-PROG2','title'=>'Computer Programming 2','units'=>3,'semester'=>'1st','year_level'=>2,'prerequisites'=>'IT-PROG1','type'=>'Lecture'],
            ['program_id'=>$bsit,'code'=>'IT-PROG2L','title'=>'Computer Programming 2 (Lab)','units'=>1,'semester'=>'1st','year_level'=>2,'prerequisites'=>'IT-PROG1L','type'=>'Laboratory'],
            ['program_id'=>$bsit,'code'=>'IT-DS','title'=>'Data Structures and Algorithms','units'=>3,'semester'=>'1st','year_level'=>2,'prerequisites'=>'IT-PROG1','type'=>'Lecture'],
            ['program_id'=>$bsit,'code'=>'IT-DSL','title'=>'Data Structures and Algorithms (Lab)','units'=>1,'semester'=>'1st','year_level'=>2,'prerequisites'=>'IT-PROG1L','type'=>'Laboratory'],
            ['program_id'=>$bsit,'code'=>'IT-NET1','title'=>'Computer Networks','units'=>3,'semester'=>'1st','year_level'=>2,'prerequisites'=>'IT-CS1','type'=>'Lecture'],
            ['program_id'=>$bsit,'code'=>'IT-DB1','title'=>'Database Management Systems','units'=>3,'semester'=>'1st','year_level'=>2,'prerequisites'=>'IT-PROG1','type'=>'Lecture'],
            ['program_id'=>$bsit,'code'=>'IT-DB1L','title'=>'Database Management Systems (Lab)','units'=>1,'semester'=>'1st','year_level'=>2,'prerequisites'=>'IT-PROG1L','type'=>'Laboratory'],
            ['program_id'=>$bsit,'code'=>'IT-STAT','title'=>'Statistics and Probability','units'=>3,'semester'=>'1st','year_level'=>2,'prerequisites'=>'IT-MATH1','type'=>'Lecture'],

            // Year 2 — 2nd Semester
            ['program_id'=>$bsit,'code'=>'IT-OOP','title'=>'Object-Oriented Programming','units'=>3,'semester'=>'2nd','year_level'=>2,'prerequisites'=>'IT-PROG2','type'=>'Lecture'],
            ['program_id'=>$bsit,'code'=>'IT-OOPL','title'=>'Object-Oriented Programming (Lab)','units'=>1,'semester'=>'2nd','year_level'=>2,'prerequisites'=>'IT-PROG2L','type'=>'Laboratory'],
            ['program_id'=>$bsit,'code'=>'IT-OS','title'=>'Operating Systems','units'=>3,'semester'=>'2nd','year_level'=>2,'prerequisites'=>'IT-CS1','type'=>'Lecture'],
            ['program_id'=>$bsit,'code'=>'IT-SAD','title'=>'Systems Analysis and Design','units'=>3,'semester'=>'2nd','year_level'=>2,'prerequisites'=>'IT-DB1','type'=>'Lecture'],
            ['program_id'=>$bsit,'code'=>'IT-WEB1','title'=>'Web Development 1','units'=>3,'semester'=>'2nd','year_level'=>2,'prerequisites'=>'IT-PROG1','type'=>'Lecture & Lab'],
            ['program_id'=>$bsit,'code'=>'IT-NET2','title'=>'Network Administration','units'=>3,'semester'=>'2nd','year_level'=>2,'prerequisites'=>'IT-NET1','type'=>'Lecture & Lab'],

            // Year 3 — 1st Semester
            ['program_id'=>$bsit,'code'=>'IT-WEB2','title'=>'Web Development 2','units'=>3,'semester'=>'1st','year_level'=>3,'prerequisites'=>'IT-WEB1','type'=>'Lecture & Lab'],
            ['program_id'=>$bsit,'code'=>'IT-MOBILE','title'=>'Mobile Application Development','units'=>3,'semester'=>'1st','year_level'=>3,'prerequisites'=>'IT-OOP','type'=>'Lecture & Lab'],
            ['program_id'=>$bsit,'code'=>'IT-SEC','title'=>'Information Security','units'=>3,'semester'=>'1st','year_level'=>3,'prerequisites'=>'IT-NET1','type'=>'Lecture'],
            ['program_id'=>$bsit,'code'=>'IT-PM','title'=>'IT Project Management','units'=>3,'semester'=>'1st','year_level'=>3,'prerequisites'=>'IT-SAD','type'=>'Lecture'],
            ['program_id'=>$bsit,'code'=>'IT-CLOUD','title'=>'Cloud Computing','units'=>3,'semester'=>'1st','year_level'=>3,'prerequisites'=>'IT-NET2','type'=>'Lecture & Lab'],
            ['program_id'=>$bsit,'code'=>'IT-HCI','title'=>'Human-Computer Interaction','units'=>3,'semester'=>'1st','year_level'=>3,'prerequisites'=>'IT-WEB1','type'=>'Lecture'],

            // Year 3 — 2nd Semester
            ['program_id'=>$bsit,'code'=>'IT-BI','title'=>'Business Intelligence and Analytics','units'=>3,'semester'=>'2nd','year_level'=>3,'prerequisites'=>'IT-DB1','type'=>'Lecture & Lab'],
            ['program_id'=>$bsit,'code'=>'IT-SE','title'=>'Software Engineering','units'=>3,'semester'=>'2nd','year_level'=>3,'prerequisites'=>'IT-SAD','type'=>'Lecture'],
            ['program_id'=>$bsit,'code'=>'IT-IOT','title'=>'Internet of Things','units'=>3,'semester'=>'2nd','year_level'=>3,'prerequisites'=>'IT-NET1','type'=>'Lecture & Lab'],
            ['program_id'=>$bsit,'code'=>'IT-ETHICS','title'=>'IT Ethics and Professionalism','units'=>3,'semester'=>'2nd','year_level'=>3,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bsit,'code'=>'IT-ELEC1','title'=>'Elective 1 (IT Specialization)','units'=>3,'semester'=>'2nd','year_level'=>3,'prerequisites'=>'None','type'=>'Lecture & Lab'],

            // Year 4 — 1st Semester
            ['program_id'=>$bsit,'code'=>'IT-CAPSTONE1','title'=>'Capstone Project 1','units'=>3,'semester'=>'1st','year_level'=>4,'prerequisites'=>'IT-SE','type'=>'Lecture & Lab'],
            ['program_id'=>$bsit,'code'=>'IT-ELEC2','title'=>'Elective 2 (IT Specialization)','units'=>3,'semester'=>'1st','year_level'=>4,'prerequisites'=>'IT-ELEC1','type'=>'Lecture & Lab'],
            ['program_id'=>$bsit,'code'=>'IT-TECH-WRITING','title'=>'Technical Writing','units'=>3,'semester'=>'1st','year_level'=>4,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bsit,'code'=>'IT-SEMINAR','title'=>'IT Trends and Emerging Technologies','units'=>3,'semester'=>'1st','year_level'=>4,'prerequisites'=>'None','type'=>'Lecture'],

            // Year 4 — 2nd Semester
            ['program_id'=>$bsit,'code'=>'IT-CAPSTONE2','title'=>'Capstone Project 2','units'=>3,'semester'=>'2nd','year_level'=>4,'prerequisites'=>'IT-CAPSTONE1','type'=>'Lecture & Lab'],
            ['program_id'=>$bsit,'code'=>'IT-OJT','title'=>'On-the-Job Training / Internship','units'=>6,'semester'=>'2nd','year_level'=>4,'prerequisites'=>'IT-CAPSTONE1','type'=>'Lecture'],

            // ─────────────────────────────────────────────────────────────────
            // BSCS — Year 1
            // ─────────────────────────────────────────────────────────────────
        ];

        // ── BSCS ──────────────────────────────────────────────────────────────
        $bscs = $prog('BSCS');
        $subjects = array_merge($subjects, [
            // Year 1 — 1st Semester
            ['program_id'=>$bscs,'code'=>'CS-GEC1','title'=>'Understanding the Self','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bscs,'code'=>'CS-GEC2','title'=>'Readings in Philippine History','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bscs,'code'=>'CS-MATH1','title'=>'Calculus 1','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bscs,'code'=>'CS-CS1','title'=>'Introduction to Computer Science','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bscs,'code'=>'CS-CS1L','title'=>'Introduction to Computer Science (Lab)','units'=>1,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Laboratory'],
            ['program_id'=>$bscs,'code'=>'CS-ENG1','title'=>'Purposive Communication','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bscs,'code'=>'CS-PE1','title'=>'Physical Education 1','units'=>2,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],

            // Year 1 — 2nd Semester
            ['program_id'=>$bscs,'code'=>'CS-GEC3','title'=>'The Contemporary World','units'=>3,'semester'=>'2nd','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bscs,'code'=>'CS-MATH2','title'=>'Calculus 2','units'=>3,'semester'=>'2nd','year_level'=>1,'prerequisites'=>'CS-MATH1','type'=>'Lecture'],
            ['program_id'=>$bscs,'code'=>'CS-PROG1','title'=>'Programming 1 (Python)','units'=>3,'semester'=>'2nd','year_level'=>1,'prerequisites'=>'CS-CS1','type'=>'Lecture'],
            ['program_id'=>$bscs,'code'=>'CS-PROG1L','title'=>'Programming 1 (Lab)','units'=>1,'semester'=>'2nd','year_level'=>1,'prerequisites'=>'CS-CS1L','type'=>'Laboratory'],
            ['program_id'=>$bscs,'code'=>'CS-DISCMATH','title'=>'Discrete Mathematics','units'=>3,'semester'=>'2nd','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bscs,'code'=>'CS-PE2','title'=>'Physical Education 2','units'=>2,'semester'=>'2nd','year_level'=>1,'prerequisites'=>'CS-PE1','type'=>'Lecture'],

            // Year 2 — 1st Semester
            ['program_id'=>$bscs,'code'=>'CS-DS','title'=>'Data Structures','units'=>3,'semester'=>'1st','year_level'=>2,'prerequisites'=>'CS-PROG1','type'=>'Lecture'],
            ['program_id'=>$bscs,'code'=>'CS-DSL','title'=>'Data Structures (Lab)','units'=>1,'semester'=>'1st','year_level'=>2,'prerequisites'=>'CS-PROG1L','type'=>'Laboratory'],
            ['program_id'=>$bscs,'code'=>'CS-ALGO','title'=>'Design and Analysis of Algorithms','units'=>3,'semester'=>'1st','year_level'=>2,'prerequisites'=>'CS-DS','type'=>'Lecture'],
            ['program_id'=>$bscs,'code'=>'CS-OOP','title'=>'Object-Oriented Programming (Java)','units'=>3,'semester'=>'1st','year_level'=>2,'prerequisites'=>'CS-PROG1','type'=>'Lecture'],
            ['program_id'=>$bscs,'code'=>'CS-OOPL','title'=>'Object-Oriented Programming (Lab)','units'=>1,'semester'=>'1st','year_level'=>2,'prerequisites'=>'CS-PROG1L','type'=>'Laboratory'],
            ['program_id'=>$bscs,'code'=>'CS-LINALG','title'=>'Linear Algebra','units'=>3,'semester'=>'1st','year_level'=>2,'prerequisites'=>'CS-MATH2','type'=>'Lecture'],
            ['program_id'=>$bscs,'code'=>'CS-STAT','title'=>'Probability and Statistics','units'=>3,'semester'=>'1st','year_level'=>2,'prerequisites'=>'CS-MATH1','type'=>'Lecture'],

            // Year 2 — 2nd Semester
            ['program_id'=>$bscs,'code'=>'CS-OS','title'=>'Operating Systems','units'=>3,'semester'=>'2nd','year_level'=>2,'prerequisites'=>'CS-DS','type'=>'Lecture'],
            ['program_id'=>$bscs,'code'=>'CS-DB','title'=>'Database Systems','units'=>3,'semester'=>'2nd','year_level'=>2,'prerequisites'=>'CS-OOP','type'=>'Lecture'],
            ['program_id'=>$bscs,'code'=>'CS-DBL','title'=>'Database Systems (Lab)','units'=>1,'semester'=>'2nd','year_level'=>2,'prerequisites'=>'CS-OOPL','type'=>'Laboratory'],
            ['program_id'=>$bscs,'code'=>'CS-AUTOMATA','title'=>'Automata Theory and Formal Languages','units'=>3,'semester'=>'2nd','year_level'=>2,'prerequisites'=>'CS-DISCMATH','type'=>'Lecture'],
            ['program_id'=>$bscs,'code'=>'CS-NET','title'=>'Computer Networks','units'=>3,'semester'=>'2nd','year_level'=>2,'prerequisites'=>'CS-OS','type'=>'Lecture'],
            ['program_id'=>$bscs,'code'=>'CS-COMPORG','title'=>'Computer Organization and Architecture','units'=>3,'semester'=>'2nd','year_level'=>2,'prerequisites'=>'CS-OS','type'=>'Lecture'],

            // Year 3 — 1st Semester
            ['program_id'=>$bscs,'code'=>'CS-ML','title'=>'Machine Learning','units'=>3,'semester'=>'1st','year_level'=>3,'prerequisites'=>'CS-STAT, CS-LINALG','type'=>'Lecture & Lab'],
            ['program_id'=>$bscs,'code'=>'CS-AI','title'=>'Artificial Intelligence','units'=>3,'semester'=>'1st','year_level'=>3,'prerequisites'=>'CS-ALGO','type'=>'Lecture & Lab'],
            ['program_id'=>$bscs,'code'=>'CS-SE','title'=>'Software Engineering','units'=>3,'semester'=>'1st','year_level'=>3,'prerequisites'=>'CS-DB','type'=>'Lecture'],
            ['program_id'=>$bscs,'code'=>'CS-COMPSEC','title'=>'Computer Security','units'=>3,'semester'=>'1st','year_level'=>3,'prerequisites'=>'CS-NET','type'=>'Lecture'],
            ['program_id'=>$bscs,'code'=>'CS-GRAPHICS','title'=>'Computer Graphics and Visualization','units'=>3,'semester'=>'1st','year_level'=>3,'prerequisites'=>'CS-LINALG','type'=>'Lecture & Lab'],

            // Year 3 — 2nd Semester
            ['program_id'=>$bscs,'code'=>'CS-NLP','title'=>'Natural Language Processing','units'=>3,'semester'=>'2nd','year_level'=>3,'prerequisites'=>'CS-ML','type'=>'Lecture & Lab'],
            ['program_id'=>$bscs,'code'=>'CS-PARALLEL','title'=>'Parallel and Distributed Computing','units'=>3,'semester'=>'2nd','year_level'=>3,'prerequisites'=>'CS-OS','type'=>'Lecture'],
            ['program_id'=>$bscs,'code'=>'CS-CLOUD','title'=>'Cloud Architecture','units'=>3,'semester'=>'2nd','year_level'=>3,'prerequisites'=>'CS-NET','type'=>'Lecture & Lab'],
            ['program_id'=>$bscs,'code'=>'CS-ETHICS','title'=>'Professional Ethics in Computing','units'=>3,'semester'=>'2nd','year_level'=>3,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bscs,'code'=>'CS-ELEC1','title'=>'Elective 1 (CS Specialization)','units'=>3,'semester'=>'2nd','year_level'=>3,'prerequisites'=>'None','type'=>'Lecture & Lab'],

            // Year 4 — 1st Semester
            ['program_id'=>$bscs,'code'=>'CS-THESIS1','title'=>'Thesis Writing 1','units'=>3,'semester'=>'1st','year_level'=>4,'prerequisites'=>'CS-SE','type'=>'Lecture'],
            ['program_id'=>$bscs,'code'=>'CS-ELEC2','title'=>'Elective 2 (CS Specialization)','units'=>3,'semester'=>'1st','year_level'=>4,'prerequisites'=>'CS-ELEC1','type'=>'Lecture & Lab'],
            ['program_id'=>$bscs,'code'=>'CS-TECHCOMM','title'=>'Technical Communication','units'=>3,'semester'=>'1st','year_level'=>4,'prerequisites'=>'None','type'=>'Lecture'],

            // Year 4 — 2nd Semester
            ['program_id'=>$bscs,'code'=>'CS-THESIS2','title'=>'Thesis Writing 2','units'=>3,'semester'=>'2nd','year_level'=>4,'prerequisites'=>'CS-THESIS1','type'=>'Lecture'],
            ['program_id'=>$bscs,'code'=>'CS-INTERN','title'=>'Internship','units'=>6,'semester'=>'2nd','year_level'=>4,'prerequisites'=>'CS-THESIS1','type'=>'Lecture'],
        ]);

        // ── BSN — Bachelor of Science in Nursing ─────────────────────────────
        $bsn = $prog('BSN');
        $subjects = array_merge($subjects, [
            ['program_id'=>$bsn,'code'=>'NSG-GEC1','title'=>'Understanding the Self','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bsn,'code'=>'NSG-ANAT','title'=>'Anatomy and Physiology','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bsn,'code'=>'NSG-ANAT-L','title'=>'Anatomy and Physiology (Lab)','units'=>1,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Laboratory'],
            ['program_id'=>$bsn,'code'=>'NSG-BIO','title'=>'Microbiology and Parasitology','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bsn,'code'=>'NSG-BIO-L','title'=>'Microbiology and Parasitology (Lab)','units'=>1,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Laboratory'],
            ['program_id'=>$bsn,'code'=>'NSG-COMM','title'=>'Purposive Communication','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bsn,'code'=>'NSG-CHEM','title'=>'Biochemistry','units'=>3,'semester'=>'2nd','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bsn,'code'=>'NSG-NFS1','title'=>'Fundamentals of Nursing','units'=>3,'semester'=>'2nd','year_level'=>1,'prerequisites'=>'NSG-ANAT','type'=>'Lecture'],
            ['program_id'=>$bsn,'code'=>'NSG-NFS1-L','title'=>'Fundamentals of Nursing (RLE)','units'=>3,'semester'=>'2nd','year_level'=>1,'prerequisites'=>'NSG-ANAT-L','type'=>'Laboratory'],
            ['program_id'=>$bsn,'code'=>'NSG-NUTR','title'=>'Nutrition and Diet Therapy','units'=>3,'semester'=>'2nd','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bsn,'code'=>'NSG-PHARM1','title'=>'Pharmacology 1','units'=>3,'semester'=>'1st','year_level'=>2,'prerequisites'=>'NSG-NFS1','type'=>'Lecture'],
            ['program_id'=>$bsn,'code'=>'NSG-MED-SURG1','title'=>'Medical-Surgical Nursing 1','units'=>3,'semester'=>'1st','year_level'=>2,'prerequisites'=>'NSG-NFS1','type'=>'Lecture'],
            ['program_id'=>$bsn,'code'=>'NSG-MED-SURG1-L','title'=>'Medical-Surgical Nursing 1 (RLE)','units'=>3,'semester'=>'1st','year_level'=>2,'prerequisites'=>'NSG-NFS1-L','type'=>'Laboratory'],
            ['program_id'=>$bsn,'code'=>'NSG-PHARM2','title'=>'Pharmacology 2','units'=>3,'semester'=>'2nd','year_level'=>2,'prerequisites'=>'NSG-PHARM1','type'=>'Lecture'],
            ['program_id'=>$bsn,'code'=>'NSG-MED-SURG2','title'=>'Medical-Surgical Nursing 2','units'=>3,'semester'=>'2nd','year_level'=>2,'prerequisites'=>'NSG-MED-SURG1','type'=>'Lecture'],
            ['program_id'=>$bsn,'code'=>'NSG-MED-SURG2-L','title'=>'Medical-Surgical Nursing 2 (RLE)','units'=>3,'semester'=>'2nd','year_level'=>2,'prerequisites'=>'NSG-MED-SURG1-L','type'=>'Laboratory'],
            ['program_id'=>$bsn,'code'=>'NSG-MCN','title'=>'Maternal and Child Nursing','units'=>3,'semester'=>'1st','year_level'=>3,'prerequisites'=>'NSG-MED-SURG2','type'=>'Lecture'],
            ['program_id'=>$bsn,'code'=>'NSG-MCN-L','title'=>'Maternal and Child Nursing (RLE)','units'=>3,'semester'=>'1st','year_level'=>3,'prerequisites'=>'NSG-MED-SURG2-L','type'=>'Laboratory'],
            ['program_id'=>$bsn,'code'=>'NSG-PSYCH-NURSING','title'=>'Psychiatric and Mental Health Nursing','units'=>3,'semester'=>'2nd','year_level'=>3,'prerequisites'=>'NSG-MED-SURG2','type'=>'Lecture'],
            ['program_id'=>$bsn,'code'=>'NSG-COMMHEALTH','title'=>'Community Health Nursing','units'=>3,'semester'=>'1st','year_level'=>4,'prerequisites'=>'NSG-MCN','type'=>'Lecture'],
            ['program_id'=>$bsn,'code'=>'NSG-LEADERSHIP','title'=>'Nursing Leadership and Management','units'=>3,'semester'=>'2nd','year_level'=>4,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bsn,'code'=>'NSG-RESEARCH','title'=>'Nursing Research','units'=>3,'semester'=>'2nd','year_level'=>4,'prerequisites'=>'None','type'=>'Lecture'],
        ]);

        // ── BSCRIM ────────────────────────────────────────────────────────────
        $bscrim = $prog('BSCRIM');
        $subjects = array_merge($subjects, [
            ['program_id'=>$bscrim,'code'=>'CRIM-GEC1','title'=>'Understanding the Self','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bscrim,'code'=>'CRIM-INTRO','title'=>'Introduction to Criminology','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bscrim,'code'=>'CRIM-SOC','title'=>'Sociology of Crimes and Ethics','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bscrim,'code'=>'CRIM-CRIMLAW1','title'=>'Criminal Law 1 (RPC Book 1)','units'=>3,'semester'=>'2nd','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bscrim,'code'=>'CRIM-CRIMLAW2','title'=>'Criminal Law 2 (RPC Book 2)','units'=>3,'semester'=>'1st','year_level'=>2,'prerequisites'=>'CRIM-CRIMLAW1','type'=>'Lecture'],
            ['program_id'=>$bscrim,'code'=>'CRIM-CRIMINO','title'=>'Criminology (Theories of Crime)','units'=>3,'semester'=>'1st','year_level'=>2,'prerequisites'=>'CRIM-INTRO','type'=>'Lecture'],
            ['program_id'=>$bscrim,'code'=>'CRIM-FORENSIC','title'=>'Forensic Science','units'=>3,'semester'=>'2nd','year_level'=>2,'prerequisites'=>'None','type'=>'Lecture & Lab'],
            ['program_id'=>$bscrim,'code'=>'CRIM-FINGERPRINT','title'=>'Dactyloscopy (Fingerprinting)','units'=>3,'semester'=>'1st','year_level'=>3,'prerequisites'=>'CRIM-FORENSIC','type'=>'Lecture & Lab'],
            ['program_id'=>$bscrim,'code'=>'CRIM-INVEST','title'=>'Criminal Investigation and Detection','units'=>3,'semester'=>'2nd','year_level'=>3,'prerequisites'=>'CRIM-CRIMLAW2','type'=>'Lecture'],
            ['program_id'=>$bscrim,'code'=>'CRIM-PENOLOGY','title'=>'Penology and Correctional Administration','units'=>3,'semester'=>'1st','year_level'=>4,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bscrim,'code'=>'CRIM-POLICE','title'=>'Police Organization and Administration','units'=>3,'semester'=>'2nd','year_level'=>4,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bscrim,'code'=>'CRIM-THESIS','title'=>'Thesis / Practicum','units'=>6,'semester'=>'2nd','year_level'=>4,'prerequisites'=>'None','type'=>'Lecture'],
        ]);

        // ── BSTM ─────────────────────────────────────────────────────────────
        $bstm = $prog('BSTM');
        $subjects = array_merge($subjects, [
            ['program_id'=>$bstm,'code'=>'TM-GEC1','title'=>'Understanding the Self','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bstm,'code'=>'TM-INTRO','title'=>'Introduction to Tourism and Hospitality','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bstm,'code'=>'TM-COMM','title'=>'Purposive Communication','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bstm,'code'=>'TM-TOUR-OPS','title'=>'Tour Operations Management','units'=>3,'semester'=>'2nd','year_level'=>1,'prerequisites'=>'TM-INTRO','type'=>'Lecture'],
            ['program_id'=>$bstm,'code'=>'TM-TRAVEL','title'=>'Travel Agency and Tour Operations','units'=>3,'semester'=>'1st','year_level'=>2,'prerequisites'=>'TM-TOUR-OPS','type'=>'Lecture'],
            ['program_id'=>$bstm,'code'=>'TM-CULTURE','title'=>'Philippine Culture and Heritage Tourism','units'=>3,'semester'=>'1st','year_level'=>2,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bstm,'code'=>'TM-HOTEL','title'=>'Hotel Operations Management','units'=>3,'semester'=>'2nd','year_level'=>2,'prerequisites'=>'TM-INTRO','type'=>'Lecture'],
            ['program_id'=>$bstm,'code'=>'TM-ECOTOUR','title'=>'Eco-Tourism','units'=>3,'semester'=>'1st','year_level'=>3,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bstm,'code'=>'TM-EVENT','title'=>'Events Management','units'=>3,'semester'=>'2nd','year_level'=>3,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bstm,'code'=>'TM-MARKETING','title'=>'Tourism Marketing','units'=>3,'semester'=>'1st','year_level'=>4,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bstm,'code'=>'TM-THESIS','title'=>'Thesis','units'=>6,'semester'=>'2nd','year_level'=>4,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bstm,'code'=>'TM-OJT','title'=>'Practicum / On-the-Job Training','units'=>6,'semester'=>'2nd','year_level'=>4,'prerequisites'=>'TM-HOTEL','type'=>'Lecture'],
        ]);

        // ── BSBA-FM ───────────────────────────────────────────────────────────
        $bsbafm = $prog('BSBA-FM');
        $subjects = array_merge($subjects, [
            ['program_id'=>$bsbafm,'code'=>'BA-GEC1','title'=>'Understanding the Self','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bsbafm,'code'=>'BA-MGMT1','title'=>'Principles of Management','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bsbafm,'code'=>'BA-ECON1','title'=>'Microeconomics','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bsbafm,'code'=>'BA-ACCTG1','title'=>'Financial Accounting 1','units'=>3,'semester'=>'2nd','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bsbafm,'code'=>'BA-ECON2','title'=>'Macroeconomics','units'=>3,'semester'=>'2nd','year_level'=>1,'prerequisites'=>'BA-ECON1','type'=>'Lecture'],
            ['program_id'=>$bsbafm,'code'=>'BA-ACCTG2','title'=>'Financial Accounting 2','units'=>3,'semester'=>'1st','year_level'=>2,'prerequisites'=>'BA-ACCTG1','type'=>'Lecture'],
            ['program_id'=>$bsbafm,'code'=>'BA-FINMGMT','title'=>'Financial Management','units'=>3,'semester'=>'2nd','year_level'=>2,'prerequisites'=>'BA-ACCTG2','type'=>'Lecture'],
            ['program_id'=>$bsbafm,'code'=>'BA-INVEST','title'=>'Investment Management','units'=>3,'semester'=>'1st','year_level'=>3,'prerequisites'=>'BA-FINMGMT','type'=>'Lecture'],
            ['program_id'=>$bsbafm,'code'=>'BA-BANKING','title'=>'Banking and Financial Institutions','units'=>3,'semester'=>'2nd','year_level'=>3,'prerequisites'=>'BA-FINMGMT','type'=>'Lecture'],
            ['program_id'=>$bsbafm,'code'=>'BA-CORPFIN','title'=>'Corporate Finance','units'=>3,'semester'=>'1st','year_level'=>4,'prerequisites'=>'BA-INVEST','type'=>'Lecture'],
            ['program_id'=>$bsbafm,'code'=>'BA-THESIS','title'=>'Business Research','units'=>6,'semester'=>'2nd','year_level'=>4,'prerequisites'=>'None','type'=>'Lecture'],
        ]);

        // ── BEED ──────────────────────────────────────────────────────────────
        $beed = $prog('BEED');
        $subjects = array_merge($subjects, [
            ['program_id'=>$beed,'code'=>'ED-GEC1','title'=>'Understanding the Self','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$beed,'code'=>'ED-FUNDA','title'=>'Foundation of Education','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$beed,'code'=>'ED-CHILD-DEV','title'=>'Child and Adolescent Development','units'=>3,'semester'=>'2nd','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$beed,'code'=>'ED-CURRIC','title'=>'The Child and the School Curriculum','units'=>3,'semester'=>'1st','year_level'=>2,'prerequisites'=>'ED-CHILD-DEV','type'=>'Lecture'],
            ['program_id'=>$beed,'code'=>'ED-ASSESS','title'=>'Assessment of Student Learning','units'=>3,'semester'=>'2nd','year_level'=>2,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$beed,'code'=>'ED-MATH-ELEM','title'=>'Mathematics in the Elementary Curriculum','units'=>3,'semester'=>'1st','year_level'=>3,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$beed,'code'=>'ED-SCIENCE-ELEM','title'=>'Science in the Elementary Curriculum','units'=>3,'semester'=>'1st','year_level'=>3,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$beed,'code'=>'ED-FIELD-STUDY','title'=>'Field Study 1 (Observation and Participation)','units'=>3,'semester'=>'2nd','year_level'=>3,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$beed,'code'=>'ED-PRACTICE-TEACH','title'=>'Practice Teaching (Student Teaching)','units'=>6,'semester'=>'2nd','year_level'=>4,'prerequisites'=>'ED-FIELD-STUDY','type'=>'Lecture'],
            ['program_id'=>$beed,'code'=>'ED-THESIS','title'=>'Undergraduate Thesis','units'=>3,'semester'=>'2nd','year_level'=>4,'prerequisites'=>'None','type'=>'Lecture'],
        ]);

        // ── BSPSYCH ───────────────────────────────────────────────────────────
        $bspsych = $prog('BSPSYCH');
        $subjects = array_merge($subjects, [
            ['program_id'=>$bspsych,'code'=>'PSY-INTRO','title'=>'Introduction to Psychology','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bspsych,'code'=>'PSY-GEC1','title'=>'Understanding the Self','units'=>3,'semester'=>'1st','year_level'=>1,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bspsych,'code'=>'PSY-BIO','title'=>'Biological Bases of Behavior','units'=>3,'semester'=>'2nd','year_level'=>1,'prerequisites'=>'PSY-INTRO','type'=>'Lecture'],
            ['program_id'=>$bspsych,'code'=>'PSY-DEV','title'=>'Developmental Psychology','units'=>3,'semester'=>'1st','year_level'=>2,'prerequisites'=>'PSY-INTRO','type'=>'Lecture'],
            ['program_id'=>$bspsych,'code'=>'PSY-SOC','title'=>'Social Psychology','units'=>3,'semester'=>'2nd','year_level'=>2,'prerequisites'=>'PSY-INTRO','type'=>'Lecture'],
            ['program_id'=>$bspsych,'code'=>'PSY-RESEARCH','title'=>'Research Methods in Psychology','units'=>3,'semester'=>'1st','year_level'=>3,'prerequisites'=>'None','type'=>'Lecture'],
            ['program_id'=>$bspsych,'code'=>'PSY-ABNORMAL','title'=>'Abnormal Psychology','units'=>3,'semester'=>'2nd','year_level'=>3,'prerequisites'=>'PSY-DEV','type'=>'Lecture'],
            ['program_id'=>$bspsych,'code'=>'PSY-COUNSEL','title'=>'Counseling Psychology','units'=>3,'semester'=>'1st','year_level'=>4,'prerequisites'=>'PSY-ABNORMAL','type'=>'Lecture'],
            ['program_id'=>$bspsych,'code'=>'PSY-THESIS','title'=>'Psychological Research (Thesis)','units'=>6,'semester'=>'2nd','year_level'=>4,'prerequisites'=>'PSY-RESEARCH','type'=>'Lecture'],
        ]);

        // Chunk and insert
        foreach (array_chunk($subjects, 50) as $chunk) {
            Subject::insert(array_map(function ($s) {
                $now = now();
                return array_merge($s, ['created_at' => $now, 'updated_at' => $now]);
            }, $chunk));
        }
    }
}