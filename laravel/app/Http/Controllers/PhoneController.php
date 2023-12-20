<?php

namespace App\Http\Controllers;

use App\Models\Phones;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/phone",
     *     summary="Эндпоинт для кнопки 'Оставить заяву'",
     *     description="Добавляет номер телефона и дату заявки в соответствующую таблицу",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="phone",
     *                     type="string",
     *                     format="phone",
     *                     description="Номер телефона в формате +7XXXXXXXXXX"
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="1 в случае успешного добавления, 0 в случае не успешного",
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Не удалось добавить данные",
     *     )
     * )
     */
    public function store(Request $request)
    {
        $phones = Phones::create([
            'phone' => $request['phone'],
        ]);

        return isset($phones->id);
    }
}
