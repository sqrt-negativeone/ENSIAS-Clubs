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
function give_tch(){
    var form=$("#gv_tch_frm");
    form.submit(function (e){
        e.preventDefault();
        var f=$(this);
        var url=f.attr("action");
        var data=f.serialize();
        $.post(url,data,function (){
            if (!alert("tache sent successfully")){
                window.location.reload();
            }
        })
    })
}
function create_tache(){
    var form=$("#crt_tch_frm");
    form.submit(function (e){
        e.preventDefault();
        var f=$(this);
        var url=f.attr("action");
        var data=f.serialize();
        $.post(url,data,function (){
            if (!alert("tache created successfully")){
                window.location.reload();
            }
        })
    })
}
$(document).ready(function (){
    $('.done-btn').click(function (){
        var data=$(this).attr('data-target');
        $.post("functions/process_tache.php",{
            type:"done",
            target:data,
        },function (){
            document.location.reload();
        })
    })
    $('.cancel-btn').click(function (){
        if (confirm("are you sure you want to delete this tache ?")){
            var data=$(this).attr('data-target');
            $.post("functions/process_tache.php",{
                type:"done",
                target:data,
            },function (){
                document.location.reload();
            })
        }
    })
})
function show_prog(id){
    var btn=$(id);
    var username = btn.attr('data-username');
    var img_src=btn.find("img").attr("src");
    
    $.post("../includes/passed_taches.php",{username:username}, function (data){
        $('#usr_rslt_out').find("img").attr('src',img_src);
        $('#usr_rslt_out').find('span').text(username);
        $('#mdl_out').html(data);
    })
}
function search_mem(){
    var s=$("#srch_mem");
    var data = s.val();
    var t=s.attr("data-t");
    $.post("../functions/search_mem.php",{key:data,id:t},function (data){
        $("#srch_out").html(data);
    })
}