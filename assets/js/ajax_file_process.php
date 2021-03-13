<?php
if (isset($_POST['product_id']))
{
    include "../../../../../wp-load.php";
//    $user_id= get_current_user_id();
    $havemeta = get_user_meta($_POST['user_id'], 'favorites', false);

    if (in_array($_POST['product_id'], $havemeta) )
    {
        delete_user_meta($_POST['user_id'],'favorites',$_POST['product_id']);
        echo "<i class='fas fa-heart' style='color: grey'></i>";
    }else
    {
        add_user_meta($_POST['user_id'],'favorites',$_POST['product_id']);
        echo "<i class='fas fa-heart' style='color: red'></i>";
    }


}
