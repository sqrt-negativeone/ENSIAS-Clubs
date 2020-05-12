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