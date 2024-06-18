<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubCategoryController extends Controller
{
    use ResponseTrait;
    public function subcategories()
    {
        $records = SubCategory::get();

        return $this->SendResponse(response::HTTP_OK , 'categories retrieved with success' , $records);
    }
}
