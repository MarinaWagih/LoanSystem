<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'loans';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                        'company_id',
                        'quantity',
                        'start_date',
                        'due_date',
                        'Benefits'
                        ];

    /**
     * @var array Of dates to be treated as Carbon Object
     */
    protected  $dates=['start_date','due_date'];
    /**
     * Company Takes a Loan Relation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    /**
     * Loan Payed by many LoanPayment Relation
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loanPayments()
    {
        return $this->hasMany('App\LoanPayment');
    }

    /**
     * to set the start_date attribute to Carbon when add new
     * @param $date
     */
    public function setStartDateAttribute($date)
    {
        $this->attributes['start_date']=Carbon::parse($date);
    }

    /**
     * to set the due_date attribute to Carbon when add new
     * @param $date
     */
    public function setDueDateAttribute($date)
    {
        $this->attributes['due_date']=Carbon::parse($date);
    }
    public function loanPaymentsSum()
    {
        $sum=0;
       foreach($this->loanPayments as $payment)
       {
           $sum+=$payment->quantity;
       }
        return $sum;
    }
}
