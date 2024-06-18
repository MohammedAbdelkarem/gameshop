<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    use ResponseTrait;

    public function categories()
    {
        $records = Category::get();

        return $this->SendResponse(response::HTTP_OK , 'categories retrieved with success' , $records);
    }
}
