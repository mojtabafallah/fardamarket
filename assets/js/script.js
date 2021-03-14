jQuery(document).ready(function() {
    jQuery("#favorite").click(function() {

        var user_id = jQuery('#user_id').text();
        var product_id = jQuery('#product_id').text();
        var data = new FormData();
        data.append('user_id', user_id);
        data.append('product_id', product_id);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', ' http://localhost/fardamarket/wp-content/themes/FardaMarket/assets/js/ajax_file_process.php', true);
        xhr.onload = function() {
            // do something to response
            jQuery("#favorite").html(this.responseText);

        };
        xhr.send(data);

    });

    jQuery("#add_to_cart").click(function() {

        var product_id = jQuery('#product_id').text();
        var data = new FormData();
        data.append('add_to_cart', product_id);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', ' http://localhost/fardamarket/wp-content/themes/FardaMarket/assets/js/ajax_file_process.php', true);
        xhr.onload = function() {
            // do something to response
            jQuery("#added_to_cart").html(this.responseText);

        };
        xhr.send(data);

    });

    jQuery(".small_image_product").click(function() {

        jQuery(".image_main_product").attr("src", this.src);

        jQuery(".small_image_product").removeClass('active');
        jQuery(this).addClass('active');

    });
});