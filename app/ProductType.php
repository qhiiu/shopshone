<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table="type_products";
    public function product()
    {
        return $this -> hasMany('App\Product','id_type','id');
        // do 1 type_product có nhiều product do đó ta cần tạo function
        // như trên với jai tham số là id khóa ngoại và id khóa chsinh của bảng product

    }
}
