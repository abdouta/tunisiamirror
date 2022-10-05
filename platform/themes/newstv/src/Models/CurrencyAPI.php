<?php

namespace Theme\NewsTv\Models;

use Botble\Base\Models\BaseModel;

class CurrencyAPI extends BaseModel
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'currencyapi';

    /**
     * The date fields for the model.clear
     *
     * @var array
     */


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'value',
        'updated_at',

    ];





    protected static function boot()
    {
        parent::boot();

        // self::deleting(function (Tag $tag) {
        //     $tag->posts()->detach();
        // });
    }
    protected static function InsertFromAPI($data,$lastUpdate)
    {

        foreach($data as $item){
            $model=CurrencyAPI::updateOrCreate(
                ['code' => $item->code],
                ['value' => $item->value,'updated_at' => $lastUpdate]
            );

        }

    }

}
