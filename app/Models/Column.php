<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Column extends Model implements Sortable
{
    use SortableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'columns';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'position']; 

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [ 
        'updated_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
    ];

    /**
     * Get the cards for the column.
     */
    public function cards()
    {
        return $this->hasMany(Card::class)->orderBy('position','ASC');
    }

    /* 
    * Sortable fields array 
    */
    public $sortable = [
        'order_column_name' => 'position',
        'sort_when_creating' => true,
    ];
}
