<?php

namespace City\Entities;

use Illuminate\Database\Eloquent\Model;

class ProviderFiles extends Model
{
    //
    protected $table = 'provider_files';
    protected $fillable =  ['name', 'provider_id','file_type_id', 'created_at', 'updated_at'];

    public function fileType(){
        return $this->hasOne(FileType::class);
    }
}