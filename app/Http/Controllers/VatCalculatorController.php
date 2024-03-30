<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class VatCalculatorController extends Controller
{
    public function index(){
        return view("admin.vat-calculator");
    }

    public function store(Request $request){

        $request->validate([
            'gross_sum' => 'required|numeric|min:0',
            'operation' => 'required|in:including,excluding', 
            'tax_percentage' => 'required_if:operation,including|numeric|min:0|max:100', 
        ]);

        try{
            $grossSum = $request->gross_sum;
            $operation = $request->operation; 
            $taxPercentage = $request->tax_percentage;

            if ($operation === 'including') {
                $netAmount = $grossSum / (1 + ($taxPercentage / 100));
                $vatAmount = $grossSum - $netAmount;
            } elseif ($operation === 'excluding') {
                $vatAmount = $grossSum * ($taxPercentage / 100);
                $netAmount = $grossSum + $vatAmount;
            } else {
                return response()->json(['error' => 'Invalid operation.'], 400);
            }

            return response()->json([
                'status'   => 'success',
                'net_amount' => round($netAmount, 2),
                'vat_amount' => round($vatAmount, 2),
                'operation' => $operation
            ]);
        }catch (Exception $e){
            return response()->json([
                'error'   => $e->getMessage(),
            ]);
        }
    }
}
