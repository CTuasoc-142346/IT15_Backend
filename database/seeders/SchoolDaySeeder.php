<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class SchoolDaySeeder extends Seeder
{
    // ── Philippine public holidays (fixed-date) ────────────────
    private array $holidays = [
        // 2025
        '2025-01-01' => "New Year's Day",
        '2025-04-09' => 'Araw ng Kagitingan',
        '2025-04-17' => 'Maundy Thursday',
        '2025-04-18' => 'Good Friday',
        '2025-04-19' => 'Black Saturday',
        '2025-05-01' => "Labor Day",
        '2025-06-12' => 'Independence Day',
        '2025-08-25' => 'National Heroes Day',
        '2025-11-01' => "All Saints' Day",
        '2025-11-02' => "All Souls' Day",
        '2025-11-30' => "Bonifacio Day",
        '2025-12-08' => 'Feast of the Immaculate Conception',
        '2025-12-24' => 'Christmas Eve',
        '2025-12-25' => 'Christmas Day',
        '2025-12-30' => 'Rizal Day',
        '2025-12-31' => "New Year's Eve",
        // 2026
        '2026-01-01' => "New Year's Day",
        '2026-04-01' => 'Maundy Thursday',
        '2026-04-02' => 'Good Friday',
        '2026-04-03' => 'Black Saturday',
        '2026-05-01' => "Labor Day",
        '2026-06-12' => 'Independence Day',
        '2026-08-31' => 'National Heroes Day',
        '2026-11-01' => "All Saints' Day",
        '2026-11-02' => "All Souls' Day",
        '2026-11-30' => 'Bonifacio Day',
        '2026-12-08' => 'Feast of the Immaculate Conception',
        '2026-12-24' => 'Christmas Eve',
        '2026-12-25' => 'Christmas Day',
        '2026-12-30' => 'Rizal Day',
        '2026-12-31' => "New Year's Eve",
    ];

    // ── School-specific events ─────────────────────────────────
    private array $events = [
        // 1st Semester
        '2025-08-04' => ['title' => 'Opening of 1st Semester',         'type' => 'Event'],
        '2025-08-22' => ['title' => 'Founding Anniversary',            'type' => 'Event'],
        '2025-09-05' => ['title' => 'Sports Fest Day 1',               'type' => 'Event'],
        '2025-09-06' => ['title' => 'Sports Fest Day 2',               'type' => 'Event'],
        '2025-09-07' => ['title' => 'Sports Fest Day 3',               'type' => 'Event'],
        '2025-09-19' => ['title' => 'Midterm Examination (1st Sem)',    'type' => 'Exam'],
        '2025-09-20' => ['title' => 'Midterm Examination (1st Sem)',    'type' => 'Exam'],
        '2025-10-31' => ['title' => "All Saints' Day Eve — No Class",   'type' => 'No Class'],
        '2025-11-07' => ['title' => 'Final Examination (1st Sem)',      'type' => 'Exam'],
        '2025-11-08' => ['title' => 'Final Examination (1st Sem)',      'type' => 'Exam'],
        '2025-11-15' => ['title' => 'End of 1st Semester',             'type' => 'Event'],
        '2025-12-05' => ['title' => 'Christmas Party',                 'type' => 'Event'],
        // 2nd Semester
        '2026-01-05' => ['title' => 'Opening of 2nd Semester',         'type' => 'Event'],
        '2026-02-13' => ['title' => "Valentine's Week Celebration",    'type' => 'Event'],
        '2026-02-25' => ['title' => 'EDSA People Power Anniversary',   'type' => 'Holiday'],
        '2026-03-06' => ['title' => 'Midterm Examination (2nd Sem)',    'type' => 'Exam'],
        '2026-03-07' => ['title' => 'Midterm Examination (2nd Sem)',    'type' => 'Exam'],
        '2026-04-24' => ['title' => 'Final Examination (2nd Sem)',      'type' => 'Exam'],
        '2026-04-25' => ['title' => 'Final Examination (2nd Sem)',      'type' => 'Exam'],
        '2026-05-02' => ['title' => 'Graduation Ceremony',             'type' => 'Event'],
        '2026-05-08' => ['title' => 'End of 2nd Semester',             'type' => 'Event'],
        // Summer
        '2026-05-18' => ['title' => 'Opening of Summer Term',          'type' => 'Event'],
        '2026-06-19' => ['title' => 'Jose Rizal Birthday',             'type' => 'Holiday'],
        '2026-07-10' => ['title' => 'Final Exam — Summer',             'type' => 'Exam'],
        '2026-07-17' => ['title' => 'End of Summer Term',              'type' => 'Event'],
    ];

    public function run(): void
    {
        // Cover AY 2025-2026: August 2025 → July 2026
        $period = CarbonPeriod::create('2025-08-01', '2026-07-31');
        $rows   = [];

        foreach ($period as $date) {
            $dateStr  = $date->toDateString();
            $isWeekend = $date->isWeekend();

            // Determine semester
            $semester = match (true) {
                $date->between('2025-08-01', '2025-11-30') => '1st Semester',
                $date->between('2026-01-01', '2026-05-15') => '2nd Semester',
                $date->between('2026-05-16', '2026-07-31') => 'Summer',
                default                                     => null,
            };

            // Determine day type + title
            if (isset($this->events[$dateStr])) {
                $dayType = $this->events[$dateStr]['type'];
                $title   = $this->events[$dateStr]['title'];
                $desc    = null;
            } elseif (isset($this->holidays[$dateStr])) {
                $dayType = 'Holiday';
                $title   = $this->holidays[$dateStr];
                $desc    = 'Philippine public holiday — no classes.';
            } elseif ($isWeekend) {
                $dayType = 'No Class';
                $title   = 'Weekend';
                $desc    = null;
            } else {
                $dayType = 'Regular';
                $title   = null;
                $desc    = null;
            }

            // Attendance figures — only meaningful on Regular / Exam days
            $totalPresent = 0;
            $totalAbsent  = 0;
            $totalLate    = 0;

            if (in_array($dayType, ['Regular', 'Exam']) && !$isWeekend) {
                $totalPresent = rand(380, 510);
                $totalAbsent  = rand(10, 80);
                $totalLate    = rand(5, 40);
            }

            $rows[] = [
                'date'          => $dateStr,
                'day_type'      => $dayType,
                'title'         => $title,
                'description'   => $desc,
                'semester'      => $semester,
                'academic_year' => '2025-2026',
                'total_present' => $totalPresent,
                'total_absent'  => $totalAbsent,
                'total_late'    => $totalLate,
                'created_at'    => now(),
                'updated_at'    => now(),
            ];
        }

        foreach (array_chunk($rows, 100) as $chunk) {
            DB::table('school_days')->insertOrIgnore($chunk);
        }

        $this->command->info('✅  SchoolDaySeeder: ' . count($rows) . ' calendar days seeded.');
    }
}