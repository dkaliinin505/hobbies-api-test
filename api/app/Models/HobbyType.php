<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\HobbyType
 *
 * @method static create(array $validatedData)
 * @property $name
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Hobby[] $hobbies
 * @property-read int|null $hobbies_count
 * @method static \Illuminate\Database\Eloquent\Builder|HobbyType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HobbyType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HobbyType query()
 * @method static \Illuminate\Database\Eloquent\Builder|HobbyType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HobbyType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HobbyType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HobbyType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class HobbyType extends Model
{
    use HasFactory;

    public function hobbies(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Hobby::class, 'hobby_types_id');
    }
}
