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
    $(target).parent().parent().find('[name="pbprice1"]').val( Math.round( sPrice/( 1.0+ 1.1*vat ) ) );
    
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