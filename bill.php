<html>
<head>
<style type="text/css">
@media print {
    div {page-break-after: avoid;}
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Billing | Purple Scratch iStore</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- start wrap -->
<div class="wrap">
    <div id="box">
    	<!-- start header -->
        <div id="header">
        	<!-- start logo -->
            <div id="logo">
            	<a href="#" title="Purple Scratch iStore Logo"><img src="images/logo.png" width="285" height="70" /></a>
            </div>
            <div id="header-center">
            	<a href="#" title="Purple Scratch iStore Logo"><img src="images/ar.png" width="180" height="70" /></a>
            </div>
            <!-- end logo -->
            <!-- start header right -->
            <div id="header_right">
            	<h3>Invoice <?php echo $_POST['invoice']; ?></h3>
                <!-- <p><b></b> -->
                <p><?php date_default_timezone_set("Asia/Calcutta");
                  echo date("D, d M Y h:i:s a")?></p>
            </div>
            <!-- end header right -->
        </div>
        <!-- end header -->
        <?php
        $lengthCells = $_POST['count'];
        $username=$_POST['usersname'];
        $contactno=$_POST['contact'];
        $email=$_POST['email'];
        $storeid=$_POST['storeid'];

        ?>
        <!-- start details -->
        <div id="details">
        	<!-- start invoice-from -->
            <div class="invoice-to">
              <center>
            	<h3>Name:</h3><?php echo $username; ?>
            </center>
            </div>
            <!-- end invoice-from -->
            <!-- start invoice-to -->
            <div class="invoice-contact">
              <center>
            	<h3>Contact:</h3><?php echo $contactno; ?>
            </center>
            </div>
            <!-- end invoice-to -->
            <!-- start invoice-desc -->
            <div class="invoice-email">
              <center>
            	<h3>e-mail:</h3><?php echo $email ?>
              </center>
            </div>
             <!-- end invoice-desc -->
            <div class="invoice-store">
              <center>
           	  <h3>Payment Mode:</h3><?php echo $_POST['mode']; ?>
            </center>

            </div>
        </div>
        <!-- end details -->
        <div class="clear"></div>

    	<!-- start table -->
    	<div id="table">
        	<table border="0" cellpadding="0" cellspacing="0" class="summary">
            	<thead>
                	<tr>
                      <th style="border-bottom: 1px solid #cecece;">Product Name</th>
                      <th width="99" style="border-bottom: 1px solid #cecece;">SKU/IMEI</th>
                      <th width="99" style="border-bottom: 1px solid #cecece;">Sr. No.</th>
                      <th width="99" style="text-align: center; border-bottom: 1px solid #cecece;">S.Price</th>
                      <th width="99" style="text-align: center; border-bottom: 1px solid #cecece;">VAT</th>
                      <th width="99" style="text-align: center; border-bottom: 1px solid #cecece;">B.Price</th>
                	</tr>
                </thead>
                <tbody>
                <?php
                    for ($i=1; $i<=$lengthCells; $i++)
                    {
                        $vat ="";
                        $bprice ="";
                        $sprice = "";
                        if($_POST[($i).'pvat1'] != "")
                        {
                            $vat = $_POST[($i).'pvat1'] .'%';
                        }
                        if($_POST[($i).'pbprice1'] != "")
                        {
                            $bprice = '₹ '. $_POST[($i).'pbprice1'];
                        }
                        if($_POST[($i).'psprice1'] != "")
                        {
                            $sprice = '₹ '. $_POST[($i).'psprice1'];
                        }

                        echo'<tr>
                        <td width="438">'.$_POST[($i).'pname1'].'</td>
                        <td width="99">'.$_POST[($i).'psku1'].'</td>
                        <td width="99">'.$_POST[($i).'psrno1'].'</td>
                        <td width="99" style="text-align: center;">'. $sprice .'</td>
                        <td width="99" style="text-align: center;">'. $vat .'</td>
                        <td width="99" style="text-align: center;">'. $bprice .'</td>
                        </tr>';
                    }
?>

                    <tr class="sfoot">
                      <td width="438">&nbsp;</td>
                        <td width="99">&nbsp;</td>
                        <td width="99">&nbsp;</td>
                        <td width="99">&nbsp;</td>
                        <td width="99" style="border-left: 1px solid black; border-top: 1px solid black;">VAT</th>
                            <?php echo '<td width="99" style="border-left: 1px solid black; border-top: 1px solid black; border-right: 1px solid black; text-align: center;">₹ '.$_POST['VatPrice'].'</th>' ?>
                        <!-- <td width="99" style="border: 1px solid black; ">23435</th> -->
                    </tr>

                    <tr class="sfoot">
                      <td width="438">&nbsp;</td>
                        <td width="99">&nbsp;</td>
                        <td width="99">&nbsp;</td>
                        <td width="99">&nbsp;</td>
                        <td width="99" style="border-left: 1px solid black; border-top: 1px solid black;">Surcharge</th>
                            <?php echo '<td width="99" style="border-left: 1px solid black; border-top: 1px solid black; border-right: 1px solid black; text-align: center">₹ '.$_POST['surTotal'].'</th>' ?>
                        <!-- <td width="99" style="border: 1px solid black">2345</th> -->
                    </tr>
                	<tr class="tfoot">
                    	<td width="438">&nbsp;</td>
                        <td width="99">&nbsp;</td>
                        <td width="99">&nbsp;</td>
                        <td width="99">&nbsp;</td>
                        <td width="99" style="border-top: 1px solid black;">G. Total</th>
                            <?php echo '<td width="99" style="border: 1px solid black;text-align: center; ">₹ '.$_POST['PPrice'].'</th>' ?>
                        <!-- <td width="99" style="border: 1px solid black">348754</th> -->
                    </tr>
                </tbody>
		  </table>
   	  	</div>
    	<!-- end table -->
        <div class="clear"></div>
        <!-- start payment -->
        <div id="payment">
          <b>Transaction Fee</b> : 1% on Debit Cards | 2% on Credit Cards | 2.5% on International Credit Cards	<br>
          Input Tax Credit is not available on this invoice | All disputes shall be subject to the jurisdiction of Patiala courts only | No Returns Accepted	<br>
          Purple Scratch iStore | SCO 90, New Leela Bhawan, Patiala 147001 Punjab | Ph: +91 175 222 5 666, +91 99 88 979 979
        </div>
    </div>

</div>


<!-- end wrap -->
</body>
</html>
