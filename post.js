

document.getElementById("reset").addEventListener("click",function(event) {
    event.preventDefault();
    let title = document.getElementById("title");
    let body = document.getElementById("body");
    title.value = "";
    body.value = "";
});


function addNoti(message)  {
    let noti = document.getElementById("noti");

    if (noti === null || noti === undefined ) { // create it once
        let noti = document.createElement("div");
        noti.classList.add('noti');


        noti.append(message);

        let close = document.createElement("i");
        close.id = "close";

        close.classList.add("fas");
        close.classList.add("fa-times-circle");

        close.addEventListener("click",function (event) {
            event.preventDefault();
            noti.remove();
        });

        noti.append(close);

        document.getElementById("main").append(noti);
    }
}

function validateForm() {
    let title = document.getElementById("title");
    let body = document.getElementById("body");
    let error = false;


    if (title.value === "") {
        addNoti("The title cannot be empty ");
        title.classList.toggle("highlight");
        error = true;
    }
    if (body.value === "") {
        addNoti("The body cannot be empty ");
        body.classList.toggle("highlight");
        error = true;
    }

    if(error) {
        return false;
    }

    let form = document.getElementById("form");

    form.setAttribute("action","addPost.php");
    return true;
}

function renderPreview() {
    let form = document.getElementById("form");
    form.setAttribute("action","preview.php");
    form.setAttribute("target","postIframe");
    form.submit();
}


document.getElementById("preview").addEventListener("click",function preview(event) {
    event.preventDefault();

    let body = document.getElementById("page-body");

    let iframe = document.getElementById("previewIframe");

    if(iframe == null || iframe == undefined) {
        let iframe = document.createElement("iframe");
        iframe.id = "previewIframe";

        iframe.setAttribute("name","postIframe");
        iframe.setAttribute("src","preview.php");

        let div = document.createElement("div");
        div.classList.add("row");
        div.classList.add("wrapper");

        div.append(iframe);
        body.append(div);

        renderPreview();
    }else {
        renderPreview();
    }


    //
});