<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama', 'jenis_kelamin', 'no_telepon', 'alamat', 'status',
        'aktif', 'username', 'email', 'gambar', 'password', 'divisi_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Validation rules for the model.
     *
     * @var array<string, string>
     */
    protected $rules = [
        'nama'            => 'required|string|max:255',
        'jenis_kelamin'   => '',
        'no_telepon'      => 'digits_between:10,15',
        'alamat'          => 'min:10|max:255',
        'status'          => 'required|in:USER,ADMIN',
        'username'        => 'min:5|max:255|unique:users,username',
        'email'           => 'required|email|unique:users,email',
        'gambar'          => 'max:200',
        'password'        => 'required|min:8',
    ];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'divisi_id', 'id');
    }
}
