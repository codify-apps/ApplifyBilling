<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New Bill | Purple Scratch iStore</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<style type="text/css">
@media print {
    div {page-break-after: avoid;}
}
</style>
</head>
<body>
<!-- start wrap -->
<div class="wrap">
    <!-- start box -->
    <form class="">
    <div id="box">
        <!-- start header -->
        <div id="header">
            <!-- start logo -->
            <div id="logo">
                <a href="#" title="Purple Scratch iStore Logo"><img src="images/logo.tiff" width="285" height="70" /></a>
            </div>
            <div id="header-center">
                <a href="#" title="Purple Scratch iStore Logo"><img src="images/ar.tiff" width="180" height="70" /></a>
            </div>
            <!-- end logo -->
            <!-- start header right -->
            <div id="header_right">
                <h3>Invoice </h3><h3 class="invoice"></h3>
                <!-- <p><b></b> -->
                </p>
                <p><?php date_default_timezone_set("Asia/Calcutta");
                  echo date("D, d M Y h:i:s a")?></p>
            </div>
            <!-- end header right -->
        </div>
        <!-- end header -->
        <!-- start details -->
        <div id="details">
            <!-- start invoice-from -->
            <div class="invoice-to">
              <center>
                <h3>Name:</h3> <input type="text" name="usersname">
            </center>
            </div>
            <!-- end invoice-from -->
            <!-- start invoice-to -->
            <div class="invoice-contact">
              <center>
                <h3>Contact:</h3> <input type="text" name="contact">
            </center>
            </div>
            <!-- end invoice-to -->
            <!-- start invoice-desc -->
            <div class="invoice-email">
              <center>
                <h3>e-mail:</h3> <input type="text" name="email">
              </center>
            </div>
             <!-- end invoice-desc -->
            <div class="invoice-store">
              <center>
              <h3> Payment Mode : </h3>
              <select id="mode" required>
                <option value="">None</option>
                <option value="cash">Cash</option>
                <option value="card">Card</option>
                <option value="bajajfin">Bajaj Finance</option>
                <option value="cheque">Cheque</option>
              </select>
            </center>

            </div>
        </div>
        <!-- end details -->
        <div class="clear"></div>

        <!-- start table -->
        <div id="table">
            <table border="0" cellpadding="0" cellspacing="0" class="summary1" id="myTable">
                <thead>
                    <tr>
                        <th style=" ">Product Name</th>
                        <th width="99" style=" ">SKU/IMEI</th>
                        <th width="99" style=" ">Sr. No.</th>
                        <th width="99" style="text-align: center;  ">S.Price</th>
                        <th width="99" style="text-align: center;  ">VAT</th>
                        <th width="99" style="text-align: center;  ">B.Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="pname1" ></td>
                        <td><input type="text" name="psku1" ></td>
                        <td><input type="text" name="psrno1" ></td>
                        <td style="text-align: center"><input type="text" name="psprice1" onchange="onChange(this)" ></td>
                        <td style="text-align: center"><input type="text" name="pvat1" onchange="onChange(this)"></td>
                        <td style="text-align: right"><input type="text" name="pbprice1" disabled ></td>
                    </tr>

                    <tr class="sfoot">
                      <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td style="border-left: 1px solid black; border-top: 1px solid black;">VAT</th>
                        <td style="border-left: 1px solid black; border-top: 1px solid black; border-right: 1px solid black;" name ="vatTotal">0.0</th>
                    </tr>

                    <tr class="sfoot">
                      <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td style="border-left: 1px solid black; border-top: 1px solid black;">Surcharge</th>
                        <td style="border-left: 1px solid black; border-top: 1px solid black; border-right: 1px solid black;" name="surTotal">0.0</th>
                    </tr>
                    <tr class="tfoot">
                        <td>Cashier id: </td>
                        <td><select id="storeid">
                          <option value="jaspal">4816 (Jaspal Singh)</option>
                          <option value="chhinder">4817 (Chhinder Pal)</option>
                        </select></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td style="border-top: 1px solid black;">G. Total</th>
                        <td style="border: 1px solid black" name="sTotal">0.0</th>
                    </tr>
                </tbody>
          </table>
        </div>
        <!-- end table -->
        <div class="clear"></div>
        <!-- start payment -->
        <div id="payment">
          <input type="button" value = "Add New Row" onclick = "addNewRow()">
        </div>
        <div id="payment">
          <input type="button" value="Submit" onclick="disable()">
          <input type="button" value = "Clear Fields" onclick = "clearAll()">
        </div>
      </form>

        <!-- end payment -->
    </div>
    <!-- end box -->
</div>

<script>

