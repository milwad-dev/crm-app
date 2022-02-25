<?php

namespace Modules\User\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Auth\Notifications\ResetPasswordRequestNotification;
use Modules\Auth\Notifications\VerifyMailNotification;
use Modules\Marketing\Models\Campaign;
use Modules\Marketing\Models\Survey;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['name', 'email', 'phone', 'password'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = ['email_verified_at' => 'datetime'];

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyMailNotification());
    }

    public function sendResetPasswordRequestNotification()
    {
        $this->notify(new ResetPasswordRequestNotification());
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

    public function surveys()
    {
        return $this->hasMany(Survey::class);
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function emailVerifyCss()
    {
        if (is_null($this->email_verified_at)) return 'warning';
        else return 'success';
    }

    public function emailVerifyText()
    {
        if (is_null($this->email_verified_at)) return 'No Verified';
        else return 'Verified';
    }
}
