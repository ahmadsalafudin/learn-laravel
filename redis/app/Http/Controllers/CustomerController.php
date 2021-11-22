<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $data = Customer::all();
        return response()->json($data);
    }

    public function redis()
    {
        $customers = Cache::remember('customers', now()->addMinutes(150), function () {
            $data = [];
            $dataCust = DB::table('customers')->get();

            foreach ($dataCust as $key) {
                $data[] = [
                    'id' => $key->id,
                    'name' => $key->name,
                    'address' => $key->address,
                    'created_at' => $key->created_at,
                    'updated_at' => $key->updated_at,
                ];
            }
            return $data;
        });

        if ($customers) {
            return response()->json($customers);
        } else {
            return response()->json([
                'message' => 'Data Not Found',
            ], 400);
        }
    }
}
