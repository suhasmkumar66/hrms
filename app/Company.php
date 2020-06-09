<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'created_by', 'company_name','company_code', 'publication_status', 'company_description','company_logo','company_website','company_contact_number','company_email'
    ];
}
