<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use App\Library\Application as LoanApplication;
use App\Http\Resources\LoanApplication as LoanApplicationResource;

class LoanApplicationController extends Controller
{

    /**
     * @param Request $request
     * @param $applicationID
     * @return Application|ResponseFactory|Response
     */
    public function read( Request $request, $applicationID)
    {
        $loanApplication = App::make(LoanApplication::class);

        $resource = new LoanApplicationResource($loanApplication->getApplication($applicationID));

        return response($resource, 200);
    }

}
