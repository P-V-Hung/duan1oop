
function chooseFile(fileInput, idImg) {
    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById(idImg).setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(fileInput.files[0]);

    }
}

$(document).on("click",".message-close",function(){
    $(this).closest('.message')[0].remove();
});

$(document).on("mouseenter",".message", function(){
    $(this).addClass('sloly');
});

$(document).on("mouseleave",".message",function(){
    $(this).removeClass('sloly');
});
