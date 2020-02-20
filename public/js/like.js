var jobId = 0;
$('.like').on('click',function(event){
    
    event.preventDefault();
    jobId = event.target.parentNode.parentNode.dataset['jobid'];
    var isLike = event.target.previousElementSibling == null;

    $.ajax({
        method : 'POST',
        url : urlLike ,
        data : {isLike: isLike, jobId: jobId, _token: token}
    })
    .done(function() {
            event.target.innerText = isLike ? event.target.innerHTML == 'Like' ? 'You like this post' : 'Like' : event.target.className == "heartopen" ? "heartclose" : "heartopen" ;
        if (isLike) {
            event.target.nextElementSibling.className = "heartopen";
        } else {
            event.target.previousElementSibling.innerHTML = 'Like';
        }
    });
});