<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('bill.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function get(Request $request)
    {
        $billingDate = $request->input('billingDate');

        // Calculate the start and end date of the billing period
        $startDate = date('Y-m-d', strtotime("$billingDate -1 month +20 days"));
        $endDate = date('Y-m-d', strtotime("$billingDate +19 days"));
        // Retrieve orders for the given period
        $orders = Order::whereBetween('order_date', [$startDate, $endDate])->get();
        $csvData = [];
        
        // Group orders by user email and calculate total amount for each user
        $ordersByUser = $orders->groupBy('email');
        foreach ($ordersByUser as $email => $userOrders) {
            $totalOrders = $userOrders->count();
            $totalAmount = 500 * $totalOrders;
            // Retrieve user information
            $user = User::where('email', $email)->first();

            // Build CSV row
            $csvRow = [
                '処理タイプ' => 4,
                '決済番号' => $user->payment_num,
                '店舗オーダ' => $user->order_num,
                'ジョブタイプ' => 'CAPTURE',
                '決済金額' => $totalAmount,
                '税金額' => 0,
                '送料' => 0,
            ];

            $csvData[] = $csvRow;
        }

        // Generate CSV file
        $csvFileName = '決済_' . $billingDate . '.csv';
        $csvDirectory = storage_path('payment_csv');
        $csvFilePath = $csvDirectory . '/' . $csvFileName;

        // Ensure directory exists
        if (!file_exists($csvDirectory)) {
            mkdir($csvDirectory, 0755, true);
        }

        $file = fopen($csvFilePath, 'w');
        fputcsv($file, array_keys($csvData[0])); // Write CSV header
        foreach ($csvData as $row) {
            fputcsv($file, $row); // Write CSV rows
        }
        fclose($file);

        if ($file) {
            return response()->json(['csvFilePath ' => $csvFilePath, 'csvFileName' => $csvFileName], 200);
        } else {
            return response()->json(['message' => 'エラーが発生しました。'], 401);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
