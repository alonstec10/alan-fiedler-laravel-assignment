<?php

namespace Tests\Unit\app\Library\Repository;

use App\Library\Repository\BorrowerRepository;
use App\Library\Repository\BorrowerRepositoryInterface;
use App\Models\Borrower;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class BorrowerRepositoryTest extends TestCase
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
        $borrowerRepository = new BorrowerRepository();
        $this->assertInstanceOf(BorrowerRepositoryInterface::class, $borrowerRepository);
    }

    /**
     * @test
     * @return void
     */
    public function it_doesnt_have_borrower(): void
    {
        $this->expectException(ModelNotFoundException::class);
        $borrowerRepository = new BorrowerRepository();
        $borrowerRepository->getBorrower(100000);
    }

    /**
     * @test
     * @return void
     */
    public function it_exists_and_has_name(): void
    {
        $borrowerRepository = new BorrowerRepository();
        $borrower = $borrowerRepository->getBorrower(1);
        $this->assertIsArray($borrower);
        $this->assertArrayHasKey('id', $borrower);
        $this->assertArrayHasKey('name', $borrower);
        $this->assertArrayHasKey('is_employed', $borrower);
    }

    /**
     * @test
     * @return void
     */
    public function it_does_not_have_bank_account(): void
    {
        $borrowerID = 2;
        $borrowerRepository = new BorrowerRepository();
        $borrowerHasBankAccount = $borrowerRepository->hasBankAccount($borrowerID);

        $this->assertFalse($borrowerHasBankAccount);
    }

    /**
     * @test
     * @return void
     */
    public function it_has_bank_account(): void
    {
        $borrowerID = 1;
        $borrowerRepository = new BorrowerRepository();
        $borrower = $borrowerRepository->getBankAccount($borrowerID);
        $this->assertArrayHasKey('id', $borrower);
        $this->assertArrayHasKey('borrower_id', $borrower);
        $this->assertArrayHasKey('bank_account_number', $borrower);
        $this->assertArrayHasKey('annual_income', $borrower);
    }



}
