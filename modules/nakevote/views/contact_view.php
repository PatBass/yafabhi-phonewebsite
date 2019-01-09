<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 4/25/14
 * Time: 1:35 PM
 */
$nav_en_cours="contact";
?>
<div class="page_wrapper">
    <div class="band"></div>
    <div class="ja-box column ja-box-full" style="width: 100%;">
        <div id="toggleDiv" class="toggleDiv_home" style="padding-left: 90px;">

            <p style="float:right;position: relative; right: 8%;"><img title="Close" src="images/close.png" onclick="slideClose('toggleDiv');"></p>
            <div class="img_view ">

                <div class="back">
                    <h4>Specifications</h4>
                    <ul>
                        <li>Chipset: MTK6592 2.0 GHZ  Octa Core CPU</li>
                        <li>Sim Card: Dual sim cards, Dual Standby</li>
                        <li>OS: Android v4.2.2</li>
                        <li>Networks: 3G, GPS + AGPS, Wi-Fi, etc</li>
                        <li>Screen: 5.0” IPS HD with OGS Screen</li>
                        <li>Resolution:  1280*720  pixels</li>
                        <li>Front Camera: 5.0 M Pixel</li>
                        <li>Rear Camera:  1280*720  pixels</li>
                        <li>Internal Memory: 2 GB RAM + 16 GB storage</li>
                        <li>External Memory: Micro SD card (T-FLASH card), max 32 GB</li>
                        <li>Talk Time: 3-5.5 Hours </li>
                        <li>Standby Time: 180 Hours</li>

                    </ul>
                    <span><br><br><a href="?module=all_products&amp;action=all_products_show" class="classname">More products...</a> </span>
                </div>
                <div class="front BK5_WHITE_GOLD"><p>Smartphone BK5</p></div>
            </div>
            <div class="img_view">

                <div class="back">
                    <h4>Specifications</h4>
                    <ul>
                        <li>Single or Dual-SIM: Optional</li>
                        <li>Battery: up to 7.5 hours, 10 days in stand-by mode</li>
                        <li>Memory: support up to 8 GB</li>
                        <li>Camera</li>
                        <li>Build in FM-Radio</li>
                        <li>Bluetooth</li>
                        <li>SMS</li>
                    </ul>
                    <span><br><br><a href="?module=all_products&amp;action=all_products_show" class="classname">More products...</a> </span>
                </div>
                <div class="front phone_lowcost" id="wss"><p>Phone YF02Z</p></div>
            </div>
            <div class="img_view">

                <div class="back">
                    <h4>Specifications</h4>
                    <ul>
                        <li>Chipset: MTK6582 1.3 GHZ Quad-Core</li>
                        <li>Sim Card: Dual sim cards, Dual standby</li>
                        <li>OS: Android v4.2.2</li>
                        <li>Networks: 3G, GPS, Wi-Fi, etc</li>
                        <li>Screen: 5.0” HD</li>
                        <li>Resolution: 1280*720  pixels (294PPI)</li>
                        <li>Front Camera: 5.0 M Pixel</li>
                        <li>Rear Camera: 13.0 M Pixels with AF</li>
                        <li>Internal Memory: 16 GB ROM + 1 GB RAM</li>
                        <li>External Memory: Micro SD card (T-FLASH card), max 32 GB</li>
                        <li>Talk Time: 120-150 (Unit: Mins)</li>
                        <li>Standby Time: 120-180 hours</li>
                        <li>Hand-writing: Support</li>
                    </ul>
                    <span><br><br><a href="?module=all_products&amp;action=all_products_show" class="classname">More products...</a> </span>
                </div>
                <div class="front BK3_VERTICAL"><p>Smartphone BK3</p></div>
            </div>
        </div>
        <h2>Contact Us</h2>
        <div id="form" style="margin-right: 30%;">
            <form action="" method="post" class="well" width="50%">
                <p style="text-align: center; color:#7A7A7A; padding-top:50px; padding-bottom:50px;" >


                <div>
                    <div class="row">
                        <p>
                            <input class="form-control" type="text" name="last_name" size="50%" placeholder="Last Name" value="<?php if(isset($contact)) echo $contact->last_name(); ?>" />
                            <?php if (isset($erreurs) && in_array(Contact::INVALID_LAST_NAME, $erreurs)) echo '<span style="color:red;">Invalid last name info.</span>'; ?>
                        </p>
                    </div>
                    <div class="row">
                        <p>
                            <input class="form-control" type="text" size="50%" name="first_name" id="first_name" placeholder="First Name"  value="<?php if(isset($contact)) echo $contact->first_name(); ?>" />
                            <?php if (isset($erreurs) && in_array(Contact::INVALID_FIRST_NAME, $erreurs)) echo '<span style="color:red;">Invalid first name info.</span>'; ?>
                        </p>
                    </div>
                    <div class="row">
                        <p>
                            <input class="form-control" type="text" size="50%" placeholder="E-mail" name="email" value="<?php if(isset($contact)) echo $contact->email(); ?>" />
                            <?php if (isset($erreurs) && in_array(Contact::INVALID_EMAIL, $erreurs)) echo '<span style="color:red;">Invalid email info.</span>'; ?>
                        </p>
                    </div>
                    <div class="row">
                        <p>
                            <textarea class="form-control" rows="8" placeholder="Your Message" cols="60%" name="message"><?php if (isset($contact)) echo $contact->message(); ?></textarea><br />
                            <?php if (isset($erreurs) && in_array(Contact::INVALID_MESSAGE, $erreurs)) echo '<span style="color:red;">Invalid message info.</span>'; ?>
                        </p>
                    </div>
                    <div class="row">
                        <p>&nbsp;</p>
                    </div>
                    <div class="row">
                        <p>&nbsp;</p>
                        <?php
                        if(isset($contact) && !$contact->isNew())
                        {
                            ?>

                            <input type="hidden" name="id" value="<?php echo $contact->id(); ?>" />
                            <p>
                                <button id="submit" type="submit" name="submit" class="btn btn-primary">Send</button>
                            </p>

                        <?php
                        }
                        else
                        {
                        ?>

                        <td align="right"><button id="submit" type="submit" name="submit" class="btn btn-primary">Send</button></td>
                    </div>
                </div>
                <?php
                }

                ?>

                </p>
            </form>
        </div>

    </div>
    <div class="ja-moduletable moduletable_hilite blue  clearfix" id="Mod404">
        <br><br>
        <h3><span>Contact Information</span></h3>
        <br><br>
        <div class="ja-box-ct clearfix">


            <div class="custom_hilite blue"  >
                <table>
                    <tr style="vertical-align: top;">
                        <td>
                            <p><img src="http://localhost/yafabhi2/images/2474997_1.jpg" alt="" border="0" /></p>
                            <p><strong>Yafabhi company LLC</strong>&nbsp;</p>
                            <p>Headquarter&nbsp;</p>
                            <p>1200 Abernathy Road, Northpark Town Center, &nbsp;Atlanta, GA 30328</p>
                            <p>Phone: 404 907 1247</p>
                            <p>E-mail:
                                <script type='text/javascript'>
                                    <!--
                                    var prefix = '&#109;a' + 'i&#108;' + '&#116;o';
                                    var path = 'hr' + 'ef' + '=';
                                    var addy43860 = '&#97;dm&#105;n' + '&#64;';
                                    addy43860 = addy43860 + 'y&#97;f&#97;bh&#105;' + '&#46;' + 'c&#111;m';
                                    document.write('<a ' + path + '\'' + prefix + ':' + addy43860 + '\'>');
                                    document.write(addy43860);
                                    document.write('<\/a>');
                                    //-->\n </script><script type='text/javascript'>
                                    <!--
                                    document.write('<span style=\'display: none;\'>');
                                    //-->
                                </script>This email address is being protected from spambots. You need JavaScript enabled to view it.
                                <script type='text/javascript'>
                                    <!--
                                    document.write('</');
                                    document.write('span>');
                                    //-->
                                </script></p>
                            <p>Where to buy Yafabhi company products</p>
                        </td>
                        <td></td>
                        <td style="padding-right: 40%;">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m20!1m8!1m3!1d3310.2687987340323!2d-84.354597!3d33.934214!3m2!1i1024!2i768!4f13.1!4m9!1i0!3e6!4m0!4m5!1s0x88f509553639c701%3A0x9082ead33b003ed!2sNorthpark+Towncenter%2C+1000+Abernathy+Rd+NE%2C+Atlanta%2C+GA+30328%2C+%C3%89tats-Unis!3m2!1d33.934214!2d-84.354597!5e0!3m2!1sfr!2sfr!4v1411726670542" width="800" height="600" frameborder="0" style="border:0"></iframe>
                        </td>
                    </tr>
                </table>

                <br><br>
                <p>&nbsp;<strong><span style="color: #000000;">ANGOLA</span></strong></p>
                <p>Daniela comercial<br />Francisca da costa.R.mafuta<br />Luanda.rotunda da camama<br />ANGOLA<br />Phone:+244 923 329198 / + 244 923 332453<br />E-mail: <a href="mailto:danielacomercial2011@hotmail.">danielacomercial2011@hotmail.</a>com</p>
                <div><span class="il"><br /></span></div>
                <div>
                    <div><strong>BURKINA FASO</strong></div>
                    <div><span style="color: #222222; font-family: arial, helvetica, sans-serif; font-size: 8pt;">Cabinet Flash Reflets</span><br style="color: #222222; font-family: HelveticaNeue, 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; font-size: 16px;" /><span style="color: #222222; font-family: arial, helvetica, sans-serif; font-size: 8pt;">05 BP 6193 OUAGA 05</span><br style="color: #222222; font-family: HelveticaNeue, 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; font-size: 16px;" /><span style="color: #222222; font-family: arial, helvetica, sans-serif; font-size: 8pt;">Secteur 17, Parcelle N°22, Section OM</span><br style="color: #222222; font-family: HelveticaNeue, 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; font-size: 16px;" /><span style="color: #222222; font-family: arial, helvetica, sans-serif; font-size: 8pt;">Quartier Cissin Kouritenga, Non Loin du Centre Culturel Jean Pierre Gingané</span><br style="color: #222222; font-family: HelveticaNeue, 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; font-size: 16px;" /><span style="color: #222222; font-family: arial, helvetica, sans-serif; font-size: 8pt;">porte N°323</span><br style="color: #222222; font-family: HelveticaNeue, 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; font-size: 16px;" /><span style="font-size: 8pt; font-family: arial, helvetica, sans-serif;"><span style="color: #222222;">Tél:+ 226 788 08 098 or +226 504 36 596&nbsp;</span></span><br style="color: #222222; font-family: HelveticaNeue, 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; font-size: 16px;" /><span style="font-size: 10pt;"><span style="color: #222222; font-family: HelveticaNeue, 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;">email:&nbsp;</span><a href="mailto:&lt;a href="/ mailto:flash="" reflets="" yahoo="" fr=""></a>
                            <script type='text/javascript'>
                                <!--
                                var prefix = '&#109;a' + 'i&#108;' + '&#116;o';
                                var path = 'hr' + 'ef' + '=';
                                var addy96054 = 'fl&#97;sh.r&#101;fl&#101;ts' + '&#64;';
                                addy96054 = addy96054 + 'y&#97;h&#111;&#111;' + '&#46;' + 'fr';
                                var addy_text96054 = 'fl&#97;sh.r&#101;fl&#101;ts' + '&#64;' + 'y&#97;h&#111;&#111;' + '&#46;' + 'fr';
                                document.write('<a ' + path + '\'' + prefix + ':' + addy96054 + '\'>');
                                document.write(addy_text96054);
                                document.write('<\/a>');
                                //-->\n </script><script type='text/javascript'>
                                <!--
                                document.write('<span style=\'display: none;\'>');
                                //-->
                            </script>This email address is being protected from spambots. You need JavaScript enabled to view it.
 <script type='text/javascript'>
     <!--
     document.write('</');
     document.write('span>');
     //-->
 </script></span></div>
                </div>
                <div><span class="il"><br /></span></div>

            </div>
        </div>
    </div>
</div>




