<?php
namespace App\Repositories;

use App\Models\User;
use App\Interfaces\IUser;

use App\Models\PersonalAccessToken;
class UserRepo implements IUser
{   
    public function getAll()
    {
        return User::all();
    }
    public function getById($id)
    {
        return User::with('role')
                    ->where('id', $id)
                    ->where('flg_del','<>',1)
                    ->get();
    }

    public function create(array $data)
    {
        User::create($data);
    }

    public function update($id, array $data)
    {
        $model = User::find($id);
        if (!$model) {
            return false;
        }

        $model->update($data);
        return $model;
    }

    public function delete($id)
    {
        $model = User::find($id);
        if (!$model) {
            return false;
        }

        $model->delete();
        return true;
    }
    function getList(array $data, $pagination = null)
    {
        $id = isset($data['id']) ? $data['id'] : null;
        $query = User::with('role')->where('flg_del','<>',1);
        $res = !$pagination ? $query->get() : $query->paginate($pagination);
        return $res;
    }
    function getLastTokenById($id)
    {
        $latestToken = PersonalAccessToken::where('tokenable_id', $id)->latest()->first();
    
        if ($latestToken) {
            $token = $latestToken->token;
        }
        return $token;
    }
}
