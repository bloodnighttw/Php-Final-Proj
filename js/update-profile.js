$(function () {
    $("#password1").on("keydown", function () {
        $("#password2").fadeIn();
    })

    $("#avatar").on("click", function () {
        $("#avatar-upload").trigger('click');
    })


    $("#badge").on("click", function () {
        $("#change-badge").trigger('click');
    })

    $(".badge-list").on("click", function () {
        $('#badge').attr("src", $(this).attr('src'))
        $('#badge-id').val($(this).attr('src').split('/').pop().replace(/\.[^/.]+$/, ""));
        // get file name and remove extension;
        $('#off-close').trigger('click');
    })

})

function getContent(){
    document.getElementById("textarea-description").value = (document.getElementById("description").innerText);
}