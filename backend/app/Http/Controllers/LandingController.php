<?php

namespace App\Http\Controllers;

use App\Entities\ApiResult;
use App\Models\Service;
use App\Models\Review;
use App\Models\City;
use App\Models\DataFromForm;
use App\Models\Portfolio;

class LandingController extends Controller
{
    public function index()
    {
        $cities = City::all();
        $services = Service::all();
        $data_from_form = DataFromForm::all();
        $reviews = Review::all();
        $portfolios = Portfolio::all();

        return (string) view('data.index', compact('cities', 'services', 'data_from_form', 'reviews', 'portfolios'));
    }

    public function citiesGetAction()
    {
        $cities = City::all()->toArray();

        return new ApiResult(data: $cities );
    }

    public function servicesGetAction()
    {
        $services = Service::query()->with(['picture'])->get()->map(function($service) {
            $result = array_merge($service->toArray(), ['picture' => $service->picture->path]);
            unset($result['picture_id']);
            return $result;
        })->toArray();
        //$services = Service::query()->with(['picture'])->get()->map(fn($service) => array_merge($service->toArray(), ['picture' => $service->picture->src]))->toArray();
        //$services = Service::all()->toArray();

        return new ApiResult(data: $services);
    }

    public function reviewsGetAction()
    {
        $reviews = Review::query()->with(['picture'])->get()->map(function($reviews) {
            $result = array_merge($reviews->toArray(), ['picture' => $reviews->picture->path]);
            unset($result['picture_id']);
            return $result;
        })->toArray();
        //$reviews = Review::all()->toArray();

        return new ApiResult(data: $reviews);
    }

    public function dataFromFormGetAction()
    {
        $data_from_form = DataFromForm::all()->toArray();

        return new ApiResult(data: $data_from_form);
    }

    public function portfoliosGetAction()
    {
        $portfolios = Portfolio::query()->with(['picture0','picture1','picture2','picture3',])
            ->get()
            ->map(function($portfolio) {
                $result = array_merge($portfolio->toArray(), [
                    'pictures' => [
                        $portfolio->picture0->path,
                        $portfolio->picture1->path,
                        $portfolio->picture2->path,
                        $portfolio->picture3->path
                    ]
                ]);
                unset($result['picture0_id'], $result['picture1_id'], $result['picture2_id'], $result['picture3_id']);
                unset($result['picture0'], $result['picture1'], $result['picture2'], $result['picture3']);
                return $result;
            })->toArray();

        return new ApiResult(data: $portfolios);
    }
}