<?php

namespace App\Http\Controllers;

use App\Services\ApiClient;

use App\Http\Requests\AppRequest;
use Carbon\Carbon;
use App\Mail\AppMail;
use Illuminate\Support\Facades\Mail;

class AppController extends Controller
{
    protected $apiClient;

    public function __construct(ApiClient $apiClient) {
        $this->apiClient = $apiClient;
    }

    public function index()
    {
        $dataHubsData = $this->apiClient->datahub->getDatahubData();

        return view('welcome', [
            'dataHubsData' => $dataHubsData
        ]);
    }

    public function fetchData(AppRequest $request)
    {
        $dataHubsData = $this->apiClient->datahub->getDatahubData();

        $company = null;

        foreach($dataHubsData as $data) {
            if (strtolower($data->Symbol) === strtolower($request->companySymbol)) {
                $company = $data;
            }   
        }

        return redirect()->route('app.history', [
            'companySymbol' => $request->companySymbol,
            'startDate'     => $request->startDate,
            'endDate'       => $request->endDate,
            'email'         => $request->email,
            'companyName'   => $company->{'Company Name'}
        ]);
    }


    public function histories(AppRequest $request)
    {
        $data = $this->apiClient->rapidapi->getRapidApiData($request->companySymbol);

        $prices = [];

        foreach ($data->prices as $record) {
            if(isset($record->date)) {
                if (Carbon::parse($request->startDate)->lte(Carbon::parse($record->date))) {
                    if (Carbon::parse($request->endDate)->gte(Carbon::parse($record->date))) {
                        array_push($prices, $record);
                    }
                }
            }
        }

        // Mail::mailer('mailgun')
        //     ->to($request->email)
        //     ->send(new AppMail([
        //         'startDate' => $request->startDate,
        //         'endDate' => $request->endDate,
        //         'companyName' => $request->companyName,
        //     ]));
        
        return view('history', [
            'data' => $data,
            'prices' => $prices,
            'companyName' => $request->companyName,
        ]);
    }
}
