<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            
            [
                'id' => '1',
                'name' => 'owner',
                'display_name' => 'Application Manager',
                'description' => 'Verify validity of requests and forward them',
                'created_at' => '2017-06-01 12:09:51',
                'updated_at' => '2017-06-01 12:13:26',
            ],

            [
                'id' => '2',
                'name' => 'admin',
                'display_name' => 'Site Adminstrator',
                'description' => 'Manage users and site upgrages',
                'created_at' => '2017-06-01 12:14:24',
                'updated_at' => '2017-06-01 12:14:24',
            ],

            [
                'id' => '3',
                'name' => 'officer',
                'display_name' => 'Government Officer',
                'description' => 'Approve certificate requests',
                'created_at' => '2017-06-01 12:15:06',
                'updated_at' => '2017-06-01 12:15:06',
            ],

            [
                'id' => '4',
                'name' => 'user',
                'display_name' => 'Certificate Applicant',
                'description' => 'Apply for certificates',
                'created_at' => '2017-06-01 12:16:18',
                'updated_at' => '2017-06-01 12:16:18',
            ],

        ]);
        DB::table('users')->insert([
            
            [
                'id' => '1',
                'name' => 'Brian Finch',
                'phone_number' => '0700284579',
                'email' => 'brian@e-cert.dev',
                'password' => '$2y$10$4YjPTN9gqk8/HIEEwpVQIONK26vON8znhgnKVUkICgmuFZ.xsZ696',
                'remember_token' => 's4v4w4Hk4OTRcvT0FAphfjVI2Hc2Ws4WF0tR5q0v1Btph3tHcm2mMKbfh7L2',
                'created_at' => '2017-04-25 21:12:24',
                'updated_at' => '2017-06-27 11:39:38',
                'blocked' => '0',
            ],

            [
                'id' => '3',
                'name' => 'John Doe',
                'phone_number' => '0700126578',
                'email' => 'johndoe@devs.com',
                'password' => '$2y$10$1S0GemDRzEinNbxL44DtZ.9P.1ywU8POFWv.HkxmD7bz46KP6gNkq',
                'remember_token' => 'Ms6LbWUekx0ilQ7JPRDqtz2M7V0njklMWxIq32vqH7e3h82bw2FtfhMo9yEF',
                'created_at' => '2017-06-23 09:44:06',
                'updated_at' => '2017-06-23 09:44:06',
                'blocked' => '0',
            ],

            [
                'id' => '4',
                'name' => 'The Administrator',
                'phone_number' => '+254729422001',
                'email' => 'admin@site.com',
                'password' => '$2y$10$jsk6UGMytKnfyS7jJgYCCO51S4LsyJFDuxckb28dGwNNJImJIUDva',
                'remember_token' => 'FIgo6LWZAd6Dp9etE1dLMpVqnWf1TGIryhZZ0udmdGtN02aKgXNQ49NXNfPx',
                'created_at' => '2017-06-30 19:46:14',
                'updated_at' => '2017-06-30 22:04:58',
                'blocked' => '0',
            ],

            [
                'id' => '5',
                'name' => 'Kevin Hart',
                'phone_number' => '+254729422001',
                'email' => 'kevin@e-cert.dev',
                'password' => '$2y$10$TE4iufw9ZjmS4JYvozomceJIRa5KAd2qJrqaU0fYcqUyp9Vm5Ptn.',
                'remember_token' => 'UbxS9DdQe4BwqXGE84NBpKtDB5x2DvHW70HS4ig5YeOUXlf2BNCFa2XBgh0y',
                'created_at' => '2017-07-01 14:43:03',
                'updated_at' => '2017-07-01 14:43:03',
                'blocked' => '0',
            ],

        ]);
        DB::table('role_user')->insert([
            
            [
                'user_id' => '1',
                'role_id' => '1',
            ],

            [
                'user_id' => '1',
                'role_id' => '2',
            ],

            [
                'user_id' => '1',
                'role_id' => '3',
            ],

            [
                'user_id' => '3',
                'role_id' => '4',
            ],

            [
                'user_id' => '4',
                'role_id' => '2',
            ],

            [
                'user_id' => '5',
                'role_id' => '4',
            ],

        ]);
    }
}
