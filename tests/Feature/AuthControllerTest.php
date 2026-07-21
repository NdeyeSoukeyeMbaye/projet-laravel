<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_doctor_can_login_with_email_and_password(): void
    {
        $this->artisan('migrate');

        $specialiteId = \DB::table('specialites')->insertGetId([
            'nom' => 'Cardiologie',
            'description' => 'Cardiologie',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user = User::factory()->create([
            'email' => 'doctor@example.com',
            'password' => Hash::make('secret123'),
        ]);

        \DB::table('medecins')->insert([
            'user_id' => $user->id,
            'specialite_id' => $specialiteId,
            'disponibilite' => 'Lundi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $response = $this->post('/login', [
            'role' => 'medecin',
            'email' => 'doctor@example.com',
            'password' => 'secret123',
        ]);

        $response->assertRedirect('/');
        $this->assertTrue(Auth::check());
        $this->assertSame('medecin', session('auth_role'));
    }

    public function test_head_doctor_can_login_with_name_firstname_and_unique_password(): void
    {
        $this->artisan('migrate');

        $specialiteId = \DB::table('specialites')->insertGetId([
            'nom' => 'Pédiatrie',
            'description' => 'Pédiatrie',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user = User::factory()->create([
            'email' => 'chef@example.com',
            'password' => Hash::make('chef-2026'),
        ]);

        \DB::table('medecins')->insert([
            'user_id' => $user->id,
            'specialite_id' => $specialiteId,
            'nom' => 'Diallo',
            'prenom' => 'Moussa',
            'mot_de_passe_unique' => 'chef-2026',
            'est_chef' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $response = $this->post('/login', [
            'role' => 'medecin_chef',
            'email' => 'chef@example.com',
            'password' => 'chef-2026',
        ]);

        $response->assertRedirect('/');
        $this->assertTrue(Auth::check());
        $this->assertSame('medecin_chef', session('auth_role'));
    }
}
