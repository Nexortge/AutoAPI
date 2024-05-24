<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Auto;
use App\Models\Kenmerken;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AutoControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test index method.
     *
     * @return void
     */
    public function testIndex()
    {
        Auto::factory()->count(3)->create();

        $response = $this->getJson('/api/autos');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /**
     * Test store method with valid data.
     *
     * @return void
     */
    public function testStoreWithValidData()
    {
        $autoData = [
            'naam' => 'Test Auto',
            'merk' => 'Test Merk',
            'brandstof_id' => 1,
        ];

        $response = $this->postJson('/api/autos', $autoData);

        $response->assertStatus(201)
            ->assertJson($autoData);
    }

    /**
     * Test store method with invalid data.
     *
     * @return void
     */
    public function testStoreWithInvalidData()
    {
        $response = $this->postJson('/api/autos', []);

        $response->assertStatus(400)
            ->assertJson(['Foutmelding' => 'Data niet correct']);
    }

    /**
     * Test show method.
     *
     * @return void
     */
    public function testShow()
    {
        $auto = Auto::factory()->create();

        $response = $this->getJson('/api/autos/' . $auto->id);

        $response->assertStatus(200)
            ->assertJson($auto->toArray());
    }

    /**
     * Test update method with valid data.
     *
     * @return void
     */
    public function testUpdateWithValidData()
    {
        $auto = Auto::factory()->create();
        $updateData = [
            'naam' => 'Updated Naam',
            'merk' => 'Updated Merk',
        ];

        $response = $this->putJson('/api/autos/' . $auto->id, $updateData);

        $response->assertStatus(200)
            ->assertJson($updateData);

        $this->assertDatabaseHas('autos', $updateData);
    }

    /**
     * Test update method with invalid data.
     *
     * @return void
     */
    public function testUpdateWithInvalidData()
    {
        $auto = Auto::factory()->create();

        $response = $this->putJson('/api/autos/' . $auto->id, []);

        $response->assertStatus(400)
            ->assertJson(['Foutmelding' => ' Data niet correct']);
    }

    /**
     * Test destroy method.
     *
     * @return void
     */
    public function testDestroy()
    {
        $auto = Auto::factory()->create();

        $response = $this->deleteJson('/api/autos/' . $auto->id);

        $response->assertStatus(200)
            ->assertJson(['Succes' => 'Auto verwijderd']);

        $this->assertDatabaseMissing('autos', ['id' => $auto->id]);
    }

    /**
     * Test showParameters method with sort by naam.
     *
     * @return void
     */
    public function testShowParametersSortByNaam()
    {
        Auto::factory()->count(3)->create();

        $response = $this->getJson('/api/autos?sort=naam');

        $response->assertStatus(200)
            ->assertJsonStructure([['naam', 'merk', 'brandstof_id']]);
    }

    /**
     * Test showParameters method with filter by merk.
     *
     * @return void
     */
    public function testShowParametersFilterByMerk()
    {
        $merk = 'Test Merk';
        Auto::factory()->create(['merk' => $merk]);

        $response = $this->getJson('/api/autos?merk=' . $merk);

        $response->assertStatus(200)
            ->assertJsonStructure([['naam', 'merk', 'brandstof_id']]);
    }

    /**
     * Test showParameters method with no parameters.
     *
     * @return void
     */
    public function testShowParametersNoParameters()
    {
        $kenmerken = Kenmerken::factory()->create();
        $auto = Auto::factory()->create(['brandstof_id' => $kenmerken->id]);

        $response = $this->getJson('/api/autos');

        $response->assertStatus(200)
            ->assertJsonStructure([['naam', 'merk', 'brandstof']]);
    }
}
