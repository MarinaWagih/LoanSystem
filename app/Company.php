<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'companies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Company can take many loans Relation
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function loans()
    {
        return $this->hasMany('App\Loan');
    }

    /**
     * Company Owned by many user Relation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function owners()
    {
        return $this->belongsToMany('App\User','company_user','company_id','user_id')
            ->withPivot('percentage');
    }
    public function owner_list()
    {
        $data =$this->owners->lists('id');
//        $data= '['.implode(',',$data).']';
        return $data;
    }
}
