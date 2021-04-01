<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function upload()
    {
        return view('admin.campaign.upload', ['companies' => Company::all()]);
    }
}
