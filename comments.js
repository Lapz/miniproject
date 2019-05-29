//
// function getComments() {
//
//     fetch(`comments.php?id=${}`)
// }


let divs = document.getElementsByClassName("blog-card");


function clear(node) {
    while (node.firstChild) {
        node.removeChild(node.firstChild);
    }
}

function label(_for,text) {
    let label = document.createElement("label");
    label.setAttribute("for",_for);
    label.append(text);

    return label;

}


function input(id,name,text,ty) {
    let input = document.createElement("input");
    input.id=id;
    input.name=name;

    input.append(text);

    if (!ty) {
        return input
    }else {
        input.type=ty;
        return input;
    }
}


function addPostId(form) {
    form.addEventListener("submit",function (event) {
        event.preventDefault();

        let parent = form.parentNode;
        let id = parent.getAttribute("data-postid"); // always the second bit

        let hidden = input("","post-id","","hidden");

        hidden.value=id;

        form.append(hidden); // add the hidden input

        console.log(id);

        form.submit();

    })
}
function commentForm() {
    let form = document.createElement("form");

    form.setAttribute("action","postComment.php");
    form.setAttribute("method","post");
    let main =  document.createElement("fieldset");

    let legend = document.createElement("legend");
    legend.append("Post A Comment");


    let elements = document.createElement("fieldset");

    let  name = input("comment-name","name","Email","");

    let name_label =label("comment-name","Name");

    let email = input("comment-email","email","Email","email");

    let email_label = label("comment-email","Email");

    let text = document.createElement("textarea");

    text.setAttribute("name","message");

    let text_label = label("comment-message","Message");

    let br = document.createElement("br");

    elements.append(...[name_label,br.cloneNode(),name,br.cloneNode(),email_label,br.cloneNode(),email,br.cloneNode(),text_label,br,text]);

    main.append(legend); //add the form legend

    main.append(elements); // add the form fieldset


    let buttons = document.createElement("div");

    buttons.className="buttons";

    let submit = document.createElement("button");
    submit.id="send";
    submit.className="button";

    submit.append("Submit");

    buttons.append(submit);

    main.append(buttons);

    form.append(main);


    addPostId(form);
    return form;
}

for(let i=0;i<divs.length;i+=1) { // loop through all the blog posts
    let child = divs.item(i); // select a post

    if (child.tagName === "DIV" && child.className ==="blog-card") { // check if its the right kinda div

        child.addEventListener("click", function (event) {
            fetch(`comments.php?id=${child.id}`)
                .then((response) => {

                    let comments = document.getElementById("comments");

                    if(comments === null || comments=== undefined|| !comments) {
                        let comments = document.createElement("div");
                        comments.id ="comments";
                        comments.className="row wrapper";

                        comments.setAttribute("data-postid",child.id);

                        document.getElementById("body").append(comments);

                    }

                    comments = document.getElementById("comments"); //update the reference to the comments

                    clear(comments);// remove all old comments;
                    comments.setAttribute("data-postid",child.id); // set the current post-id
                    // if the div was already present

                    response.text().then((data) => {

                        console.log(data);
                        let comment_data = Object.values(JSON.parse(data));



                        for (let i=0;i<comment_data.length;i++) {
                            let box = document.createElement("div");
                            box.className = "comment-card";

                            let info = document.createElement("div");

                            info.className="comment-meta";


                            let text = `Posted on 
                            ${comment_data[i]["1"]} by ${comment_data[i]["3"]}`;

                            let p = document.createElement("p");

                            let icon = document.createElement("i");
                            icon.className="far fa-clock";
                            p.className="comment-meta-info";

                            p.append(icon);
                            p.append(" ");
                            p.append(text);
                            info.append(p);

                            box.append(info);

                            console.log(comment_data[i]);
                            box.append(comment_data[i]["0"]);
                            box.id=comment_data[i]["4"];

                            comments.append(box);

                        }

                        comments.append(commentForm());
                    });


                    fetch("auth.php")
                        .then((response) => {
                            response.json().then((data) => {
                                if (data["admin"]) {

                                    let children = comments.childNodes;

                                    for(let i=0;i < children.length;i++) {
                                        let child = children.item(i);

                                        if(child.tagName==="DIV" && child.className==="comment-card") {
                                            let link = document.createElement("a");

                                            link.setAttribute("href",`deleteComment.php?id=${child.id}`);

                                            let del = document.createElement("i");
                                            del.className="fas fa-trash";

                                            link.append(del);
                                            child.append(link);
                                        }
                                    }
                                }else {
                                    return;
                                }
                            })
                        })




                }).catch((err)=> {
                console.log(err);
            })
        })
    }

}
