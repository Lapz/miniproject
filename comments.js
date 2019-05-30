//
// function getComments() {
//
//     fetch(`comments.php?id=${}`)
// }


let divs = document.getElementsByClassName("card");


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


function createDomElement(ty,propertys,children) {
    let elem = document.createElement(ty);

    if(propertys.id !== null && propertys.id!== undefined ) {
        elem.id = propertys.id;
    }
   

    if(propertys.name !== null && propertys.name !== undefined ) {
        elem.name = propertys.name;
    }

    if(propertys.className !== null && propertys.className !== undefined ) {
        elem.className = propertys.className;
    }

    if(propertys.attributes !== null && propertys.attributes !== undefined && !propertys.attributes ) {

        for(let i  =0;i < propertys.attributes.length;i+=1) {
            let keys =Object.keys(propertys.attributes[i]);

            if (keys.length > 1) {
                console.log("a key value pair of more than one was passed");
            }

            elem.setAttribute(keys[0],propertys.attributes[i][keys[0]]);
        }
    }
    
    

    if (children  !== null && children !== undefined) {
        if (children.length > 0) {

            for(let i =0; i < children.length;i+=1) {
                if((typeof children[i] )!=="object") {
                    let child = document.createElement("p");
                    child.append(children[i])
                    elem.appendChild(child);
                }else {
                    elem.appendChild(children[i]);
                }
            }
           
        }
    }

    return elem;
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

    if (child.tagName === "DIV" && child.className ==="card") { // check if its the right kinda div

        child.addEventListener("click", function (event) {
            fetch(`comments.php?id=${child.id}`)
                .then((response) => {

                    let comments = document.getElementById("comments");

                    if(comments === null || comments=== undefined|| !comments) {
                        let column = document.createElement("div");

                        column.className="column";

                        // comments.setAttribute("data-postid",child.id);

                        column.appendChild(createDomElement("div",{
                            className:"box",
                            id:"comments",
                            attributes: [{
                                "data-postid":child.id
                            }]
                        }))

                        document.getElementById("cols").appendChild(column);

                    }

                    comments = document.getElementById("comments"); //update the reference to the comments

                    clear(comments);// remove all old comments;
                    comments.setAttribute("data-postid",child.id); // set the current post-id
                    // if the div was already present

                    response.text().then((data) => {

                        console.log(data);
                        let comment_data = Object.values(JSON.parse(data));



                        for (let i=0;i<comment_data.length;i++) {
                            let box = createDomElement("div",{
                                className:"card",
                                id:comment_data[i]["4"],
                            },[
                                createDomElement("div",{
                                    className:"card-content"
                                },[
                                    createDomElement("div",{
                                        className:"media-content"
                                    },[
                                        createDomElement("p",{
                                            className:"title is-5"
                                        },[
                                            `${comment_data[i]["3"]} commented`
                                        ]),
                                        createDomElement("p",{
                                            className:"subtitle is-6"
                                        },[
                                            createDomElement("i",{
                                                className:"far fa-clock"
                                            },[
    
                                            ]),
    
                                            `${comment_data[i]["1"]}`,  
                                        ]),
    
                                    ]),

                                    createDomElement("div",{
                                        className:"content"
                                    },[
                                        `${comment_data[i]["0"]}`
                                    ])
                                ]), 
                            ]);
                            console.log(comment_data[i]);
                            

                            comments.appendChild(box);
                            //space the cards out
                            comments.appendChild(...[ createDomElement("br",{

                            }),
                            createDomElement("br",{
                            
                            })]);

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

                                        if(child.tagName==="DIV" && child.className==="card") {
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
