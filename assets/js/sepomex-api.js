jQuery(document).ready(function($) {
    $('#zipcode').on('input', function() {
        var zipcode = $(this).val();
        if (zipcode.length === 5) {
            console.log('Zip code complete:', zipcode);
            // TODO: Make API call to get states
        }
    });
});