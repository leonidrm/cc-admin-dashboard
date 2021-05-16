<?php declare(strict_types=1);

namespace App\Repositories\Access\Company;

use App\Models\Company;
use App\Exceptions\GeneralException;
use App\Repositories\DbRepository;

class EloquentCompanyRepository extends DbRepository
{
    /**
     * Model
     *
     * @var Company
     */
    protected $model;

    /**
     * Construct
     *
     */
    public function __construct()
    {
        $this->model = new Company;
    }

    /**
     * Restore Company
     *
     * @param int $id
     * @throws GeneralException
     * @return bool
     */
    public function restore(int $id): bool
    {
        $user = $this->model->withTrashed()->where('id', $id)->first();

        if(isset($user) && isset($user->id))
        {
            $user->restore();
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.restore_error'));
    }

    /**
     * Destroy Company
     *
     * @param int $id
     * @return bool
     * @throws GeneralException
     */
    public function destroy(int $id): bool
    {
        // If the current user is who we're destroying, prevent this action and throw GeneralException
        if(auth()->id() == $id)
        {
            throw new GeneralException(trans('exceptions.backend.access.users.cant_delete_self'));
        }

        $user = $this->model->find($id);

        if($user->delete())
        {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.delete_error'));
    }
}
