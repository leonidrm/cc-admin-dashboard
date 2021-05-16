<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Helpers\Campaign\Service\NewsletterCsvService;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CampaignController extends Controller
{
    /** @var NewsletterCsvService */
    protected $campaignCsvService;

    public function __construct()
    {
        $this->campaignCsvService = new NewsletterCsvService();
    }

    public function upload(Request $request)
    {
        return view('admin.campaign.upload', ['companies' => Company::all()]);
    }

    public function parseCsv(Request $request)
    {
        $validator = Validator::make(
            $request->all(), [
            'company' => ['required', 'max:255'],
            'csv'     => ['required', 'file', 'mimes:txt,csv'],
        ]);

        if ( $validator->fails() ) {
            return redirect()->back()->withErrors($validator->errors());
        }

        /** @var UploadedFile $csv */
        $csv       = $request->csv;
        $companyId = (int)$request->get('company');

        try {
            $this->campaignCsvService->parseCsvData($csv, $companyId);
        } catch ( Exception $e) {
            return redirect()->route('admin.campaign.upload')->withFlashDanger('Unable to Upload CSV! Please contact admin');
        }

        return redirect()->route('admin.campaign.upload')->withFlashSuccess('CSV uploaded Successfully!');
    }
}
