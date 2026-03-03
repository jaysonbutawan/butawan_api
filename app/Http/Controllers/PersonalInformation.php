<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalInformation extends Controller
{
    private array $allSections = ['personal', 'objective', 'education', 'work', 'skills', 'certifications'];

    private function bioData(): array
    {
        return [
            'personal' => [
                'FullName: Jayson Butawan Magdadaro',
                'DateOfBirth: 2002-02-05',
                'Age: 17',
                'Gender: Male',
                'Nationality: Filipino',
                'CivilStatus: Complicated',
                'Address: Tagum City, Philippines',
                'ContactNumber: 093574400148',
                'EmailAddress: jaysonbutawan2@gmail.com',
            ],
            'objective' => [
                'Failure is an event not a personal.',
                'No pain no gain.',
                'The only way to do great work is to love what you do.',
            ],
            'education' => [
                [
                    'Course: Bachelor of Science in Information Technology',
                    'schoolName: ACES TAGUM COLLEGE',
                    'yearGraduated: 2027',
                ],
                [
                    'Course: Senior High School',
                    'schoolName: KNHS',
                    'yearGraduated: 2023',
                ],
            ],
            'work' => [
                [
                    'JobTitle: Student fullstack Developer',
                    'CompanyName: Work at crusty crab',
                    'duration' => ['from' => '2017', 'to' => '2035'],
                    'keyResponsibilities' => [
                        'Developed Flutter applications and integrated Node.js backend services',
                        'Fixed bugs and improved app performance',
                    ],
                ],
            ],
            'skills' => [
                'Programming: Flutter, Angular, Node.js, Express, Laravel',
                'Database: PostgreSQL, MySQL',
                'Soft Skills: Communication, Teamwork',
            ],
            'certifications' => [
                [
                    'title: Flutter & Dart - The Complete Guide',
                    'provider: Udemy',
                    'year: 2025',
                ],
            ],
        ];
    }

    public function index(Request $request)
    {
        $bioData = $this->bioData();

        $sectionsParam = $request->query('sections');
        if (!$sectionsParam) {
            return response()->json([
                'Butawan Jayson Bio Data' => $bioData,
            ], 200);
        }

        $requested = array_filter(array_map(
            fn($s) => strtolower(trim($s)),
            explode(',', $sectionsParam)
        ));

        $requestedValid = array_values(array_intersect($requested, $this->allSections));

        if (count($requestedValid) === 0) {
            return response()->json(['message' => 'Invalid sections parameter.'], 400);
        }

        $filtered = [];
        foreach ($requestedValid as $key) {
            $filtered[$key] = $bioData[$key];
        }

        return response()->json([
            'Butawan Jayson Bio Data' => $filtered,
        ], 200);
    }

    public function show(string $section)
    {
        $section = strtolower(trim($section));

        if (!in_array($section, $this->allSections, true)) {
            return response()->json([
                'message' => 'Invalid route parameter. Valid: ' . implode(', ', $this->allSections),
            ], 400);
        }

        $bioData = $this->bioData();

        return response()->json([
            'Butawan Jayson Bio Data' => [
                $section => $bioData[$section],
            ],
        ], 200);
    }
}
