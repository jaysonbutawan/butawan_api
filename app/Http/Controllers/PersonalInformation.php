<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonalInformation extends Controller
{

    public function index(Request $request)
    {
        $allSections = ['personal', 'objective', 'education', 'work', 'skills', 'certifications'];

        $bioData = [
            'personal' => [
                'fullName' => 'Juan Dela Cruz',
                'dateOfBirth' => '2003-01-01',
                'age' => 23,
                'gender' => 'Male',
                'nationality' => 'Filipino',
                'civilStatus' => 'Single',
                'address' => 'Manila, Philippines',
                'contactNumber' => '09123456789',
                'emailAddress' => 'juan@email.com',
            ],
            'objective' => [
                'careerObjective' => 'To obtain a challenging position where I can apply my skills in software development and grow professionally.',
            ],
            'education' => [
                [
                    'degreeOrCourse' => 'Bachelor of Science in Information Technology',
                    'schoolName' => 'ACES TAGUM COLLEGE',
                    'yearGraduated' => 2027,
                ],
                [
                    'degreeOrCourse' => 'Senior High School',
                    'schoolName' => 'KNHS',
                    'yearGraduated' => 2023,
                ],
            ],
            'work' => [
                [
                    'jobTitle' => 'Student fullstack Developer',
                    'companyName' => 'SOCIAL MEDIA APP',
                    'duration' => ['from' => '2017', 'to' => '2035'],
                    'keyResponsibilities' => [
                        'Developed Flutter applications and integrated Node.js backend services',
                        'Fixed bugs and improved app performance',
                    ],
                ],
            ],
            'skills' => [
                'programming' => ['Flutter', 'Angular', 'Node.js', 'Express','Laravel'],
                'database' => ['PostgreSQL', 'SQLite','MySQL'],
                'softSkills' => ['Communication', 'Teamwork'],
            ],
            'certifications' => [
                [
                    'title' => 'Flutter & Dart - The Complete Guide',
                    'provider' => 'Udemy',
                    'year' => 2025,
                ],
            ],
        ];

        $sectionsParam = $request->query('sections');

        if (!$sectionsParam) {
            return response()->json([
                'requestedSections' => $allSections,
                'data' => $bioData,
            ], 200);
        }

        $requested = array_filter(array_map(
            fn ($s) => strtolower(trim($s)),
            explode(',', $sectionsParam)
        ));

        $requestedValid = array_values(array_intersect($requested, $allSections));

        if (count($requestedValid) === 0) {
            return response()->json([
                'message' => 'Invalid sections parameter.',
                'allowedSections' => $allSections,
                'example' => '/api/biodata?sections=personal,objective,education',
            ], 400);
        }

        $filtered = [];
        foreach ($requestedValid as $key) {
            $filtered[$key] = $bioData[$key];
        }

        return response()->json([
            'requestedSections' => $requestedValid,
            'data' => $filtered,
        ], 200);
    }
}
