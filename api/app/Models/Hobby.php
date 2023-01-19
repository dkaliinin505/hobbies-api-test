<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Hobby
 *
 * @method static create(array $validatedData)
 * @property $name
 * @property $hobby_types_id
 * @property $updated_at
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property-read \App\Models\HobbyType|null $type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Hobby newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hobby newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hobby query()
 * @method static \Illuminate\Database\Eloquent\Builder|Hobby whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hobby whereHobbyTypesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hobby whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hobby whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hobby whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Hobby extends Model
{
    /**
     * @var mixed|string
     */
    protected $fillable = [
        'name',
        'hobby_types_id'
    ];

    use HasFactory;

    public function type()
    {
        return $this->hasOne(HobbyType::class, 'id', 'hobby_types_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_hobby', 'hobby_id', 'user_id');
    }
}
