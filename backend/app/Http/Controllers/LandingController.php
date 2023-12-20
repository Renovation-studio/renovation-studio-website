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
        $services = Service::all()->toArray();

        return new ApiResult(data: $services);
    }

    public function reviewsGetAction()
    {
        $reviews = Review::all()->toArray();

        return new ApiResult(data: $reviews);
    }

    public function dataFromFormGetAction()
    {
        $data_from_form = DataFromForm::all()->toArray();

        return new ApiResult(data: $data_from_form);
    }

    public function portfoliosGetAction()
    {
        $portfolios = Portfolio::all()->toArray();

        return new ApiResult(data: $portfolios);
    }


//
//    public function cityGetAction(Request $request)
//    {
//        $request->validate([
//            'id' => ['required']
//        ]);
//
//        $cities = City::all()->toArray();
//
//        return new ApiResult(data: $cities);
//    }

}
