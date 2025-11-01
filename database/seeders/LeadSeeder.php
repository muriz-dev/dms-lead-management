<?php

namespace Database\Seeders;

use App\Enums\LeadStatus;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Database\Seeder;

class LeadSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        $leads = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'phone' => '081234567890',
                'company' => 'Tech Corp',
                'message' => 'Interested in AI cybersecurity solutions',
                'status' => LeadStatus::NEW,
                'source' => 'Website',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'phone' => '081234567891',
                'company' => 'Finance Inc',
                'message' => 'Need comprehensive security audit',
                'status' => LeadStatus::CONTACTED,
                'source' => 'Referral',
                'assigned_to' => $users->first()->id,
            ],
            [
                'name' => 'Bob Johnson',
                'email' => 'bob@example.com',
                'phone' => '081234567892',
                'company' => 'Retail Solutions',
                'message' => 'Looking for AI-powered threat detection',
                'status' => LeadStatus::INTERESTED,
                'source' => 'Website',
                'assigned_to' => $users->last()->id,
            ],
            [
                'name' => 'Alice Williams',
                'email' => 'alice@example.com',
                'phone' => '081234567893',
                'company' => 'Healthcare Systems',
                'message' => 'HIPAA compliant security solutions needed',
                'status' => LeadStatus::CONVERTED,
                'source' => 'LinkedIn',
                'assigned_to' => $users->first()->id,
            ],
            [
                'name' => 'Charlie Brown',
                'email' => 'charlie@example.com',
                'phone' => '081234567894',
                'company' => 'Manufacturing Ltd',
                'message' => 'Industrial IoT security consultation',
                'status' => LeadStatus::NOT_INTERESTED,
                'source' => 'Cold Call',
            ],
        ];

        foreach ($leads as $lead) {
            Lead::create($lead);
        }
    }
}