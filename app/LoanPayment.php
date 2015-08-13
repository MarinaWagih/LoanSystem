<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class LoanPayment extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'loan_payment';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                            'loan_id',
                            'quantity',
                            'date',
                            ];
    /**
     * @var array Of dates to be treated as Carbon Object
     */
    protected  $dates=['date'];
    /**
     * LoanPayment for a Loan  Relation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function loan()
    {
        return $this->belongsTo('App\Loan');
    }

    /**
     * To Parse Date to A carbon Obj
     * @param $date
     */
    public function setDateAttribute($date)
    {
        $this->attributes['date']=Carbon::parse($date);
    }
}
