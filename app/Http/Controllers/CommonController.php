<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
/*
 * Models
 */
use App\AdminModel\Product\AdminCategory;
use App\AdminModel\City\AdminCity;
use App\AdminModel\Color\AdminColor;
use App\AdminModel\AdminCountry;
use App\AdminModel\Order\AdminOrderStatus;
use App\AdminModel\GeneralSetting\HomeSlider\AdminHomeSlider;
use App\AdminModel\Product\AdminProduct;
use App\AdminModel\Size\AdminSize;
use App\Helpers\Helper;

class CommonController extends Controller
{

    public function changeOrder(Request $request)
    {
        $validate = $request->validate([
            'sorting' => 'required',
            'model'   => 'required',
            'order'   => 'required',
                ], [
            'sorting.required' => 'Sorting is required',
            'model.required'   => 'Model is required',
            'order.required'   => 'Order is required',
        ]);


        $response = [
            'status'        => false,
            'messageStatus' => 'error',
            'message'       => 'Something went wrong! Please try again'
        ];

        $requestModel = $request->model;

        $model = false;

        if ($requestModel == 'AdminCategory')
        {
            $model = new AdminCategory();
        }
        else if ($requestModel == 'AdminCity')
        {
            $model = new AdminCity();
        }
        else if ($requestModel == 'AdminColor')
        {
            $model = new AdminColor();
        }
        else if ($requestModel == 'AdminSize')
        {
            $model = new AdminSize();
        }
        else if ($requestModel == 'AdminCountry')
        {
            $model = new AdminCountry();
        }
        else if ($requestModel == 'AdminOrderStatus')
        {
            $model = new AdminOrderStatus();
        }
        else if ($requestModel == 'AdminHomeSlider')
        {
            $model = new AdminHomeSlider();
        }
        else if ($requestModel == 'HomeCategorySection')
        {
            $model = new HomeCategorySection();
        }
        else if ($requestModel == 'AdminProduct')
        {
            $model = new AdminProduct();
        }

        if ($model)
        {
            $changed = Helper::changeOrder($model, $request->sorting, $request->order);
            if ($changed)
            {
                $response = [
                    'status'        => true,
                    'messageStatus' => 'success',
                    'message'       => 'Sorting order changed successfully'
                ];
            }
        }
        \Illuminate\Support\Facades\Session::flash($response['messageStatus'], $response['message']);
        return $response;
    }

}
