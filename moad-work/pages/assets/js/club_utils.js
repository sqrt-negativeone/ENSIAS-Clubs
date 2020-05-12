function search() {
    var search_in = $("#search-in");
    var search_output = $("#search-out");
    var data = search_in.val();
    $.post('../functions/search_pres.php', {
        data: data,
    },
        function (data) {
            search_output.empty().html(data);
        }
    )
}
function changePresient() {
    var data = $("input[name='responsable']:checked").val().split(',');
    var username = data[0];
    var club = data[1];

    $.post('../functions/change_pres_func.php', { username: username, club: club },
        function (data) {
            $('#current_president').html(data);
            if (!alert("President Changed successfully")) {
                window.location.reload();
            }
        }
    )
}