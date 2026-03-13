jQuery(document).ready(function($) {
    // Populate states
    $.ajax({
        url: 'https://sepomex.icalialabs.com/api/v1/states?per_page=32',
        method: 'GET',
        success: function(data) {
            var states = data.states;
            var $stateSelect = $('#state');
            states.forEach(function(state) {
                $stateSelect.append('<option value="' + state.id + '">' + state.name + '</option>');
            });
        },
        error: function(xhr, status, error) {
            console.log('Error fetching states:', error);
        }
    });

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