<?php
$totalPrice = $_POST['total_price'];
$total_after = $totalPrice*100;

$some_data = array(
    'userSecretKey' => 'mq6lblam-skc4-4xfk-8i4i-u8mn0qfef07a',
    'categoryCode' => 'yg3x6sid',
    'billName' => 'Test Cart',
    'billDescription' => 'Nike Shoes Test Payment Gateway' ,
    'billPriceSetting' => 1,
    'billPayorInfo' => 1,
    'billAmount' => $total_after,
    'billReturnUrl' => 'https://www.megatirfan.com/cart/payment/payment_failed.php',
    'billCallbackUrl' => 'https://www.megatirfan.com/cart/payment/payment_success.php',
    'billExternalReferenceNo' => '',
    'billTo' => 'Tester', //select from database to echo the name
    'billEmail' => 'Tester@megatirfan.com', //select from database to echo the email
    'billPhone' => '0162748214', //select from database to echo the email
    'billSplitPayment' => 0,
    'billSplitPaymentArgs' => '',
    'billPaymentChannel' => 0,
);
$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_URL, 'https://toyyibpay.com/index.php/api/createBill');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);
$result = curl_exec($curl);
$info = curl_getinfo($curl);
curl_close($curl);
$obj = json_decode($result, true);
$billcode = $obj[0]['BillCode'];
?>
<!--SEND USER TO TOYYIBPAY PAYMENT-->
<script type="text/javascript">
    //redirect to payment gateway
    window.location.href = "https://toyyibpay.com/<?php echo $billcode; ?>";
</script>