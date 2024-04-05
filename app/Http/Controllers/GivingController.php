<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Giving;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class GivingController extends Controller
{
    public function index()
    {
        if (Auth()->user()->roles == 'admin') {
            $givings = Giving::paginate(5);
            return view('pages.admin.giving.give', compact('givings'));
        } else {
            $user = Auth::user();

            // Check if the user is authenticated
            if ($user) {
                // Retrieve data for the authenticated user

                $givings = Giving::join('users', 'giving.user_id', '=', 'users.id')
                    ->where('users.email', $user->email)
                    ->paginate(5);
                return view('pages.members.giving.give', compact('givings'));
            }
        }
    }
    public function create()
    {
        $members = User::all();
        $givings = Giving::all();
        return view('pages.admin.giving.create', compact('members', 'givings'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string|max:255',

        ]);
        Giving::create($request->all());
        return redirect()->route('giving.view')->with('success', 'Giving added Successfully');
    }
    public function getYearlyGivingData()
    {
        // Query total amount received per year from the giving table
        $givingData = DB::table('giving')
            ->select(DB::raw('YEAR(created_at) as year'), DB::raw('SUM(amount) as total_amount'))
            ->groupBy(DB::raw('YEAR(created_at)'))
            ->get();

        // Return data as JSON
        return response()->json($givingData);
    }
    public function getTypeWiseGivingData()
    {
        // Query total amount received per type from the giving table
        $givingData = DB::table('giving')
            ->select('type', DB::raw('SUM(amount) as total_amount'))
            ->groupBy('type')
            ->get();

        // Return data as JSON
        return response()->json($givingData);
    }
    public function destroy(Giving $giving)
    {
        $giving->delete();
        return redirect()->route('giving.view')->with('success', 'Deleted Successfully');
    }
    public function edit(Giving $giving)
    {
        return view('pages.admin.announcements.edit', compact('announcements'));
    }
}
public function generatePDF()
    {
        $positions = Position::all();
        $candidates = Candidate::all();

        $pdf = new TCPDF();
        $pdf->SetMargins(10, 10, 10);
        $pdf->AddPage();

        $pdf->SetFont('helvetica', 'B', 10);
        $pdf->Cell(30, 10, 'Photo', 1, 0, 'C');
        $pdf->Cell(30, 10, 'ID', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Name', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Course', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Student ID', 1, 0, 'C');
        $pdf->Ln();
        // Loop through candidates data
        foreach ($candidates as $candidate) {

            // Embed photo if available
            if ($candidate->photo && file_exists(public_path('storage/' . $candidate->photo))) {
                // Get the full file path
                $imagePath = public_path('storage/' . $candidate->photo);
                // Embed the image into the PDF
                $pdf->Image($imagePath, $pdf->GetX(), $pdf->GetY(), 30, 20, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
            } else {
                // Handle missing image or invalid file path
                $pdf->Cell(30, 10, 'No Image', 1, 0, 'C');
            }

            // Add other candidate data
            $pdf->Cell(30, 10, $candidate->id, 1, 0, 'C');
            $pdf->Cell(50, 10, $candidate->name, 1, 0, 'C');
            $pdf->Cell(50, 10, $candidate->course, 1, 0, 'C');
            $pdf->Cell(50, 10, $candidate->student_id, 1, 0, 'C');
            $pdf->Ln();
            // Add more cells for other candidate data as needed
        }

        // Output PDF as download
        $pdf->Output('candidates.pdf', 'D');
    }
}
