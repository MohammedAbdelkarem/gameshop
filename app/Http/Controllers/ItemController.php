<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdRequest;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\ItemUpdateRequest;
use App\Http\Resources\ItemResource;
use Symfony\Component\HttpFoundation\Response;

class ItemController extends Controller
{
    use ResponseTrait;

    public function addItem(ItemRequest $request)
    {
        $data = $request->validated();

        Item::create($data);

        return $this->SendResponse(response::HTTP_CREATED , 'item created with success');
    }
    public function updateItem(ItemUpdateRequest $request)
    {
        $data = $request->validated();

        // dd($data);

        $id = $request->validated()['id'];

        Item::find($id)->update($data);

        return $this->SendResponse(response::HTTP_OK , 'item updated with success');
    }
    public function deleteItem(IdRequest $request)
    {
        $id = $request->validated()['id'];

        Item::find($id)->delete();

        return $this->SendResponse(response::HTTP_OK , 'item deleted with success');
    }
    public function itemDetails(IdRequest $request)
    {
        $id = $request->validated()['id'];

        $data = Item::find($id);

        $data = new ItemResource($data);

        return $this->SendResponse(response::HTTP_OK , 'item details retrieved with success' , $data);
    }
    public function movies()
    {
        $data = Item::where('category_id' , 1)->get();

        $data = ItemResource::collection($data);

        return $this->SendResponse(response::HTTP_OK , 'movies retrieved with success' , $data);
    }
    public function serieses()
    {
        $data = Item::where('category_id' , 4)->get();

        $data = ItemResource::collection($data);

        return $this->SendResponse(response::HTTP_OK , 'serieses retrieved with success' , $data);
    }
    public function courses()
    {
        $data = Item::where('category_id' , 3)->get();

        $data = ItemResource::collection($data);

        return $this->SendResponse(response::HTTP_OK , 'courses retrieved with success' , $data);
    }
    public function games()
    {
        $data = Item::where('category_id' , 2)->get();

        $data = ItemResource::collection($data);

        return $this->SendResponse(response::HTTP_OK , 'games retrieved with success' , $data);
    }
    public function search(Request $request)
    {
        $field = $request->field;
        $data = Item::
        where('name', 'LIKE', "%$field%")
        ->orwhereHas('category', function ($query) use ($field) {
            $query->where('name', $field);
        })
        ->get();
        
        if($data->isEmpty())
        {
            return $this->SendResponse(response::HTTP_OK  , 'no results');
        }

        $data = ItemResource::collection($data);

        return $this->SendResponse(response::HTTP_OK , 'results retrieved with success' , $data);
    }
}
