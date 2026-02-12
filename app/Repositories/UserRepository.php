<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

use Illuminate\Support\Facades\Storage;

class UserRepository implements UserRepositoryInterface
{
    public function getAll()
    {
        return User::all();
    }

    public function getById($id)
    {
        return User::findOrFail($id);
    }

    public function create(array $data)
    {
        // Handle Photo Upload
        if (isset($data['photo']) && $data['photo']->isValid()) {
            $photoPath = $data['photo']->store('team_photos', 'public');
            $data['photo_url'] = Storage::url($photoPath);
        }

        return User::create($data);
    }

    public function update($id, array $data)
    {
        $user = User::findOrFail($id);

        // Handle Photo Upload
        if (isset($data['photo']) && $data['photo']->isValid()) {
            // Delete old photo if exists
            if ($user->photo_url) {
                $oldPath = str_replace('/storage/', '', $user->photo_url);
                Storage::disk('public')->delete($oldPath);
            }

            $photoPath = $data['photo']->store('team_photos', 'public');
            $data['photo_url'] = Storage::url($photoPath);
        }

        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);

        // Delete photo if exists
        if ($user->photo_url) {
            $oldPath = str_replace('/storage/', '', $user->photo_url);
            Storage::disk('public')->delete($oldPath);
        }

        return $user->delete();
    }
}
