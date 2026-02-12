<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Complaint;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    /**
     * Display a listing of the menu history (Read-Only).
     */
    public function menus()
    {
        // Fetch menus with nutrition fact (Global Menu, no school relation)
        $menus = Menu::with(['nutritionFact'])
            ->orderBy('date_served', 'desc')
            ->paginate(10);

        return view('admin.monitoring.menus', compact('menus'));
    }

    /**
     * Display a listing of the complaints (Read-Only).
     */
    public function complaints()
    {
        // Fetch complaints, ordered by latest
        $complaints = Complaint::latest()->paginate(10);

        return view('admin.monitoring.complaints', compact('complaints'));
    }
}
