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
        $errorMessages = $request->get('errorMessages');

        return view('admin.campaign.upload', [
            'companies' => Company::all(),
            'errorMessages' => $errorMessages
        ]);
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

        $errorMessages = [];
        $companyId     = (int)$request->get('company');

        if ( $request->hasFile('csv') ) {
            /** @var UploadedFile $csv */
            $csv = $request->csv;
            try {
                $this->campaignCsvService->parseCsvData($csv, $companyId);
            } catch ( Exception $e) {
                $errorMessages[] = $e->getMessage();
            }
        } else {
            $errorMessages[] = 'Wrong Parameters were passed';
        }

        return redirect()->route('admin.campaign.upload', ['errorMessages' => $errorMessages]);
    }
}
