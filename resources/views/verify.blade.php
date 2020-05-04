<?php
$MerchantCode = "";

if(isset($_POST['State']) && $_POST['State'] == "OK") {

    $soapclient = new soapclient('https://verify.sep.ir/Payments/ReferencePayment.asmx?WSDL');
    $res 		= $soapclient->VerifyTransaction($_POST['RefNum'], $MerchantCode);

    if( $res <= 0 )
    {
        // Transaction Failed
        echo "Transaction Failed";
    } else {
        // Transaction Successful
        echo "Transaction Successful";
        echo "Ref : {$_POST['RefNum']}<br />";
        echo "Res : {$res}<br />";
    }
} else {
    // Transaction Failed
    echo "Transaction Failed";
}
?>
