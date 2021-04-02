<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Helpers\Campaign\Service\CampaignCsvService;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CampaignController extends Controller
{
    /** @var CampaignCsvService */
    protected $campaignCsvService;

    public function __construct()
    {
        $this->campaignCsvService = new CampaignCsvService();
    }

    public function upload()
    {
        return view('admin.campaign.upload', ['companies' => Company::all()]);
    }

    public function parseCsv(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company' => ['required', 'max:255'],
            'csv'     => ['required', 'file', 'mimes:txt,csv'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        if($request->hasFile('csv')){
            $filename = $request->csv->getClientOriginalName();
            $dir      = 'csv/campaigns/';
            $filePath = Storage::path($dir) . $filename;
            $request->csv->storeAs($dir, $filename, 'public');
            $this->campaignCsvService->parseCsvData($filePath);
        }
    }
}