$.get( "invoice.txt", function( data ) {
  $( ".invoice" ).text( data );
});
var i=1;
var totalPPrice=0;
var totalBPrice=0;
var vatTotal = 0;
var surTotal = 0;
var totalSPrice=0;
function addNewRow()
{
        var table = document.getElementById("myTable");
        var row = table.insertRow(++i);
        var cell0 = row.insertCell(0);
        cell0.innerHTML ='<input type="text" name="pname1" >' ;
        var cell1 = row.insertCell(1);
        cell1.innerHTML = '<input type="text" name="psku1" >';
        var cell2 = row.insertCell(2);
        cell2.innerHTML = '<input type="text" name="psrno1" >';
        var cell3 = row.insertCell(3)
        cell3.innerHTML = '<input type="text" name="psprice1" onchange="onChange(this)">';
        var cell4 = row.insertCell(4)
        cell4.innerHTML = '<input type="text" name="pvat1" onchange="onChange(this)">';
        var cell5 = row.insertCell(5);
        cell5.innerHTML = '<input type="text" name="pbprice1" disabled>';
}

function disable()
{

    var e = document.getElementById("mode");
    var strUser = e.options[e.selectedIndex].text;
    if(strUser == "None")
    {
        alert("Choose payment mode");
        return;
    }
    var table = document.getElementById("myTable")

    var inputFields = document.querySelectorAll('input[type="text"]');
    var topElement ={};

    var rowsInfo = table.rows;
    var newObj ={};

    for(k=1;k<= i ; k++)
    {
        for (l=0;l<rowsInfo[k].cells.length;l++)
        {
            newObj[k + $(rowsInfo[k]).find('input')[l].getAttribute("name")] = $(rowsInfo[k]).find('input')[l].value;
        }
    }
    for (j = 0; j < inputFields.length; j++) {
        inputFields[j].disabled =true;
    }
    newObj["PPrice"]= totalSPrice;
    newObj["VatPrice"]= vatTotal;
    newObj["surTotal"] = surTotal;
    newObj["usersname"] = $('[name="usersname"]').val() ;
    newObj["contact"] = $('[name="contact"]').val() ;
    newObj["email"] = $('[name="email"]').val() ;
    newObj["storeid"] = $( "#storeid option:selected" ).text() ;
    newObj["count"]= i;
    newObj["invoice"]= $('.invoice').text();
    newObj["mode"] = strUser;

    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    }
    if(mm<10){
        mm='0'+mm
    }
    var today = dd+'/'+mm+'/'+yyyy;
    newObj["date"] = today;

$.ajax({
   url: "bill.php",
   type: "POST",
    data : newObj,
   dataType: "json",
     cache: false,
   success: function(html){
        printBill(html);
   },
      error: function(html){
        printBill(html.responseText);
   }
 });


$.ajax
    ({
        type: "GET",
        dataType : 'json',
        async: false,
        url: 'write.php',
        data: { data: JSON.stringify(newObj) },
        success: function () {alert("Thanks!"); },
        failure: function() {alert("Error!");}
    });

}

function printBill(html)
{
     var newWin= window.open("");
     newWin.document.open();
     newWin.document.write(html);
     newWin.document.close();
     newWin.focus();
}
function onChange(target)
{
    var vat =0;
    var sPrice =0;
    if($(target).attr('name') == 'pvat1')
    {
        vat = target.value;
        sPrice = $(target).parent().parent().find('[name="psprice1"]').val();
        if(!parseFloat(vat))
        {
            vat =0.0;
            target.value = vat;
        }
        if(!parseFloat(sPrice))
        {
            sPrice =0.0;
            $(target).parent().parent().find('[name="psprice1"]').val(sPrice);
        }
    }
    else
    {
        sPrice = target.value;
        vat = $(target).parent().parent().find('[name="pvat1"]').val();
        if(!parseFloat(sPrice))
        {
            sPrice =0.0;
            target.value = sPrice;
        }
        if(!parseFloat(vat))
        {
            vat =0.0;
            $(target).parent().parent().find('[name="pvat1"]').val( vat);
        }
    }
    $(target).parent().parent().find('[name="pbprice1"]').val( Math.round( sPrice/( 1.0+ 1.1*vat*0.01 ) ) );

    totalSPrice=0;
    $('[name="psprice1"]').each(function( index ) {
            var price = $( this ).val();
            if ( parseFloat( price ) )
            {
                totalSPrice = totalSPrice+ parseFloat( price );
            }
    });
    $('[name="sTotal"]').text(totalSPrice);
    totalBPrice=0;
    $('[name="pbprice1"]').each(function( index ) {
            var price = $( this ).val();
            if ( parseFloat( price ) )
            {
                totalBPrice = totalBPrice+ parseFloat( price );
            }
    });
    vatTotal=0;
    vatTotal = Math.round((totalSPrice - totalBPrice)*0.9090);
    $('[name="vatTotal"]').text(vatTotal);
    surTotal=0;
    surTotal = totalSPrice - totalBPrice - vatTotal;
    $('[name="surTotal"]').text(surTotal);

}

function clearAll()
{
    location.reload(true);
}

</script>
<!-- end wrap -->
</body>
</html>
