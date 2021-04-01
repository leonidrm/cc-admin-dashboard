<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Auth\Role\Role;
use App\Models\Auth\User\User;
use App\Models\Company;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View as IlluminateView;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Access\User\EloquentUserRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Repository
     *
     * @var EloquentUserRepository
     */
    protected $repository;

    /**
     * Construct
     *
     */
    public function __construct()
    {
        $this->repository = new EloquentUserRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return IlluminateView|Factory
     */
    public function index(Request $request)
    {
        $query = User::query()->whereHas(
            'roles', function ($query) {
            $query->whereIn('name', ['administrator', 'editor']);
        }
        );

        $users = $query->with('roles')
                       ->sortable(['email' => 'asc'])->paginate();

        return view('admin.users.index', ['users' => $users]);
    }

    public function clientList(Request $request)
    {
        $query   = User::query()->whereHas(
            'roles', function ($query) {
            $query->whereIn('name', ['client']);
        }
        );
        $clients = $query->with('roles')
                         ->sortable(['email' => 'asc'])->paginate();
        return view('admin.clients.index', ['clients' => $clients]);
    }

    /**
     * Restore Users
     *
     * @param Request $request
     * @return IlluminateView|Factory
     */
    public function restore(Request $request)
    {
        return view('admin.users.restore', ['users' => User::onlyTrashed()->with('roles')->sortable(['email' => 'asc'])->paginate()]);
    }

    /**
     * Restore Users
     *
     * @param int $id
     * @return Response
     */
    public function restoreUser(int $id): Response
    {
        $status = $this->repository->restore($id);

        if ( $status ) {
            return redirect()->route('admin.users')->withFlashSuccess('User Restored Successfully!');
        }

        return redirect()->route('admin.users')->withFlashDanger('Unable to Restore User!');
    }

    public function addUser()
    {
        $roles = Role::query()->where('name', '!=', 'client')->get();
        return view('admin.users.add', ['roles' => $roles]);
    }

    public function addClient()
    {
        $roles = Role::query()->where('name', '=', 'client')->get();
        return view('admin.clients.add', ['roles' => $roles, 'companies' => Company::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createUser(Request $request)
    {
        $validator = Validator::make(
            $request->all(), [
                               'name'      => ['required', 'max:255'],
                               'email'     => ['required', 'unique:users', 'max:255'],
                               'active'    => 'boolean',
                               'confirmed' => 'boolean',
                               'role'      => 'required'
                           ]
        );

        $validator->sometimes(
            'password', 'min:6|confirmed', function ($input) {
            return $input->password;
        }
        );

        if ( $validator->fails() ) return redirect()->back()->withErrors($validator->errors());

        $user            = new User();
        $user->name      = $request->get('name');
        $user->email     = $request->get('email');
        $user->active    = $request->get('active');
        $user->confirmed = $request->get('confirmed');

        if ( $request->has('password') ) {
            $user->password = bcrypt($request->get('password'));
        }

        $user->save();

        //roles
        if ( $request->get('role') ) {
            $user->roles()->attach($request->get('role'));
        }

        return redirect()->intended(route('admin.users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createClient(Request $request)
    {
        $validator = Validator::make(
            $request->all(), [
                               'name'      => ['required', 'max:255'],
                               'email'     => ['required', 'unique:users', 'max:255'],
                               'active'    => 'boolean',
                               'confirmed' => 'boolean',
                               'company'   => 'required'
                           ]
        );

        $validator->sometimes(
            'password', 'min:6|confirmed', function ($input) {
            return $input->password;
        }
        );

        if ( $validator->fails() ) return redirect()->back()->withErrors($validator->errors());

        $client             = new User();
        $client->name       = $request->get('name');
        $client->email      = $request->get('email');
        $client->active     = $request->get('active');
        $client->confirmed  = $request->get('confirmed');
        $client->company_id = $request->get('company');

        if ( $request->has('password') ) {
            $client->password = bcrypt($request->get('password'));
        }

        $client->save();

        $client->roles()->attach(Role::CLIENT_ID);

        return redirect()->intended(route('admin.clients'));
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return IlluminateView|Factory
     */
    public function show(User $user)
    {
        return view('admin.users.show', ['user' => $user]);
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return IlluminateView|Factory
     */
    public function showClient(User $user)
    {
        return view('admin.clients.show', ['client' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return IlluminateView|Factory
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', ['user' => $user, 'roles' => Role::get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return IlluminateView|Factory
     */
    public function editClient(User $user)
    {
        return view('admin.clients.edit', ['client' => $user, 'companies' => Company::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User    $user
     * @return mixed
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make(
            $request->all(), [
                               'name'      => 'required|max:255',
                               'email'     => 'required|email|max:255',
                               'active'    => 'sometimes|boolean',
                               'confirmed' => 'sometimes|boolean',
                           ]
        );

        $validator->sometimes(
            'email', 'unique:users', function ($input) use ($user) {
            return strtolower($input->email) != strtolower($user->email);
        }
        );

        $validator->sometimes(
            'password', 'min:6|confirmed', function ($input) {
            return $input->password;
        }
        );

        if ( $validator->fails() ) return redirect()->back()->withErrors($validator->errors());

        $user->name  = $request->get('name');
        $user->email = $request->get('email');

        if ( $request->has('password') ) {
            $user->password = bcrypt($request->get('password'));
        }

        $user->active    = $request->get('active', 0);
        $user->confirmed = $request->get('confirmed', 0);

        $user->save();

        //roles
        if ( $request->has('roles') ) {
            $user->roles()->detach();

            if ( $request->get('roles') ) {
                $user->roles()->attach($request->get('roles'));
            }
        }

        return redirect()->intended(route('admin.users'));
    }

    public function updateClient(Request $request, User $user)
    {
        $validator = Validator::make(
            $request->all(), [
                               'name'      => 'required|max:255',
                               'email'     => 'required|email|max:255',
                               'active'    => 'sometimes|boolean',
                               'confirmed' => 'sometimes|boolean',
                               'company'   => ['required']
                           ]
        );

        $validator->sometimes(
            'email', 'unique:users', function ($input) use ($user) {
            return strtolower($input->email) != strtolower($user->email);
        }
        );

        $validator->sometimes(
            'password', 'min:6|confirmed', function ($input) {
            return $input->password;
        }
        );

        if ( $validator->fails() ) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $user->name       = $request->get('name');
        $user->email      = $request->get('email');
        $user->active     = $request->get('active', 0);
        $user->confirmed  = $request->get('confirmed', 0);
        $user->company_id = $request->get('company');

        if ( $request->has('password') ) {
            $user->password = bcrypt($request->get('password'));
        }

        $user->save();

        return redirect()->intended(route('admin.clients'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroyUser(int $id)
    {
        $status = $this->repository->destroy($id);

        if ( $status ) {
            return redirect()->route('admin.users')->withFlashSuccess('User Deleted Successfully!');
        }

        return redirect()->route('admin.users')->withFlashDanger('Unable to Delete User!');
    }
}
