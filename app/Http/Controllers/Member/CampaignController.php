<?php declare(strict_types=1);

namespace App\Http\Controllers\Member;

use App\Models\Auth\User\User;
use App\Repositories\Access\Company\EloquentCompanyRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View as IlluminateView;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CampaignController extends Controller
{
	/**
	 * Repository
	 *
	 * @var EloquentCompanyRepository
	 */
	protected $repository;

	/**
	 * Construct
	 *
	 */
	public function __construct()
	{
		$this->repository = new EloquentCompanyRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param Request $request
	 * @return IlluminateView|Factory
	 */
	public function index(Request $request)
	{
		$companyId = $request->user()->company_id;
		$company = DB::table('companies')->where('id', '=', $companyId)->get()->first();
		$campaigns = DB::table('campaigns')->where('company_id', '=', $companyId)->get();

		return view('member.campaigns', ['company' => $company, 'campaigns' => $campaigns]);
	}

}
