<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Billing | Purple Scratch iStore</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body onload="">
<!-- start wrap -->
<div class="wrap">
	<!-- start box -->
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
            	<h2>All Bills</h2>
                <!-- <p><b><?php date_default_timezone_set("Asia/Calcutta");
                  echo date("D, d M Y h:i:s a")?></b> -->
                
            </div>
            <!-- end header right -->
        </div>
        <!-- end header -->

        <!-- start details -->
        <!-- end details -->
        <div class="clear"></div>

    	<!-- start table -->
    	<div id="table">
        	<table border="0" cellpadding="0" cellspacing="0" class="summary">
            	<thead>
                </thead>
                <tbody>
                       
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
        <!-- end payment -->
    </div>
    <!-- end box -->
</div>
<script type="text/javascript">
    var arrBills = null;
    $.getJSON( "bill.json", function( data ) {
        arrBills = data;
        //Iterating each bill
        $.each(data, function (index, value) {
        
            
            strDetails = "<tr>\
                        <th width='438'>Name</th>\
                      <th width='99'>Contact</th>\
                      <th width='99'>E-Mail</th>\
                      <th width='99' style='text-align: center'>Store id</th>\
                      <th width='99' style='text-align: center'>Mode</th>\
                      <th width='99' style='text-align: center'>Invoice No</th>\
                    </tr>";
            strDetails = strDetails + "<tr> \
            <td width='438'>"+value.usersname+"</td>\
            <td width='99'>"+value.contact+"</td>\
            <td width='99'>"+value.email+"</td>\
            <td width='99' style='text-align: center'>"+value.storeid+"</td>\
            <td width='99' style='text-align: center'>"+value.invoice+"</td>\
            <td width='99' style='text-align: center'>"+value.mode+"</td>\
            </tr>";

            strDetails =  strDetails + "<tr>\
                        <th width='438'>Product Name</th>\
                      <th width='99'>SKU/IMEI</th>\
                      <th width='99'>Sr. No.</th>\
                      <th width='99' style='text-align: center'>S.Price</th>\
                      <th width='99' style='text-align: center'>VAT</th>\
                      <th width='99' style='text-align: center'>B.Price</th>\
                    </tr>";

            $('tbody').append(strDetails);

            for (var i =1 ;i <= value.count; i++) {

                pname=i+"pname1";
                psku1 = i +"psku1";
                psrno1 = i+ "psrno1";
                psprice =i+"psprice1";
                pvat1 = i+ "pvat1";
                pbprice = i+"pbprice1";
                SPrice = "";
                Vat = "";
                BPrice = "";
                if(value[psprice] != "" )
                    SPrice = "₹ " + value[psprice];
                if(value[pvat1] != "" )
                    Vat = value[pvat1] + "%";
                if(value[pbprice] != "" )
                    BPrice = "₹ " + value[pbprice];
                
                strPrices  =
                        "<tr> \
                        <td width='438'>"+value[pname]+"</td>\
                        <td width='99'>"+value[psku1]+"</td>\
                        <td width='99'>"+value[psrno1]+"</td>\
                        <td width='99' style='text-align: center'>"+SPrice+"</td>\
                        <td width='99' style='text-align: center'>"+  Vat +"</td>\
                        <td width='99' style='text-align: right'>"+ BPrice +"</td>\
                        </tr>";
            $('tbody').append(strPrices);
          };
             
                        str= "<tr class='sfoot'>\
                        <td width='438'>&nbsp;</td>\
                        <td width='99'>&nbsp;</td>\
                        <td width='99'>&nbsp;</td>\
                        <td width='99'>&nbsp;</td>\
                        <td width='99' style='border: 1px solid black;'>VAT</th>\
                        <td width='99' style='border: 1px solid black;'>₹ "+ value.VatPrice+"</th> \
                        </tr>\
                        <tr class='sfoot'>\
                        <td width='438'>&nbsp;</td>\
                        <td width='99'>&nbsp;</td>\
                        <td width='99'>&nbsp;</td>\
                        <td width='99'></td>\
                        <td width='99' style='border: 1px solid black'>Surcharge</th>\
                        <td width='99' style='border: 1px solid black'>₹ "+ value.surTotal+"</th> \
                        </tr>\
                        <tr class='tfoot'>\
                        <td width='438'>&nbsp;</td>\
                        <td width='99'>&nbsp;</td>\
                        <td width='99'>Date : "+ value.date +"</td>\
                        <td width='99'><button onclick='printBill("+index+")'>Print</button> </td>\
                        <td width='99' style='border: 1px 0px 1px 1px solid black'>G. Total</th>\
                        <td width='99' style='border: 1px solid black'>₹ "+value.PPrice+"</th> \
                        </tr>";

                        $('tbody').append(str);
                        $('.invoice-to center').append();
                        $('.invoice-to center').append();
                        $('.invoice-to center').append();
                        $('.invoice-to center').append();

                        strEmpty = "<tr>\
                        <th width='438'></th>\
                      <th width='99'></th>\
                      <th width='99'></th>\
                      <th width='99' style='text-align: center'></th>\
                      <th width='99' style='text-align: center'></th>\
                      <th width='99' style='text-align: center'></th>\
                    </tr>";
                    $('tbody').append(strEmpty);

        });
    
    });
    
    function printBill(index)
    {
        $.ajax({
            url: "bill.php",
            type: "POST",
            data : arrBills[index],
            dataType: "json",
            cache: false,
            success: function(html){
                singleBill(html);
            },
            error: function(html){
                singleBill(html.responseText);
            }
        });
    }
    function singleBill(html)
    {
         var newWin= window.open(""); 
        newWin.document.open();
        newWin.document.write(html);
        newWin.document.close();
        newWin.focus();
        newWin.print();
    }
</script>

<!-- end wrap -->
</body>
</html>
