/**
 * Created by Patrick on 4/11/14.
 */
function expand(element)
{
    var elem= document.getElementById(element);
    elem.style.display='block';
    var h=elem.offsetHeight;
    var sh=elem.scrollHeight;
    var loopTimer = setTimeout('expand(\''+element+'\')',8);
    if(h<sh)
    {
        h+=5;
    }
    else
    {
        clearTimeout(loopTimer);
    }
    elem.style.height=h+"px";
}

function retract(element)
{
    var elem= document.getElementById(element);

    var h=elem.offsetHeight;

    var loopTimer = setTimeout('retract(\''+element+'\')',8);
    if(h>0)
    {
        h-=5;
    }
    else
    {
        elem.style.height="0px";
        clearTimeout(loopTimer);
    }
    elem.style.height=h+"px";
}

function toggleNavPanel(x)
{
    var panel = document.getElementById(x), navarrow = document.getElementById('navarrow'), maxH = "300px" ;

    if(panel.style.height==maxH)
    {
        panel.style.height="0px";
        navarrow.innerHTML="&#9662;";
    }
    else
    {
        panel.style.height=maxH;
        navarrow.innerHTML="&#9652;";
    }

}
