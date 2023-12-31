<?php

namespace Fintech\Airtime\Models;

use Fintech\Airtime\Traits\AuthRelations;
use Fintech\Airtime\Traits\BusinessRelations;
use Fintech\Airtime\Traits\MetaDataRelations;
use Fintech\Core\Traits\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternationalTopUp extends Model
{
    use AuditableTrait;
    use AuthRelations;
    use BusinessRelations;
    use MetaDataRelations;
    use SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'orders';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    protected $appends = ['links'];

    protected $casts = ['order_data' => 'array', 'restored_at' => 'datetime'];

    protected $hidden = ['creator_id', 'editor_id', 'destroyer_id', 'restorer_id'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function currentStatus(): mixed
    {
        return $this->status;
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /**
     * @return array
     */
    public function getLinksAttribute()
    {
        $primaryKey = $this->getKey();

        $links = [
            'show' => action_link(route('airtime.international-top-ups.show', $primaryKey), __('core::messages.action.show'), 'get'),
            'update' => action_link(route('airtime.international-top-ups.update', $primaryKey), __('core::messages.action.update'), 'put'),
            'destroy' => action_link(route('airtime.international-top-ups.destroy', $primaryKey), __('core::messages.action.destroy'), 'delete'),
            'restore' => action_link(route('airtime.international-top-ups.restore', $primaryKey), __('core::messages.action.restore'), 'post'),
        ];

        if ($this->getAttribute('deleted_at') == null) {
            unset($links['restore']);
        } else {
            unset($links['destroy']);
        }

        return $links;
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
