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
                'fullName' => 'Jayson Butawan Magdadaro',
                'dateOfBirth' => '2002-02-05',
                'age' => 17,
                'gender' => 'Male',
                'nationality' => 'Filipino',
                'civilStatus' => 'Complicated',
                'address' => 'Tagum City, Philippines',
                'contactNumber' => '093574400148',
                'emailAddress' => 'jaysonbutawan2@gmail.com',
            ],
            'objective' => [
                'careerObjective' => 'Failure is an event not a personal.',
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
                    'companyName' => 'Work at crusty crab',
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
                'message' => 'Invalid route parameter.'
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
