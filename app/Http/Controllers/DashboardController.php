<?php

namespace App\Http\Controllers;

use App\Enums\LeadStatus;
use App\Models\Lead;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display dashboard with statistics
     */
    public function index()
    {
        // Calculate statistics
        $stats = [
            'total' => Lead::count(),
            'new' => Lead::where('status', LeadStatus::NEW)->count(),
            'contacted' => Lead::where('status', LeadStatus::CONTACTED)->count(),
            'interested' => Lead::where('status', LeadStatus::INTERESTED)->count(),
            'converted' => Lead::where('status', LeadStatus::CONVERTED)->count(),
        ];

        // Get recent leads
        $recentLeads = Lead::with('assignedUser')
            ->latest()
            ->take(5)
            ->get();

        // Get status distribution
        $statusDistribution = Lead::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->status->label() => $item->count];
            });

        return view('dashboard', compact('stats', 'recentLeads', 'statusDistribution'));
    }
}