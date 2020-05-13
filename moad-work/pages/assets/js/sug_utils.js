function send(){
    var form= $("#sug_form");
    form.submit(function (e){
        e.preventDefault();
        var url=fomr.attr("action");
        $.post(url,form.serialize(),function() {
            if (!alert("Suggetion sent successfully")){
                window.location.reload();
            }
        })
    })
}