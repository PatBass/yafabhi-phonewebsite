<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 11/19/14
 * Time: 2:09 PM
 */
$running_page="shop";
?>
<div class="page_wrapper">
    <div class="band"></div>

    <aside class="row" style="rgba(255,255,255,0.3); text-align: center;">
        <p style="text-align: center; color: #ffffff;">Currently, there are <?php echo
            htmlspecialchars($manager_contact->count()); ?> messages in the database.</p>
        <br>
        <br>
        <table id="show" class="table table-bordered table-striped table-condensed">
            <thead>
            <tr>
                <th style="vertical-align:middle;text-align: center; ">Last Name</th>
                <th style="vertical-align:middle;text-align: center;">First Name</th>
                <th style="vertical-align:middle;text-align: center;">Email</th>
                <th style="vertical-align:middle;text-align: center;">Message</th>
                <th style="vertical-align:middle;text-align: center;">Date Received</th>
                <th style="vertical-align:middle;text-align: center;">Action</th>
            </tr>
            </thead>
            <?php
            foreach ($manager_contact->getList() as $contact)
                echo '
            <tbody>
                <tr>
                    <td style="vertical-align:middle;">'. htmlspecialchars($contact->last_name()). '</td>
                    <td style="vertical-align:middle;">'. htmlspecialchars($contact->first_name()).'</td>
                    <td style="vertical-align:middle;">'. htmlspecialchars($contact->email()).'</td>
                    <td style="vertical-align:middle;">'. htmlspecialchars($contact->message()).'</td>
                    <td style="vertical-align:middle;">'. htmlspecialchars($contact->dateAjout()). '</td>
                    <td style="vertical-align:middle;"> <a href="index.php?module=contact&amp;action=contact_show&amp;supprimer='.htmlspecialchars($contact->id()). '">Delete</a></td>
                </tr>
            </tbody>'. "\n";
            ?>
        </table>
    </aside>
</div>