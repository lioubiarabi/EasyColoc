<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create 4 Users (Matching your UI design)
        $users = [
            ['name' => 'Alice Martin', 'email' => 'alice@easycoloc.com', 'role' => true, 'rep' => 4.8],
            ['name' => 'Bob Dupont', 'email' => 'bob@easycoloc.com', 'role' => false, 'rep' => 3.2],
            ['name' => 'Clara Lebeau', 'email' => 'clara@easycoloc.com', 'role' => false, 'rep' => 4.5],
            ['name' => 'David Morel', 'email' => 'david@easycoloc.com', 'role' => false, 'rep' => 4.1],
        ];

        $userIds = [];
        foreach ($users as $user) {
            $userIds[] = DB::table('users')->insertGetId([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make('password'),
                'is_active' => true,
                'is_global_admin' => $user['role'],
                'reputation' => $user['rep'],
                'created_at' => Carbon::now()->subMonths(2),
                'updated_at' => Carbon::now()->subMonths(2),
            ]);
        }

        // 2. Create Colocation
        $colocId = DB::table('colocations')->insertGetId([
            'name' => 'The Lilacs Apartment',
            'status' => 'active',
            'created_at' => Carbon::now()->subMonths(2),
            'updated_at' => Carbon::now()->subMonths(2),
        ]);

        // 3. Attach all 4 users to the Colocation
        foreach ($userIds as $index => $id) {
            DB::table('colocation_user')->insert([
                'is_admin' => $index === 0, // Alice is owner
                'user_id' => $id,
                'colocation_id' => $colocId,
                'created_at' => Carbon::now()->subMonths(rand(1, 2))
            ]);
        }

        // 4. Create Categories
        $categories = ['Rent', 'Groceries', 'Electricity', 'Internet', 'Misc'];
        $catIds = [];
        foreach ($categories as $cat) {
            $catIds[$cat] = DB::table('categories')->insertGetId([
                'name' => $cat,
                'created_at' => Carbon::now(),
            ]);
        }

        // 5. Create Realistic Expenses (Now with amount and user_id!)
        $expenses = [
            ['title' => 'July Rent', 'amount' => 1200.00, 'cat' => 'Rent', 'user' => 0, 'date' => Carbon::now()->subDays(10)],
            ['title' => 'Carrefour Groceries', 'amount' => 87.50, 'cat' => 'Groceries', 'user' => 1, 'date' => Carbon::now()->subDays(8)],
            ['title' => 'Electricity Bill', 'amount' => 95.00, 'cat' => 'Electricity', 'user' => 2, 'date' => Carbon::now()->subDays(5)],
            ['title' => 'Internet Subscription', 'amount' => 40.00, 'cat' => 'Internet', 'user' => 0, 'date' => Carbon::now()->subDays(4)],
            ['title' => 'Pizza Night', 'amount' => 56.00, 'cat' => 'Misc', 'user' => 3, 'date' => Carbon::now()->subDays(2)],
            ['title' => 'Cleaning Supplies', 'amount' => 34.00, 'cat' => 'Groceries', 'user' => 2, 'date' => Carbon::now()->subDays(1)],
        ];

        foreach ($expenses as $exp) {
            // Insert Expense
            $expenseId = DB::table('expenses')->insertGetId([
                'title' => $exp['title'],
                'amount' => $exp['amount'],
                'colocation_id' => $colocId,
                'category_id' => $catIds[$exp['cat']],
                'user_id' => $userIds[$exp['user']], // The person who paid
                'created_at' => $exp['date'],
            ]);

            // Calculate split
            $splitAmount = $exp['amount'] / count($userIds);

            // Insert Settlements for each user
            foreach ($userIds as $userId) {
                DB::table('settlement')->insert([
                    'amount' => $splitAmount,
                    // If the user is the one who paid the expense, their settlement is instantly marked as paid.
                    'paid_at' => ($userId === $userIds[$exp['user']]) ? $exp['date'] : null,
                    'user_id' => $userId,
                    'expense_id' => $expenseId,
                    'created_at' => $exp['date'],
                ]);
            }
        }

        // 6. Create a few pending Invitations
        DB::table('invitations')->insert([
            [
                'UUID' => substr(Str::uuid()->toString(), 0, 32),
                'status' => 'pending',
                'email' => 'emma.smith@example.com',
                'colocation_id' => $colocId,
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
            [
                'UUID' => substr(Str::uuid()->toString(), 0, 32),
                'status' => 'pending',
                'email' => 'marc.jones@example.com',
                'colocation_id' => $colocId,
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(5),
            ]
        ]);
    }
}
