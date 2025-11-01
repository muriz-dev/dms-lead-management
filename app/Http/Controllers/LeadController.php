<?php

namespace App\Http\Controllers;

use App\Enums\LeadStatus;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index(Request $request)
    {
        $leads = Lead::with('assignedUser')
            ->filter($request->only(['search', 'status']))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('leads.index', [
            'leads' => $leads,
            'statuses' => LeadStatus::cases(),
            'filters' => $request->only(['search', 'status']),
        ]);
    }

    public function create()
    {
        return view('leads.create', [
            'statuses' => LeadStatus::options(),
            'users' => User::select('id', 'name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:leads',
            'phone' => 'required|string|max:20',
            'company' => 'nullable|string|max:255',
            'message' => 'nullable|string',
            'status' => 'required|in:new,contacted,interested,not_interested,converted',
            'source' => 'nullable|string|max:100',
            'assigned_to' => 'nullable|exists:users,id',
            'notes' => 'nullable|string',
        ]);

        Lead::create($validated);

        return redirect()->route('leads.index')
            ->with('success', 'Lead berhasil ditambahkan!');
    }

    public function show(Lead $lead)
    {
        $lead->load('assignedUser');
        
        return view('leads.show', compact('lead'));
    }

    public function edit(Lead $lead)
    {
        return view('leads.edit', [
            'lead' => $lead,
            'statuses' => LeadStatus::options(),
            'users' => User::select('id', 'name')->get(),
        ]);
    }

    public function update(Request $request, Lead $lead)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:leads,email,' . $lead->id,
            'phone' => 'required|string|max:20',
            'company' => 'nullable|string|max:255',
            'message' => 'nullable|string',
            'status' => 'required|in:new,contacted,interested,not_interested,converted',
            'source' => 'nullable|string|max:100',
            'assigned_to' => 'nullable|exists:users,id',
            'notes' => 'nullable|string',
        ]);

        $lead->update($validated);

        return redirect()->route('leads.index')
            ->with('success', 'Lead berhasil diupdate!');
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();

        return redirect()->route('leads.index')
            ->with('success', 'Lead berhasil dihapus!');
    }
}