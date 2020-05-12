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
                alert("request sent seccessfully");
            })
        }
    })
})

function new_cellule(){
    var form=$("#cel_form");
    form.submit(function(e){
        e.preventDefault();
        var f=$(this);
        var url="../functions/create_cellule.php";
        $.post(url,f.serialize(),function(){
            if (!alert('cellule created successfully')){
                window.location.reload();
            }
        });
    })
}

function new_event(){
    var form=$("#event_form");
    form.submit(function(e){
        e.preventDefault();
        var f=$(this);
        console.log(f.serialize());
        
        var url="../functions/create_event.php";
        $.post(url,f.serialize(),function(){
            if (!alert('cellule created successfully')){
                window.location.reload();
            }
        });
    })
}
