<?php

namespace Tests\Unit\app\Library\Repository;

use App\Library\Repository\LoanApplicationRepository;
use App\Library\Repository\LoanApplicationRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class LoanApplicationRepositoryTest extends TestCase
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
    public function is_borrower_repo_instance_of(): void
    {
        $applicationRepository = new LoanApplicationRepository();
        $this->assertInstanceOf(LoanApplicationRepositoryInterface::class, $applicationRepository);
    }

    /**
     * @test
     * @return void
     */
    public function it_does_not_exist(): void
    {
        $this->expectException(ModelNotFoundException::class);
        $applicationRepository = new LoanApplicationRepository();
        $applicationRepository->getApplication(100000);
    }

    /**
     * @test
     * @return void
     */
    public function it_has_application(): void
    {
        $applicationRepository = new LoanApplicationRepository();
        $application = $applicationRepository->getApplication(1);
        $this->assertIsArray($application);
        $this->assertArrayHasKey('application_name', $application);
    }

    /**
     * @test
     * @return void
     */
    public function it_has_borrowers(): void
    {
        $applicationID = 1;
        $applicationRepository = new LoanApplicationRepository();
        $this->assertTrue($applicationRepository->hasBorrowers($applicationID));
    }

    /**
     * @test
     * @return void
     */
    public function it_does_not_have_borrowers(): void
    {
        $applicationID = 10000;
        $applicationRepository = new LoanApplicationRepository();
        $this->assertFalse($applicationRepository->hasBorrowers($applicationID));
    }

    /**
     * @test
     * @return void
     */
    public function it_does_have_borrowers(): void
    {
        $applicationID = 1;
        $applicationRepository = new LoanApplicationRepository();
        $applicationBorrowers = $applicationRepository->getApplicationBorrowers($applicationID);

        $this->assertIsArray($applicationBorrowers);
        $this->assertTrue(count($applicationBorrowers) > 0);

        foreach($applicationBorrowers as $applicationBorrower) {
            $this->assertArrayHasKey('name', $applicationBorrower);
            $this->assertArrayHasKey('is_employed', $applicationBorrower);
        }
    }


}
