<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use App\Traits\ResponseTrait;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ItemRequest extends FormRequest
{
    use ResponseTrait;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'size' => 'required|integer',
            'price' => 'required|integer',
            'rate' => 'integer',
            'resolution' => 'integer',
            'date' => 'date',
            'author' => 'string',
            'duration' => 'integer',
            'lang' => 'string',
            'category_id' => 'integer',
            'subcategory_id' => 'integer',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw (new HttpResponseException(
            $this->SendResponse(response::HTTP_UNPROCESSABLE_ENTITY , 'validation error' , $validator->errors()->toArray()))
        );
    }
}
