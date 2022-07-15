<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Card extends Model implements Sortable
{
    use SortableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cards';

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
    protected $fillable = ['column_id', 'title', 'description', 'position'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'position',
        'column_id',
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
     * Get the column that owns the card.
     */
    public function column()
    {
        return $this->belongsTo(Column::class);
    }

    /* 
    * Sortable fields array 
    */
    public $sortable = [
        'order_column_name' => 'position',
        'sort_when_creating' => true,
    ];
}
