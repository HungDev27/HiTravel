<?php

namespace App\Http\Controllers;

use App\Models\DatTour;
use App\Models\ThanhToan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CheckoutController
{
    private $vnp_TmnCode    = "MUAP6QM1";   // dùng 1 bộ duy nhất
    private $vnp_HashSecret = "XIWHI99518JWD94QL9737ZS6EHYOWXJL";
    private $vnp_Url        = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";

    // Return URL về Laravel
    private $vnp_Returnurl  = "http://127.0.0.1:8000/payment/vnpay/return";


    # ===========================================================
    # 1) TẠO LINK THANH TOÁN
    # ===========================================================
    public function vnpay_payment(Request $request)
    {
        $data = $request->all();

        $vnp_TxnRef = rand(1, 99999);
        $vnp_Amount = $data['total_vnpay'] * 100;
        $vnp_IpAddr = $request->ip();

        $inputData = [
            "vnp_Version"    => "2.1.0",
            "vnp_Command"    => "pay",
            "vnp_TmnCode"    => $this->vnp_TmnCode,
            "vnp_Amount"     => $vnp_Amount,
            "vnp_CurrCode"   => "VND",
            "vnp_TxnRef"     => $vnp_TxnRef,
            "vnp_OrderInfo"  => "Thanh toán đơn hàng #" . $vnp_TxnRef,
            "vnp_OrderType"  => "billpayment",
            "vnp_Locale"     => "vn",
            "vnp_ReturnUrl"  => $this->vnp_Returnurl,
            "vnp_IpAddr"     => $vnp_IpAddr,
            "vnp_CreateDate" => date('YmdHis'),
        ];

        ksort($inputData);

        $hashdata = urldecode(http_build_query($inputData));
        $vnp_SecureHash = hash_hmac('sha512', $hashdata, $this->vnp_HashSecret);

        $paymentUrl = $this->vnp_Url . "?" . http_build_query($inputData) . "&vnp_SecureHash=" . $vnp_SecureHash;

        return response()->json([
            "status" => true,
            "payment_url" => $paymentUrl
        ]);
    }


    # ===========================================================
    # 2) RETURN URL – VERIFY CHUẨN
    # ===========================================================
    public function vnpay_return(Request $request)
    {
        $inputData = $request->all();
        $vnp_SecureHash = $inputData['vnp_SecureHash'] ?? '';

        unset($inputData['vnp_SecureHash'], $inputData['vnp_SecureHashType']);
        ksort($inputData);

        $hashData = urldecode(http_build_query($inputData));
        $secureHash = hash_hmac('sha512', $hashData, $this->vnp_HashSecret);

        if ($secureHash !== $vnp_SecureHash) {
            return response()->json(["status" => false, "message" => "Sai chữ ký!"]);
        }

        if ($inputData['vnp_ResponseCode'] == '00') {
            return response()->json([
                "status" => true,
                "message" => "Thanh toán thành công",
            ]);
        }

        return response()->json(["status" => false, "message" => "Thanh toán thất bại"]);
    }
}
