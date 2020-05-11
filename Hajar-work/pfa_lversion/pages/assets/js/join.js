$(document).ready(()=>{
    $(".btn-join").click(function(){
        var btn = $(this);
        t=btn.attr("data-type");
        dist=btn.attr("data-dist")
        if (btn.hasClass("btn-primary")){
            $.post('../functions/join.php',{
                type:t,
                name:dist
            },
            function (data){
                btn.removeClass('btn-primary');
                btn.addClass('btn-secondary');
                console.log(data);
            })
        }
    })
})
