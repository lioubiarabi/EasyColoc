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
        $users = [
            ['name' => 'Arabi admin', 'email' => 'arabi.admin@easycoloc.com', 'role' => true, 'rep' => 10],
            ['name' => 'Bob Dupont', 'email' => 'bob@easycoloc.com', 'role' => false, 'rep' => 5],
            ['name' => 'Clara Lebeau', 'email' => 'clara@easycoloc.com', 'role' => false, 'rep' => 8],
            ['name' => 'David Morel', 'email' => 'david@easycoloc.com', 'role' => false, 'rep' => 3],
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
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 2. Create Colocation
        $colocId = DB::table('colocations')->insertGetId([
            'name' => 'The Lilacs Apartment',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 3. Attach all 4 users to the Colocation
        foreach ($userIds as $index => $id) {
            DB::table('colocation_user')->insert([
                'is_admin' => $index === 0, // Alice is owner
                'user_id' => $id,
                'colocation_id' => $colocId,
                'created_at' => now()->subMonths(rand(1, 4)) // Joined at different times
            ]);
        }

        // 4. Create Categories
        $categories = ['Rent', 'Groceries', 'Electricity', 'Internet', 'Misc'];
        $catIds = [];
        foreach ($categories as $cat) {
            $catIds[$cat] = DB::table('categories')->insertGetId([
                'name' => $cat,
                'created_at' => now(),
            ]);
        }

        // 5. Create Expenses (Now with user_id)
        $expenses = [
            ['title' => 'July Rent', 'cat' => 'Rent', 'user' => 0, 'date' => now()->subDays(10)], // Alice
            ['title' => 'Carrefour Groceries', 'cat' => 'Groceries', 'user' => 1, 'date' => now()->subDays(5)], // Bob
            ['title' => 'Electricity Bill', 'cat' => 'Electricity', 'user' => 2, 'date' => now()->subDays(2)], // Clara
        ];

        $expenseIds = [];
        foreach ($expenses as $exp) {
            $expenseIds[] = DB::table('expenses')->insertGetId([
                'title' => $exp['title'],
                'colocation_id' => $colocId,
                'category_id' => $catIds[$exp['cat']],
                'user_id' => $userIds[$exp['user']], // Added user_id here!
                'created_at' => $exp['date'],
            ]);
        }

        foreach ($userIds as $id) {
            DB::table('settlement')->insert([
                'amount' => 300,
                'paid_at' => ($id === $userIds[0] || $id === $userIds[1]) ? now() : null, // Alice & Bob paid, Clara & David haven't
                'user_id' => $id,
                'expense_id' => $expenseIds[0],
                'created_at' => now()->subDays(10),
            ]);
        }

        DB::table('invitations')->insert([
            [
                'UUID' => substr(Str::uuid()->toString(), 0, 32),
                'status' => 'pending',
                'email' => 'emma.smith@example.com',
                'colocation_id' => $colocId,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'UUID' => substr(Str::uuid()->toString(), 0, 32),
                'status' => 'pending',
                'email' => 'marc.jones@example.com',
                'colocation_id' => $colocId,
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ]
        ]);

    }
}
