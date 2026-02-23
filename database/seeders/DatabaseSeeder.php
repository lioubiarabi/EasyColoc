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
        // 1. Create Users
        $adminId = DB::table('users')->insertGetId([
            'name' => 'Global Admin',
            'email' => 'admin@easycoloc.com',
            'password' => Hash::make('password'),
            'is_active' => true,
            'is_global_admin' => true,
            'reputation' => '10',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $memberId = DB::table('users')->insertGetId([
            'name' => 'Normal Member',
            'email' => 'member@easycoloc.com',
            'password' => Hash::make('password'),
            'is_active' => true,
            'is_global_admin' => false,
            'reputation' => '5',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $colocId = DB::table('colocations')->insertGetId([
            'name' => 'Villa YouCode',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('colocation_user')->insert([
            ['is_admin' => true, 'user_id' => $adminId, 'colocation_id' => $colocId, 'created_at' => now()],
            ['is_admin' => false, 'user_id' => $memberId, 'colocation_id' => $colocId, 'created_at' => now()]
        ]);

        $catId = DB::table('categories')->insertGetId([
            'name' => 'Internet / Wifi',
            'created_at' => now(),
        ]);

        $expenseId = DB::table('expenses')->insertGetId([
            'title' => 'Fibre Optique Février',
            'colocation_id' => $colocId,
            'category_id' => $catId,
            'created_at' => now(),
        ]);

        DB::table('settlement')->insert([
            [
                'amount' => 50, // 50 DH
                'paid_at' => now(),
                'user_id' => $adminId,
                'expense_id' => $expenseId,
                'created_at' => now()
            ],
            [
                'amount' => 50,
                'paid_at' => null,
                'user_id' => $memberId,
                'expense_id' => $expenseId,
                'created_at' => now()
            ]
        ]);

        DB::table('invitations')->insert([
            'UUID' => substr(Str::uuid()->toString(), 0, 32),
            'status' => 'pending',
            'email' => 'newfriend@youcode.ma',
            'colocation_id' => $colocId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
