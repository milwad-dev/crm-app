<?php

namespace Modules\User\Services;

use Modules\Share\Contracts\ServicesInterface;
use Modules\Share\Repositories\ShareRepo;
use Modules\User\Models\User;

class UserService implements ServicesInterface
{
    private $class = User::class;

    public static function changePassword($user, $newPassword)
    {
        $user->password = bcrypt($newPassword);
        $user->save();
    }

    public function store($request, $user_id = null)
    {
        return $this->getData()->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->passwords),
            'email_verified_at' => !empty($request->email_verified_at) ? now() : null,
        ]);
    }

    public function update($request, $id, $user_id = null)
    {
        return $this->getData()->whereId($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->passwords),
            'email_verified_at' => !empty($request->email_verified_at) ? now() : null,
        ]);
    }

    private function getData()
    {
        return ShareRepo::query($this->class);
    }
}
