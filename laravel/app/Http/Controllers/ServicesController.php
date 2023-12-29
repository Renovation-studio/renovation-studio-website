<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @OA\Info(
 *     description="Документация представляет собой REST API методы для взаимойствия с базой данных ",
 *     version="1.0.0",
 *     title="REST API студии ремонта (список методов, для работы с таблицами ремонтов)."
 * )
 */

class ServicesController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/catalog",
     *     summary="Список комплексных ремонтов",
     *     description="Возвращает весь список комплексных ремонтов.",
     *     @OA\Response(
     *         response=200,
     *         description="Комплексные ремонты",
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Записи не найдены",
     *     )
     * )
     */
    public function index(): Collection
    {
        return Services::all();
    }

    /**
     * @OA\Get(
     *     path="/api/search?q={string}",
     *     summary="Поиск элементов",
     *     description="Возвращает весь список комплексных ремонтов, который соответствует подстроке, введенной в запросе.",
     *     @OA\Parameter(
     *         name="string",
     *         description="После GET-параметра q необходимо ввести название интересующего комплексного ремонта.",
     *         in="path",
     *         required=true,
     *         example="кухни"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Комплексные ремонты",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Строка оказалась пустой, или не был обнаружен GET-параметр q.",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Не удалось найти записи по данной строке",
     *     )
     * )
     */
    public function search(Request $request): Collection | Response
    {
        $q = trim($request->get('q'));

        if ($q) {
            $collection = Services::query()->whereRaw('LOWER(title) LIKE ?', ["%" . mb_strtolower($q) . "%"])->get();

            return ($collection->count() > 0) ? $collection : response('Nothing was found', 404);
        } else {
            return response('Enter search string', 400);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/catalog/{id}",
     *     summary="Список элементов по комплексному ремонту",
     *     description="Возвращает все услуги, которые входят в состав комплексного ремонта. ",
     *     @OA\Parameter(
     *         name="id",
     *         description="id записи с комплексным ремонтом",
     *         in="path",
     *         required=true,
     *         example="1"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Список услуг, входящих в состав комплексного",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Nothing was found",
     *     )
     * )
     */
    public function show(string $id): Collection | Response
    {
        $result = Services::find($id);

        return $result ? $result->elements()->get() : response('Nothing was found', 404);
    }
}
