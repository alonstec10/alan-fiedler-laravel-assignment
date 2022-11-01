<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoanApplication extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       // dd($this->resource);
        return [
            'data' => [
                'type' => 'application',
                'id' => $this->getApplicationData()['id'] ?? 0,
                'attributes' => [
                    'application_name' => $this->getApplicationData()['application_name'] ?? 'N/A',
                    'created' => $this->getApplicationData()['created_at'] ?? 'N/A',
                    'updated' => $this->getApplicationData()['updated_at'] ?? 'N/A',
                ],
                'links' => '/api/application/' . ($this->getApplicationData()['id'] ?? 0),
            ],
            'included' => $this->formatBorrowers(),
        ];
    }

    private function formatBorrowers(): array
    {
        $borrowers = [];
        foreach($this->getBorrowerData() as $borrower) {
            $borrowers[] = [
                'type' => 'borrower',
                'id' => $borrower['id'] ?? 0,
                'attributes' => [
                    'name' => $borrower['name'] ?? 'n/a',
                    'isEmployed' => $borrower['is_employed'] ?? 'n/a',
                    'created' => $borrower['created_at'] ?? 'n/a',
                    'updated' => $borrower['updated_at'] ?? 'n/a',
                ],
            ];
        }
        return $borrowers;
    }

    private function getApplicationData(): array
    {
        return $this->resource['application'] ?? [];
    }
    private function getBorrowerData(): array
    {
        return $this->resource['borrowers'] ?? [];
    }
}
