jQuery(document).ready(function($) {
    // Populate states
    $.ajax({
        url: 'https://sepomex.icalialabs.com/api/v1/states?per_page=32',
        method: 'GET',
        success: function(data) {
            var states = data.states;
            var $stateSelect = $('#state');
            states.forEach(function(state) {
                var id = state.id < 10 ? '0' + state.id : state.id;
                $stateSelect.append('<option value="' + id + '">' + state.name + '</option>');
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
                    if (data.zip_codes && data.zip_codes.length > 0) {
                        var c_estado = data.zip_codes[0].c_estado;
                        $('#state').val(c_estado);
                    }
                },
                error: function(xhr, status, error) {
                    console.log('API error:', error);
                }
            });
        }
    });
});