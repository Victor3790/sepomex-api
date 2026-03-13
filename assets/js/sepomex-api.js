jQuery(document).ready(function($) {
    $('#zipcode').on('input', function() {
        var zipcode = $(this).val();
        if (zipcode.length === 5) {
            console.log('Zip code complete:', zipcode);
            $.ajax({
                url: 'https://sepomex.icalialabs.com/api/v1/zip_codes?zip_code=' + zipcode,
                method: 'GET',
                success: function(data) {
                    console.log('API result:', data);
                },
                error: function(xhr, status, error) {
                    console.log('API error:', error);
                }
            });
        }
    });
});