function checkPasswordStrength() {
    var number = /([0-9])/;
    var alphabets = /([a-zA-Z])/;
    var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
        if($('#examplePasswordInput').val().length<6) {
        $('#password-strength-status').removeClass();
        $('#password-strength-status').addClass('bg-gradient-danger text-white');
        $('#password-strength-status').html("Weak (should be atleast 6 characters.)");
    } else {    
    if($('#examplePasswordInput').val().match(number) && $('#examplePasswordInput').val().match(alphabets) && $('#examplePasswordInput').val().match(special_characters)) {            
        $('#password-strength-status').removeClass();
        $('#password-strength-status').addClass('bg-gradient-success text-white');
        $('#password-strength-status').html("Strong");
    } else {
    $('#password-strength-status').removeClass();
    $('#password-strength-status').addClass('bg-gradient-warning text-white');
    $('#password-strength-status').html("Medium (should include alphabets, numbers and special characters.)");
}}}