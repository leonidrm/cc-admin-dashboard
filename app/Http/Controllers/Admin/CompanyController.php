<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use App\Models\Industry;
use App\Repositories\Access\Company\EloquentCompanyRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View as IlluminateView;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

/**
 * Class CompanyController
 * @package App\Http\Controllers\Admin
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\User\User[] $users
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Company sortable($defaultSortParameters = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Company whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Company whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Company whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Company whereName($value)
 */
class CompanyController extends Controller
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
        return view('admin.companies.index', ['companies' => Company::with('industry')->paginate()]);
    }

    public function add(Request $request)
    {
        return view('admin.companies.add', ['industries' => Industry::get()]);
    }

    public function show(Company $company)
    {
        return view('admin.companies.show', ['company' => $company]);
    }

    public function create(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name'      => ['required', 'max:255'],
            'logo'      => ['required', 'mimes:jpg,jpeg,gif,png'],
            'industry'  => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $company = new Company();
        $company->name          = $request->get('name');
        $company->industry_id   = $request->get('industry');
        $company->active        = $request->get('active', 1);

        if($request->hasFile('logo')){
            $filename = $request->logo->getClientOriginalName();
            $request->logo->storeAs('images/companies', $filename, 'public');
            $company->logo = $filename;
        }

        $company->save();

        return redirect()->intended(route('admin.companies'));
    }

    public function edit(Company $company)
    {
        return view('admin.companies.edit', ['company' => $company, 'industries' => Industry::get()]);
    }

    public function update(Request $request, Company $company)
    {
        $validator = Validator::make($request->all(), [
            'name'      => ['required', 'max:255'],
            'industry'  => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $company->name          = $request->get('name');
        $company->industry_id   = $request->get('industry');
        $company->active        = filter_var($request->get('active'), FILTER_VALIDATE_BOOLEAN);

        if($request->hasFile('logo')){
            $filename = $request->logo->getClientOriginalName();
            $request->logo->storeAs('images/companies', $filename, 'public');
            $company->logo = $filename;
        }

        $company->save();

        return redirect()->intended(route('admin.companies'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroyCompany(int $id)
    {
        try {
            $this->repository->destroy($id);
            return redirect()->route('admin.companies')->withFlashSuccess('Company Deleted Successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.companies')->withFlashDanger('Unable to Delete Company!');
        }
    }
}
