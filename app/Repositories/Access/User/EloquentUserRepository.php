<?php declare(strict_types=1);

namespace App\Repositories\Access\User;

use App\Models\Auth\User\User;
use App\Exceptions\GeneralException;
use App\Repositories\DbRepository;

class EloquentUserRepository extends DbRepository
{
    /**
     * Model
     *
     * @var User
     */
    protected $model;

    /**
     * Construct
     *
     */
    public function __construct()
    {
        $this->model = new User;
    }

    /**
     * Restore User
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
     * Destroy User
     *
     * @param int $id
     * @throws GeneralException
     * @return bool
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
