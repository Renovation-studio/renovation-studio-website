<?php

namespace App\Http\Controllers;

use App\Models\Elements;
use Illuminate\Database\Eloquent\Collection;

class ElementController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/elements",
     *     summary="Список всех услуг, входящих в комплексные ремонты",
     *     description="Возвращает список всех услуг, входящих в комплексные ремонты.",
     *     @OA\Response(
     *         response=200,
     *         description="Услуги",
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Записи не найдены",
     *     )
     * )
     */
    public function index(): Collection
    {
        return Elements::all();
    }
}
