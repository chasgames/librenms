<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Service extends DeviceRelatedModel
{
    public $timestamps = false;
    protected $primaryKey = 'service_id';

    // ---- Query Scopes ----

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeIsOk($query)
    {
        return $query->where([
            ['service_ignore', '=', 0],
            ['service_disabled', '=', 0],
            ['service_status', '=', 0],
        ]);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeIsCritical($query)
    {
        return $query->where([
            ['service_ignore', '=', 0],
            ['service_disabled', '=', 0],
            ['service_status', '=', 2],
        ]);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeIsWarning($query)
    {
        return $query->where([
            ['service_ignore', '=', 0],
            ['service_disabled', '=', 0],
            ['service_status', '=', 1],
        ]);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeIsIgnored($query)
    {
        return $query->where([
            ['service_ignore', '=', 1],
            ['service_disabled', '=', 0],
        ]);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeIsDisabled($query)
    {
        return $query->where('service_disabled', 1);
    }
}
