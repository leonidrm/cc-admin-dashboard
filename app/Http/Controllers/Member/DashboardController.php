<?php declare(strict_types=1);

namespace App\Http\Controllers\Member;

use App\Models\Auth\User\User;
use Arcanedev\LogViewer\Entities\Log;
use Arcanedev\LogViewer\Entities\LogEntry;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Facades\Arcanedev\LogViewer\LogViewer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return view('member.dashboard');
    }

    public function getLogChartData(Request $request): Response
    {
        Validator::make($request->all(), [
            'start' => 'required|date|before_or_equal:now',
            'end' => 'required|date|after_or_equal:start',
        ])->validate();

        $start = new Carbon($request->get('start'));
        $end = new Carbon($request->get('end'));

        $dates = collect(LogViewer::dates())->filter(function ($value, $key) use ($start, $end) {
            $value = new Carbon($value);
            return $value->timestamp >= $start->timestamp && $value->timestamp <= $end->timestamp;
        });


        $levels = LogViewer::levels();

        $data = [];

        while ($start->diffInDays($end, false) >= 0) {

            foreach ($levels as $level) {
                $data[$level][$start->format('Y-m-d')] = 0;
            }

            if ($dates->contains($start->format('Y-m-d'))) {
                /** @var  $log Log */
                $logs = LogViewer::get($start->format('Y-m-d'));

                /** @var  $log LogEntry */
                foreach ($logs->entries() as $log) {
                    $data[$log->level][$log->datetime->format($start->format('Y-m-d'))] += 1;
                }
            }

            $start->addDay();
        }

        return response($data);
    }

	public function getCompanyData(Request $request): Response
	{
		$data = [];
		$companyId = $request->user()->company_id;
		$campaigns = DB::table('campaigns')->where('company_id', '=', $companyId)->get();

		$data['company'] = DB::table('companies')->where('id', '=', $companyId)->get()->first();
		$data['users'] = DB::table('users')->where('company_id', '=', $companyId)->get();
		$data['currentUserId'] = $request->user()->id;
		$data['campaigns'] = $campaigns;

		$campaignIds = [];

		foreach ($data['campaigns'] as $index => $campaign) {
			$campaignIds[$index] = $campaign->id;
		}

		$newsletters = DB::table('newsletters')->whereIn('campaign_id', $campaignIds)->get();

		foreach ($newsletters as $index => $newsletter) {
			$data['newsletters'][$index] = $newsletter;
		}

		return response($data);
	}

}
