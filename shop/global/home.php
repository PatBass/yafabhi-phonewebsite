<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 5/27/14
 * Time: 8:15 PM
 */
$running_page = "shop";
?>
            <section class="starter-template starter-template-modified">
                    <div class="row">
                    <div class="col-sm-12" style="height: 50px;"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4" style="height: 55px;"><img src="../images/logoOLD.png"></div>
                        <div class="col-sm-5" style="height: 55px;"></div>
                        <div class="col-sm-3" style="height: 55px; color: #ffffff;"><a href="?module=cart&amp;action=distributor_login" style="color: #ffffff;" class="btn btn-primary" title="Distributor Login">Log In</a></div>
                    </div>
                    <div class="row">

                        <div class="col-sm-12" style="height: 55px; color: #ffffff;"><p><i class="glyphicon glyphicon-shopping-cart"></i> Cart Total: $<?php $sum_total=$cart_management->totalAmount(); if(isset($sum_total)) {echo $sum_total;}else {echo "0";} ?> USD</p></div>
                    </div>

                    <div class="row" style="padding: 0;">
                        <div class="col-sm-12" style="padding: 0;">
                            <iframe src="slide/slide.html" frameborder="0" width="100%" scrolling="no" height="400" style="padding: 0;"></iframe>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12" style="height: 50px; color: #ffffff;"></div>
                    </div>
                    <div class="row">

                        <div class="col-md-4 col-sm-6"><img src="images/1.jpg"></div>
                        <div class="col-md-4 col-sm-6"><img src="images/Untitled-10.jpg"></div>
                        <div class="col-md-4"><img src="images/21.jpg"></div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12" style="height: 50px; color: #ffffff;"></div>
                    </div>



                    <aside class="row" style="rgba(255,255,255,0.3); text-align: center;">
                        <!--
                        <div class="col-md-4 col-sm-6 col-xs-12 scene3D">

                                <div class="flip col-md-offset-2" style="text-align: center;">
                                    <div class="action" style="width: 200px;">
                                        <div><p>Smartphone BK5</p><br>Price:<br>
                                            <a href="?module=cart&amp;action=cart_processing&amp;id=4&amp;op=ajout&amp;l=LIBELLEPRODUIT2&amp;q=QUANTITEPRODUIT2&amp;p=5&amp;pic=IMAGEBK5" class="buyButton">Buy</a></div>

                                    </div>
                                    <div class=" phone_presentation">

                                        <br>
                                        <img src="images_uploads/4.png" alt="Smartphone BK5" title="Smartphone BK5">        <!-- images/BK5_WHITE_GOLD.png
                                        <p id="wss">Smartphone BK5</p>
                                        <br>
                                    </div><a id="products_list"></a>
                                </div>


                        </div>
                        -->
                        <?php
                        foreach ($manager_product->getList() as $product)
                        {
                            echo '
                            <div class="col-md-4 col-sm-6 col-xs-12 scene3D">

                                <div class="flip col-md-offset-2" style="text-align: center;">
                                    <div class="action">
                                        <div>
                                            <p>'
                                                .htmlspecialchars($product->title()).'
                                            </p>
                                            <br>
                                            <mark>Price: $'.htmlspecialchars($product->price()).'</mark>
                                            <br>
                                            <a href="?module=cart&amp;action=cart_processing&amp;id='.htmlspecialchars($product->id()).'&amp;op=ajout&amp;l=PRODUCT&amp;q=QUANTITY&amp;p=5&amp;pic=IMAGE"  class="buyButton">Buy</a>
                                        </div>

                                    </div>
                                    <div class="phone_presentation">
                                        <br>
                                        <img src="images_uploads/'.htmlspecialchars($product->id()).'.'.strtolower(pathinfo($product->image(), PATHINFO_EXTENSION)).'" alt="'.htmlspecialchars($product->title()).'" title="'.htmlspecialchars($product->title()).'">    <!-- ../images/Phone_YF02Z_RED_FACE.png-->
                                        <p id="wss">'.htmlspecialchars($product->title()).'</p>
                                        <br>
                                    </div>
                                </div>
                            </div>';
                        }
                        ?>
                        <!--
                        <div class="col-md-4 col-sm-6 col-xs-12 scene3D">
                            <div class="flip col-md-offset-2" style="text-align: center;">
                                <div class="action">
                                    <p>Smartphone BK3</p><br>Price:<br>
                                    <a href="?module=cart&amp;action=cart_processing&amp;id=9&amp;op=ajout&amp;l=LIBELLEPRODUIT3&amp;q=QUANTITEPRODUIT3&amp;p=15&amp;pic=IMAGE" class="buyButton">Buy</a>
                                </div>
                                <div class="phone_presentation">
                                    <br>
                                    <img src="images_uploads/9.png" alt="Smartphone BK3" title="Smartphone BK3">    <!-- ../images/BK3_VERTICAL.png
                                    <p id="wss">Smartphone BK3</p>
                                    <br>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 col-xs-12 scene3D">
                            <div class="flip col-md-offset-2" style="text-align: center;">
                                <div class="action">
                                    <p>Phone BK110</p><br>Price:<br>
                                    <a href="?module=cart&amp;action=cart_processing&amp;id=11&amp;op=ajout&amp;l=LIBELLEPRODUIT2&amp;q=QUANTITEPRODUIT2&amp;p=5&amp;pic=IMAGE110" class="buyButton">Buy</a>
                                </div>
                                <div class="phone_presentation">
                                    <br>
                                    <img src="images_uploads/11.png" alt="Phone BK110" title="Phone BK110">    <!-- ../images/BK110_BLUE.png
                                    <p id="wss">Phone BK110</p>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 scene3D">
                            <div class="flip col-md-offset-2">
                                <div class="action">
                                    <p>Smartphone BK26</p><br>Price<br>
                                    <a href="?module=cart&amp;action=cart_processing&amp;id=12&amp;op=ajout&amp;l=LIBELLEPRODUIT2&amp;q=QUANTITEPRODUIT2&amp;p=5&amp;pic=IMAGEBK26" class="buyButton">Buy</a>
                                </div>
                                <div class="phone_presentation">
                                    <br>
                                    <img src="images_uploads/12.png" alt="Smartphone BK26" title="Smartphone BK26">    <!-- ../images/BK26_GOLD_FRONT.png
                                    <p id="wss">Smartphone BK26</p>
                                    <br>
                                </div>

                            </div>

                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 scene3D">
                            <div class="flip col-md-offset-2">
                                <div class="action">
                                    <p>Smartphone BK5</p><br>Price:<br>
                                    <a href="?module=cart&amp;action=cart_processing&amp;id=10&amp;op=ajout&amp;l=LIBELLEPRODUIT4&amp;q=QUANTITEPRODUIT4&amp;p=25" class="buyButton">Buy</a>
                                </div>
                                <div class="phone_presentation">
                                    <br>
                                    <img src="images_uploads/10.png" alt="Smartphone BK5" title="Smartphone BK5">    <!-- ../images/BK5_GOLD_FRONT.png   BLUE
                                    <p id="wss">Smartphone BK5</p>
                                    <br>
                                </div>

                            </div>

                        </div>
                        -->
                        <script type="text/javascript">
                            var wss_array=['<span style="color: rgb(0, 0, 0);"></span>', '<span style="color: rgb(255, 255, 255);"></span>'];
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

                    </aside>




            </section>