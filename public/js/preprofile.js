function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function() {
    readURL(this);
});

function readURL1(input){
    if  (input.files && input.files[0]){
        var reader = new  FileReader();

        reader.onload = function (e) {
            $('#personaid').attr('src',e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imgInp2").change(function () {
   readURL1(this);
});
function readURL2(input) {
    if (input.files && input.files[0]){
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#backpersonaid').attr('src',e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imgInp3").change(function () {
    readURL2(this);
})