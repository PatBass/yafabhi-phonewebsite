/**
 * Created by Patrick on 4/12/14.
 */
var wss_array=['<img src="../images/Phone_YF02Z_RED_FACE.png">', '<img src="../images/Phone_YF02Z_RED_BACK.png">', '<img src="../images/phone_lowcost.png">', 'Média'];
var wss_elem;
var wss_i=0;
function wssAdd()
{
    wss_elem.innerHTML='wss_array[wss_i]';
    wss_elem.style.opacity=1;
    setTimeout('wssNext()', 2000);
}

function wssNext()
{
    wss_i++;
    wss_elem.style.opacity=0;
    if(wss_i>(wss_array.length-1))
    {
        wss_i=0;
    }
    setTimeout('wssAdd()',1000);
}
