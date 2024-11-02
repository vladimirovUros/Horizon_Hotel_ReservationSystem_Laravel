<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActions extends Model
{
    protected $table = 'log_actions';
    use HasFactory;
    protected $fillable = [
        'ip_address',
        'user_id',
        'activity',
        'path'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function insert($ip, int|null $user, $activity, $path)
    {
        $this->ip_address = $ip;
        $this->user_id = $user;
        $this->activity = $activity;
        $this->path = $path;
        $this->save();
    }
    public function getAll()
    {
        return LogActions::with("user")->orderBy("created_at", "desc")->paginate(6);
    }
}
