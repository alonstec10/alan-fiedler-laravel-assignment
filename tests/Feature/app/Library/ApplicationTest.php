<?php

namespace Tests\Feature\app\Library;

use App\Library\Application;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class ApplicationTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * @test
     * @return void
     */
    public function it_can_instantiate(): void
    {
        $application = App::make(Application::class);
        $this->assertInstanceOf(Application::class, $application);
    }

    /**
     * @test
     * @return void
     */
    public function it_gives_me_loan_application_dat_is_array(): void
    {
        $application = App::make(Application::class);
        $this->assertIsArray($application->getApplication(1));
    }

    /**
     * @test
     * @return void
     */
    public function it_gives_me_loan_application_dat_is_not_data(): void
    {
        $application = App::make(Application::class);
        $applicationData = $application->getApplication(1);
        $this->assertArrayHasKey('borrowers', $applicationData);
        $this->assertArrayHasKey('application', $applicationData);
    }

}
