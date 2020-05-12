function changeResp() {
    var data = $("input[name='responsable']:checked");
    var username = data.attr('data-username');
    var cellule = data.attr('data-target');
    console.log(username);
    console.log(cellule);
    $.post('../functions/change_resp_func.php', { username: username, cellule: cellule },
        function (data) {
            $('#current_responsable').html(data);
            if (!alert("President Changed successfully")) {
                window.location.reload();
            }
        }
    )
}
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