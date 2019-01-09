/**
 * Created by Patrick on 4/14/14.
 */
function toggleNavPanel(x)
{
    var panel = document.getElementById(x), navarrow = document.getElementById('navArrow'), maxH = "400px" ;

    if(panel.style.height==maxH)
    {
        panel.style.height="0px";
        navarrow.innerHTML='<img src="images/icon-nav-down-arrow.png" />';
    }
    else
    {
        panel.style.height=maxH;
        navarrow.innerHTML='<img src="images/icon-nav-up-arrow.png" />';

    }

}


