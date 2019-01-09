<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 8/21/14
 * Time: 10:49 PM
 */
$running_page="cart";
?>
<section class="starter-template starter-template-modified">
    <div class="row">
        <div class="col-sm-12" style="height: 50px;"></div>
    </div>
    <div class="row">
        <div class="col-sm-4" style="height: 55px;"><img src="../images/logoOLD.png"></div>
        <div class="col-sm-5" style="height: 55px;"></div>
        <div class="col-sm-3" style="height: 55px; color: #ffffff;"><a href="?module=cart&amp;action=distributor_login" style="color: #ffffff;" class="btn btn-primary" title="Distributor Login">Login</a></div>
    </div>
    <div class="row">

        <div class="col-sm-12" style="height: 55px; color: #ffffff;"><p><i class="glyphicon glyphicon-shopping-cart"></i> Cart Total: $<?php echo $cart_management->totalAmount(); ?> USD</p></div>
    </div>

    <div class="row">
        <div class="col-sm-12">

        </div>
    </div>
    <div class="row">
        <div class="col-sm-12" style="height: 50px; color: #ffffff;"></div>
    </div>
    <div class="row">



    </div>
    <div class="row">
        <div class="col-sm-12" style="height: 50px; color: #ffffff;"></div>
    </div>

    <aside class="row" style="rgba(255,255,255,0.3); text-align: center;">
        <div class="col-md-12">


            <?php
            if(!empty($autres_erreurs))
            {
                echo '<ul list-style-type="none" style="color:red;">'."\n";
                foreach($autres_erreurs as $e)
                {
                    echo '<li style="color:green;backgroung-color:lightgreen; border-radius:3px; padding:5px 15px;">'.$e.'</li>'."\n";
                }
                echo '<ul>';
            }


            ?>

            <div class="row">
                <div id="form" class="col-md-12">

                    <form action="" method="post" enctype="multipart/form-data" class="well">
                        <p style="text-align: center; color:#7A7A7A; padding-top:50px; padding-bottom:50px;" >

                            <?php
                            if(isset($message))
                            {
                                echo '<span style="color:green;backgroung-color:lightgreen; border-radius:3px; padding:5px 15px;">'.$message.'</span>';
                            }


                            ?>

                            <!--<div id="entry">-->

                        <fieldset>
                            <legend style="font-size: 130%;"><strong>Order Form</strong></legend>
                            <br>
                            <br>
                            <div class="form-group">
                                <p>
                                    <input class="form-control" type="text" name="company_name" size="50%" placeholder="Exact name of Company (please include legal entity)" value="<?php if(isset($order)) echo $order->company_name(); ?>" />
                                    <?php if (isset($erreurs) && in_array(Order::INVALID_COMPANY_NAME, $erreurs)) echo '<span style="color:red;">Invalid company name info.</span>'; ?>
                                </p>
                            </div>
                            <div class="form-group">
                                <p>
                                    <textarea class="form-control" rows="8" placeholder="Full Postal Address" cols="60%" name="address"><?php if (isset($order)) echo $order->address(); ?></textarea><br />
                                    <?php if (isset($erreurs) && in_array(Order::INVALID_ADDRESS, $erreurs)) echo '<span style="color:red;">Invalid address info.</span>'; ?></td>
                                </p>
                            </div>

                            <div class="form-group">
                                <p>
                                    <p class="label" style="color: #000000;font-size: 90%;"><label for="country">Country :</label></p>
                                    <p class="value">
                                    <select name="country" id="country" class="form-control">
                                        <option value="-" selected="selected"></option>
                                        <option value="<?php if(isset($order)) echo $order->country();   ?>" selected="selected"><?php if(isset($order)) echo $order->country();   ?></option>
                                        <option value="AF">Afghanistan</option>
                                        <option value="AX">Åland Islands</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AS">American Samoa</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AG">Antigua and Barbuda</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AM">Armenia</option>
                                        <option value="AW">Aruba</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaijan</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BB">Barbados</option>
                                        <option value="BY">Belarus</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BZ">Belize</option>
                                        <option value="BJ">Benin</option>
                                        <option value="BM">Bermuda</option>
                                        <option value="BT">Bhutan</option>
                                        <option value="BO">Bolivia, Plurinational State of</option>
                                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                        <option value="BA">Bosnia and Herzegovina</option>
                                        <option value="BW">Botswana</option>
                                        <option value="BV">Bouvet Island</option>
                                        <option value="BR">Brazil</option>
                                        <option value="IO">British Indian Ocean Territory</option>
                                        <option value="BN">Brunei Darussalam</option>
                                        <option value="BG">Bulgaria</option>
                                        <option value="BF">Burkina Faso</option>
                                        <option value="BI">Burundi</option>
                                        <option value="KH">Cambodia</option>
                                        <option value="CM">Cameroon</option>
                                        <option value="CA">Canada</option>
                                        <option value="CV">Cape Verde</option>
                                        <option value="KY">Cayman Islands</option>
                                        <option value="CF">Central African Republic</option>
                                        <option value="TD">Chad</option>
                                        <option value="CL">Chile</option>
                                        <option value="CN">China</option>
                                        <option value="CX">Christmas Island</option>
                                        <option value="CC">Cocos (Keeling) Islands</option>
                                        <option value="CO">Colombia</option>
                                        <option value="KM">Comoros</option>
                                        <option value="CG">Congo</option>
                                        <option value="CD">Congo, the Democratic Republic of the</option>
                                        <option value="CK">Cook Islands</option>
                                        <option value="CR">Costa Rica</option>
                                        <option value="CI">Côte d'Ivoire</option>
                                        <option value="HR">Croatia</option>
                                        <option value="CU">Cuba</option>
                                        <option value="CW">Curaçao</option>
                                        <option value="CY">Cyprus</option>
                                        <option value="CZ">Czech Republic</option>
                                        <option value="DK">Denmark</option>
                                        <option value="DJ">Djibouti</option>
                                        <option value="DM">Dominica</option>
                                        <option value="DO">Dominican Republic</option>
                                        <option value="EC">Ecuador</option>
                                        <option value="EG">Egypt</option>
                                        <option value="SV">El Salvador</option>
                                        <option value="GQ">Equatorial Guinea</option>
                                        <option value="ER">Eritrea</option>
                                        <option value="EE">Estonia</option>
                                        <option value="ET">Ethiopia</option>
                                        <option value="FK">Falkland Islands (Malvinas)</option>
                                        <option value="FO">Faroe Islands</option>
                                        <option value="FJ">Fiji</option>
                                        <option value="FI">Finland</option>
                                        <option value="FR">France</option>
                                        <option value="GF">French Guiana</option>
                                        <option value="PF">French Polynesia</option>
                                        <option value="TF">French Southern Territories</option>
                                        <option value="GA">Gabon</option>
                                        <option value="GM">Gambia</option>
                                        <option value="GE">Georgia</option>
                                        <option value="DE">Germany</option>
                                        <option value="GH">Ghana</option>
                                        <option value="GI">Gibraltar</option>
                                        <option value="GR">Greece</option>
                                        <option value="GL">Greenland</option>
                                        <option value="GD">Grenada</option>
                                        <option value="GP">Guadeloupe</option>
                                        <option value="GU">Guam</option>
                                        <option value="GT">Guatemala</option>
                                        <option value="GG">Guernsey</option>
                                        <option value="GN">Guinea</option>
                                        <option value="GW">Guinea-Bissau</option>
                                        <option value="GY">Guyana</option>
                                        <option value="HT">Haiti</option>
                                        <option value="HM">Heard Island and McDonald Islands</option>
                                        <option value="VA">Holy See (Vatican City State)</option>
                                        <option value="HN">Honduras</option>
                                        <option value="HK">Hong Kong</option>
                                        <option value="HU">Hungary</option>
                                        <option value="IS">Iceland</option>
                                        <option value="IN">India</option>
                                        <option value="ID">Indonesia</option>
                                        <option value="IR">Iran, Islamic Republic of</option>
                                        <option value="IQ">Iraq</option>
                                        <option value="IE">Ireland</option>
                                        <option value="IM">Isle of Man</option>
                                        <option value="IL">Israel</option>
                                        <option value="IT">Italy</option>
                                        <option value="JM">Jamaica</option>
                                        <option value="JP">Japan</option>
                                        <option value="JE">Jersey</option>
                                        <option value="JO">Jordan</option>
                                        <option value="KZ">Kazakhstan</option>
                                        <option value="KE">Kenya</option>
                                        <option value="KI">Kiribati</option>
                                        <option value="KP">Korea, Democratic People's Republic of</option>
                                        <option value="KR">Korea, Republic of</option>
                                        <option value="KW">Kuwait</option>
                                        <option value="KG">Kyrgyzstan</option>
                                        <option value="LA">Lao People's Democratic Republic</option>
                                        <option value="LV">Latvia</option>
                                        <option value="LB">Lebanon</option>
                                        <option value="LS">Lesotho</option>
                                        <option value="LR">Liberia</option>
                                        <option value="LY">Libya</option>
                                        <option value="LI">Liechtenstein</option>
                                        <option value="LT">Lithuania</option>
                                        <option value="LU">Luxembourg</option>
                                        <option value="MO">Macao</option>
                                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                        <option value="MG">Madagascar</option>
                                        <option value="MW">Malawi</option>
                                        <option value="MY">Malaysia</option>
                                        <option value="MV">Maldives</option>
                                        <option value="ML">Mali</option>
                                        <option value="MT">Malta</option>
                                        <option value="MH">Marshall Islands</option>
                                        <option value="MQ">Martinique</option>
                                        <option value="MR">Mauritania</option>
                                        <option value="MU">Mauritius</option>
                                        <option value="YT">Mayotte</option>
                                        <option value="MX">Mexico</option>
                                        <option value="FM">Micronesia, Federated States of</option>
                                        <option value="MD">Moldova, Republic of</option>
                                        <option value="MC">Monaco</option>
                                        <option value="MN">Mongolia</option>
                                        <option value="ME">Montenegro</option>
                                        <option value="MS">Montserrat</option>
                                        <option value="MA">Morocco</option>
                                        <option value="MZ">Mozambique</option>
                                        <option value="MM">Myanmar</option>
                                        <option value="NA">Namibia</option>
                                        <option value="NR">Nauru</option>
                                        <option value="NP">Nepal</option>
                                        <option value="NL">Netherlands</option>
                                        <option value="NC">New Caledonia</option>
                                        <option value="NZ">New Zealand</option>
                                        <option value="NI">Nicaragua</option>
                                        <option value="NE">Niger</option>
                                        <option value="NG">Nigeria</option>
                                        <option value="NU">Niue</option>
                                        <option value="NF">Norfolk Island</option>
                                        <option value="MP">Northern Mariana Islands</option>
                                        <option value="NO">Norway</option>
                                        <option value="OM">Oman</option>
                                        <option value="PK">Pakistan</option>
                                        <option value="PW">Palau</option>
                                        <option value="PS">Palestinian Territory, Occupied</option>
                                        <option value="PA">Panama</option>
                                        <option value="PG">Papua New Guinea</option>
                                        <option value="PY">Paraguay</option>
                                        <option value="PE">Peru</option>
                                        <option value="PH">Philippines</option>
                                        <option value="PN">Pitcairn</option>
                                        <option value="PL">Poland</option>
                                        <option value="PT">Portugal</option>
                                        <option value="PR">Puerto Rico</option>
                                        <option value="QA">Qatar</option>
                                        <option value="RE">Réunion</option>
                                        <option value="RO">Romania</option>
                                        <option value="RU">Russian Federation</option>
                                        <option value="RW">Rwanda</option>
                                        <option value="BL">Saint Barthélemy</option>
                                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                        <option value="KN">Saint Kitts and Nevis</option>
                                        <option value="LC">Saint Lucia</option>
                                        <option value="MF">Saint Martin (French part)</option>
                                        <option value="PM">Saint Pierre and Miquelon</option>
                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                        <option value="WS">Samoa</option>
                                        <option value="SM">San Marino</option>
                                        <option value="ST">Sao Tome and Principe</option>
                                        <option value="SA">Saudi Arabia</option>
                                        <option value="SN">Senegal</option>
                                        <option value="RS">Serbia</option>
                                        <option value="SC">Seychelles</option>
                                        <option value="SL">Sierra Leone</option>
                                        <option value="SG">Singapore</option>
                                        <option value="SX">Sint Maarten (Dutch part)</option>
                                        <option value="SK">Slovakia</option>
                                        <option value="SI">Slovenia</option>
                                        <option value="SB">Solomon Islands</option>
                                        <option value="SO">Somalia</option>
                                        <option value="ZA">South Africa</option>
                                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                                        <option value="SS">South Sudan</option>
                                        <option value="ES">Spain</option>
                                        <option value="LK">Sri Lanka</option>
                                        <option value="SD">Sudan</option>
                                        <option value="SR">Suriname</option>
                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                        <option value="SZ">Swaziland</option>
                                        <option value="SE">Sweden</option>
                                        <option value="CH">Switzerland</option>
                                        <option value="SY">Syrian Arab Republic</option>
                                        <option value="TW">Taiwan, Province of China</option>
                                        <option value="TJ">Tajikistan</option>
                                        <option value="TZ">Tanzania, United Republic of</option>
                                        <option value="TH">Thailand</option>
                                        <option value="TL">Timor-Leste</option>
                                        <option value="TG">Togo</option>
                                        <option value="TK">Tokelau</option>
                                        <option value="TO">Tonga</option>
                                        <option value="TT">Trinidad and Tobago</option>
                                        <option value="TN">Tunisia</option>
                                        <option value="TR">Turkey</option>
                                        <option value="TM">Turkmenistan</option>
                                        <option value="TC">Turks and Caicos Islands</option>
                                        <option value="TV">Tuvalu</option>
                                        <option value="UG">Uganda</option>
                                        <option value="UA">Ukraine</option>
                                        <option value="AE">United Arab Emirates</option>
                                        <option value="GB">United Kingdom</option>
                                        <option value="US">United States</option>
                                        <option value="UM">United States Minor Outlying Islands</option>
                                        <option value="UY">Uruguay</option>
                                        <option value="UZ">Uzbekistan</option>
                                        <option value="VU">Vanuatu</option>
                                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                                        <option value="VN">Viet Nam</option>
                                        <option value="VG">Virgin Islands, British</option>
                                        <option value="VI">Virgin Islands, U.S.</option>
                                        <option value="WF">Wallis and Futuna</option>
                                        <option value="EH">Western Sahara</option>
                                        <option value="YE">Yemen</option>
                                        <option value="ZM">Zambia</option>
                                        <option value="ZW">Zimbabwe</option>
                                    </select>
                                    </p>
                                    <?php if (isset($erreurs) && in_array(Order::INVALID_COUNTRY, $erreurs)) echo '<span style="color:red;">Please specify your country.</span>'; ?>

                                </p>
                            </div>

                            <div class="form-group">
                                <p>
                                    <input class="form-control" type="text" size="50%" name="tel" id="price" placeholder="Telephone number"  value="<?php if(isset($order)) echo $order->tel(); ?>" />
                                    <?php if (isset($erreurs) && in_array(Order::INVALID_TEL, $erreurs)) echo '<span style="color:red;">Invalid phone info.</span>'; ?>
                                </p>
                            </div>

                            <div class="form-group">
                                <p>
                                    <input class="form-control" type="text" size="50%" name="fax" id="fax" placeholder="Fax number"  value="<?php if(isset($order)) echo $order->fax(); ?>" />
                                    <?php if (isset($erreurs) && in_array(Order::INVALID_FAX, $erreurs)) echo '<span style="color:red;">Invalid fax info.</span>'; ?>
                                </p>
                            </div>

                            <div class="form-group">
                                <p>
                                    <input class="form-control" type="text" size="50%" name="registration_number" id="registration_number" placeholder="Registration No. (Chamber of Commerce / Companies House)"  value="<?php if(isset($order)) echo $order->registration_number(); ?>" />
                                    <?php if (isset($erreurs) && in_array(Order::INVALID_REGISTRATION_NUMBER, $erreurs)) echo '<span style="color:red;">Invalid registration No. info.</span>'; ?>
                                </p>
                            </div>

                            <div class="form-group">
                                <p>
                                    <textarea class="form-control" rows="8" placeholder="Shipping Address  (if different from the above)" cols="60%" name="shipping_address"><?php if (isset($order)) echo $order->shipping_address(); ?></textarea><br />
                                    <?php if (isset($erreurs) && in_array(Order::INVALID_SHIPPING_ADDRESS, $erreurs)) echo '<span style="color:red;">Invalid shipping address info.</span>'; ?></td>
                                </p>
                            </div>

                            <div class="form-group">
                                <p>
                                    <input class="form-control" type="text" size="50%" name="contact_name" id="contact_name" placeholder="Contact (Name/Title)"  value="<?php if(isset($order)) echo $order->contact_name(); ?>" />
                                    <?php if (isset($erreurs) && in_array(Order::INVALID_CONTACT_NAME, $erreurs)) {echo '<span style="color:red;">Invalid contact name info.</span>';} ?>
                                </p>
                            </div>

                            <div class="form-group">
                                <p>
                                    <input class="form-control" type="email" size="50%" name="email" id="email" placeholder="Email"  value="<?php if(isset($order)) echo $order->email(); ?>" />
                                    <?php if (isset($erreurs) && in_array(Order::INVALID_CONTACT_NAME, $erreurs)) echo '<span style="color:red;">Invalid email info.</span>'; ?>
                                </p>
                            </div>

                            <div class="form-group">
                                <p>
                                    <input class="form-control" type="password" size="50%" name="pwd" id="pwd" placeholder="Choose a password (this will allow you later to log in and track your order items)"  value="" />
                                    <?php
                                    if (isset($erreurs) && in_array(Order::INVALID_PWD, $erreurs))
                                    {
                                        echo '<span style="color:red;">Invalid password.</span>';
                                    }
                                    if (isset($order_errors))
                                    {
                                        foreach($order_errors as $e)
                                        {
                                            echo '<span style="color:red;">'.$e.'</span>'."\n";
                                        }
                                    }
                                    ?>
                                </p>
                            </div>

                            <div class="form-group">
                                <p>
                                    <input class="form-control" type="password" size="50%" name="pwd_verify" id="pwd_verify" placeholder="Confirm your password"  value="" />
                                    <?php if (isset($order_errors)){ foreach($order_errors as $e){ echo '<span style="color:red;">'.$e.'</span>'."\n";}} ?>
                                </p>
                            </div>

                            <div class="form-group">
                                <p>
                                    <textarea class="form-control" rows="8"  cols="60%" name="cart_detail">Cart Details:
                                        <?php if ($cart_management->creatingCart()){$nbArticles=count($_SESSION['cart_array']['title']); if ($nbArticles > 0) for ($i=0 ;$i < $nbArticles ; $i++){ echo  $_SESSION['cart_array']['title'][$i].": ". $_SESSION['cart_array']['quantity'][$i]." units ($".$_SESSION['cart_array']['quantity'][$i]*$_SESSION['cart_array']['price'][$i]." USD)"."\n";}}?> </textarea>

                                </p>
                            </div>

                            <div class="form-group">
                                <p>
                                    Total Order Amount:
									<div class="input-group">	
										<span class="input-group-addon">$</span>
										<input class="form-control" type="text" size="50%" name="order_amount" id="order_amount" placeholder="Total order amount"  value="<?php $total_amount= $cart_management->totalAmount(); if(isset($total_amount)) echo $total_amount; ?>" />
										<span class="input-group-addon">USD</span>
									</div>
                                    <?php if (isset($erreurs) && in_array(Order::INVALID_ORDER_AMOUNT, $erreurs)) echo '<span style="color:red;">The order amount must be greater than $1200 USD.</span>'; ?>
                                </p>
                            </div>


                            <div class="form-group">
                                <p>
                                    <textarea class="form-control" rows="8" placeholder="Note (optional)" cols="60%" name="note"><?php if (isset($order)) echo $order->note(); ?></textarea><br />
                                    <?php if (isset($erreurs) && in_array(Order::INVALID_NOTE, $erreurs)) echo '<span style="color:red;">Invalid note info.</span>'; ?></td>
                                </p>
                            </div>

                            <div class="form-group">
                                <p>
                                    <input class="form-control" type="hidden"  name="sum_total" id="image" value="<?php if(isset($product)) echo $product->image(); ?>" />
                                </p>

                            </div>




                        </fieldset>
                        <div class="form-group">
                            <td>&nbsp;</td>
                        </div>

                        <div class="form-group">


                            <p align="middle"><button class="btn btn-primary" type="submit" name="submit">Send</button></p>
                        </div>
                        <!--</div>-->


                        </p>
                    </form>

                </div>
            </div>


        </div>
    </aside>

</section>