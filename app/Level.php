<?php
/**
 * Gamify - Gamification platform to implement any serious game mechanic.
 *
 * Copyright (c) 2018 by Paco Orozco <paco@pacoorozco.info>
 *
 * This file is part of some open source application.
 *
 * Licensed under GNU General Public License 3.0.
 * Some rights reserved. See LICENSE, AUTHORS.
 *
 * @author             Paco Orozco <paco@pacoorozco.info>
 * @copyright          2018 Paco Orozco
 * @license            GPL-3.0 <http://spdx.org/licenses/GPL-3.0>
 *
 * @link               https://github.com/pacoorozco/gamify-laravel
 */

namespace Gamify;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model that represents a badge.
 *
 * @property int    $id                    Object unique id.
 * @property string $name                  Name of the level..
 * @property int    $required_points       How many points do you need to achieve it.
 * @property string image_url              URL of the level's image
 * @property bool   active                 Is this level enabled?
 */
class Level extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'levels';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'required_points',
        'image_url',
        'active',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'int',
        'name' => 'string',
        'required_points' => 'int',
        'image_url' => 'string',
        'active' => 'boolean',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Returns Image URL.
     *
     * @return string
     */
    public function getImageURL(): string
    {
        return asset('images/missing_level.png');
    }

    /**
     * Returns a collection of active Level.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    /**
     * Returns Level (object) for the specified experience.
     *
     * @param int $experience
     *
     * @return \Gamify\Level
     */
    public static function findByExperience(int $experience)
    {
        return self::active()
            ->where('required_points', '<=', $experience)
            ->orderBy('required_points', 'desc')
            ->first();
    }

    /**
     * Return the upcoming Level (object) for the specified experience.
     *
     * Throws an exception in case that this is the highest possible level.
     *
     * @param int $experience
     *
     * @return \Gamify\Level
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public static function findNextByExperience(int $experience)
    {
        return self::active()
            ->where('required_points', '>', $experience)
            ->orderBy('required_points', 'asc')
            ->firstOrFail();
    }

    /**
     * Returns if this is the default level.
     *
     * @return bool
     */
    public function isDefault(): bool
    {
        return $this->required_points === 0;
    }
}
