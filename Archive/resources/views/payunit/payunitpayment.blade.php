<html>
<body>
    <?php
        $myPayment = new \SevenGps\PayUnit(
      "d7f758e26557f0e5aefa4b924872251e690e9a85",
      "3649dd30-3eff-46c8-a8ae-32bd59509a98",
      "payunit_sand_A6Euzwxda",
      url('payment/payunit/confirm'),
      url('payment/payunit/notifylater'),
      "test",
      "payment for vote",
      $payment['id'],
      "XAF",
      "Sound From Heaven",
      $payment['id']
    );

        $myPayment->makePayment("150");
    ?>
</body>
</html>