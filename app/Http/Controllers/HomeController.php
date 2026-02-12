<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\School;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $complaintRepository;

    public function __construct(\App\Interfaces\ComplaintRepositoryInterface $complaintRepository)
    {
        $this->complaintRepository = $complaintRepository;
    }

    /**
     * Show the public landing page.
     */
    public function index()
    {
        // 1. Fetch School Data - Single Institution (UKK Point 24)
        $school = School::first();
        $schools = School::all(); // Keep for history filter just in case

        // 2. Fetch Team Members (Where position is NOT NULL)
        $teamMembers = \App\Models\User::whereNotNull('position')
            ->orderBy('role', 'asc')
            ->get();

        // 3. Fetch Latest/Today's Menu (Where date is TODAY)
        $todaysMenu = Menu::with('nutritionFact')
            ->whereDate('date_served', now())
            ->first();

        // 4. Fetch Past Menus (History for the last 30 days)
        $pastMenus = Menu::with('nutritionFact')
            ->whereDate('date_served', '<', now()) // Exclude today/future
            ->whereDate('date_served', '>=', now()->subDays(30))
            ->orderBy('date_served', 'desc')
            ->get();

        // 5. Fetch Public Complaints (Specific columns, NO Reporter Identify)
        $publicComplaints = \App\Models\Complaint::select('ticket_code', 'category', 'created_at', 'status', 'content')
            ->latest()
            ->limit(5)
            ->get();

        // 6. Fetch Available Months for Filter (Distinct Year-Month)
        $availableMonths = Menu::selectRaw('MONTH(date_served) as month, YEAR(date_served) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        return view('welcome', compact('school', 'schools', 'teamMembers', 'todaysMenu', 'pastMenus', 'publicComplaints', 'availableMonths'));
    }

    /**
     * Store public complaint.
     */
    public function storeComplaint(Request $request)
    {
        $data = $request->validate([
            'reporter_name' => 'nullable|string|max:255',
            'reporter_contact' => 'nullable|string|max:255',
            'category' => 'required|string|in:Kualitas Makanan,Keterlambatan,Porsi,Higienitas,Lainnya',
            'content' => 'required|string',
            'photo_evidence' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $complaint = $this->complaintRepository->createComplaint($data);

        return redirect()->back()->with('success', 'Laporan berhasil dikirim! Kode Tiket Anda: ' . $complaint->ticket_code);
    }
}
