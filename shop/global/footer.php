<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 5/27/14
 * Time: 8:14 PM
 */
?>

        </div>
<footer id="footer" class="row">
    <div class="col-md-12">
        <p>Copyright &copy; 2014 P&K Technologies. All rights reserved | <a href="index.php?module=admin_products&action=admin_products_show"> Admin</a><p>
    </div>
</footer>
<script src="http://yafabhi.com/bootstrap/dist/js/jquery.js"></script>
<script src="http://yafabhi.com/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="shop/bootstrap/dist/js/bootstrap.js"></script>
        <script type="text/javascript">
            $(function (){
                $("#update_cart").popover();
            });
        </script>
        <script type="text/javascript">

            var wss_elem;

            function wssAdd()
            {

                wss_elem.style.opacity=1;
                setTimeout('wssNext()', 8000);
            }

            function wssNext()
            {

                wss_elem.style.opacity=0;

                setTimeout('wssAdd()',1000);
            }

        </script>
        <script type="text/javascript">
            var wss_elem=document.getElementById('wss');
            wssAdd();
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