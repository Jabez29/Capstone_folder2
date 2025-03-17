 $(document).ready(function() {
        $('#graduatesTable').DataTable();

        // Load details in modal
        $('.details-btn').click(function() {
            const id = $(this).data('id');
            $('#modalContent').html('<p>Loading details...</p>');

            $.ajax({
                url: '../capstone/models/survey.php',
                method: 'GET',
                data: {
                    id: id
                },
                success: function(response) {
                    $('#modalContent').html(response);
                },
                error: function() {
                    $('#modalContent').html('<p>Error loading details.</p>');
                }
            });
        });
    });