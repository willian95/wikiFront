<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Institution;

class TeacherRegisterTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function storeTeacherWithInstitution()
    {

        $name = "Willian rodriguez";
        $email = "rodriguezwillian95@gmail.com";
        $password = '12345678';
        $password_confirmation = "12345678";
        $institution_id = factory(Institution::class)->states("institution")->create()->id;
        $institution_email = "institution@institution.com";

        $response = $this->post('/register', [
            "name" => $name,
            "email" => $email,
            "password" => $password,
            "password_confirmation" => $password_confirmation,
            "institution_id" => $institution_id,
            "institution_email" => $institution_email
        ]);

        $response->assertStatus(200);
    }
}
