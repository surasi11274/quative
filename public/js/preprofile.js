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

$('#file-input').on('change', function(){ //on file input change
    if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
    {
        
        var data = $(this)[0].files; //this file data
        
        $.each(data, function(index, file){ //loop though each file
            if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                var fRead = new FileReader(); //new filereader
                fRead.onload = (function(file){ //trigger function on successful read
                return function(e) {
                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
                    $('#thumb-output').append(img); //append image to output element
                };
                })(file);
                fRead.readAsDataURL(file); //URL representing the file's data.
            }
        });
        
    }else{
        alert("Your browser doesn't support File API!"); //if File API is absent
    }
});

$('#file-input2').on('change', function(){ //on file input change
    if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
    {
        
        var data = $(this)[0].files; //this file data
        
        $.each(data, function(index, file){ //loop though each file
            if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                var fRead = new FileReader(); //new filereader
                fRead.onload = (function(file){ //trigger function on successful read
                return function(e) {
                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
                    $('#thumb-output2').append(img); //append image to output element
                };
                })(file);
                fRead.readAsDataURL(file); //URL representing the file's data.
            }
        });
        
    }else{
        alert("Your browser doesn't support File API!"); //if File API is absent
    }
});

// $(".remove").click(function (e) {
//     e.preventDefault();
//     data.splice(0, 1);
//     $('#thumb-output a').eq(data.length).remove();
// });