<?php
/**
 * Created by PhpStorm.

 */
?>
            <footer id="footer">
                <hr>
                <p style="text-align: center;">Copyright © 2014 P&K Technologies. All rights reserved</p>
            </footer>


        </div>
<script type="text/javascript">
    var wss_array=['<div style="color:white; text-align: center;"><br><br><img src="./images/Phone_YF02Z_RED_FACE.png"><br>PHONE YF02Z</div>','<div style="color:white; text-align: center;"><br><br><img src="./images/Phone_YF02Z_RED_BACK.png"><br>PHONE YF02Z</div>', '<div style="color:white; text-align: center;"><br><br><img src="./images/phone_lowcost.png"><br>PHONE YF02Z</div>', '<div style="color:white; text-align: center;"><br><br><img src="./images/Phone_YF02Z_BLUE_FRONTFACE.png" /><br>PHONE YF02Z</div>', '<div style="color:white; text-align: center;"><br><br><img src="./images/Phone_YF02Z_YELLOW_FRONTFACE.png" /><br>PHONE YF02Z</div>', '<div style="color:white; text-align: center;"><br><br><img src="./images/3_phones_lowcost.png" /><br>PHONE YF02Z</div>'];
    var wss_elem;
    var wss_i=0;
    function wssAdd()
    {
        wss_elem.innerHTML= wss_array[wss_i];
        wss_elem.style.opacity=1;
        setTimeout('wssNext()', 8000);
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

</script>
<script type="text/javascript">
    var wss_elem=document.getElementById('wss');
    wssAdd();
</script>
<script type="text/javascript">
    var products=document.getElementById('products');
    products.onmouseover=function(){
        var back=document.getElementById('back');
        var front=document.getElementById('front');
        back.style.display='block';
        front.style.display='none';

    };

    products.onmouseout=function(){
        var back=document.getElementById('back');
        var front=document.getElementById('front');
        back.style.display='none';
        front.style.display='block';

    };
</script>
<script type="text/javascript">
    function slideClose(el)
    {
        var elem=document.getElementById(el);
        elem.style.transition="height 3.0s linear 0s";
        elem.style.height="0px";

        //elem.style.overflow='hidden';
        //elem.style.opacity='0';

    }
</script>
<!-- Piwik -->
<script type="text/javascript">
    var _paq = _paq || [];
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
        var u="//yafabhi.com/analytics/";
        _paq.push(['setTrackerUrl', u+'piwik.php']);
        _paq.push(['setSiteId', 1]);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
    })();
</script>
<noscript><p><img src="//yafabhi.com/analytics/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->
    </body>
</html>