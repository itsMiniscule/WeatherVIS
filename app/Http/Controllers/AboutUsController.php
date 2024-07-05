<?php

// app/Http/Controllers/AboutUsController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        // Assuming you have a database of team members, you can fetch them here
        $teamMembers = [
            ['name' => 'John Doe', 'position' => 'CEO', 'image' => 'john.jpg', 'description' => 'John is the CEO with over 20 years of experience.'],
            ['name' => 'Jane Smith', 'position' => 'CTO', 'image' => 'jane.jpg', 'description' => 'Jane is the CTO with a passion for technology.'],
            // Add more team members
        ];

        return view('about-us', compact('teamMembers'));
    }
}
