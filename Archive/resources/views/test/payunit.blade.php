<html>
<body>
	<?php
		$myPayment = new \SevenGps\PayUnit(
      "d7f758e26557f0e5aefa4b924872251e690e9a85",
      "3649dd30-3eff-46c8-a8ae-32bd59509a98",
      "payunit_sand_A6Euzwxda",
      url('voting/payment/confirm'),
      url('voting/payment/confirm'),
      "test",
      "payment for vote",
      "1",
      "XAF",
      "Sound From Heaven",
      "100"
    );

		$myPayment->makePayment("150");
	?>
</body>
</html>