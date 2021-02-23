let form=document.querySelector('form');
let other_comments=document.querySelector('.other-comments');


form.addEventListener('submit',(e)=>{
    e.preventDefault();

    fetch('treat/comment.php',{
        method: 'POST',
        body: new FormData(e.target),
    }).then(()=> form.content.value='')
})


setInterval(() => {
    let data=new FormData();
    data.append('post_ID',form.post_ID.value)
    data.append('last_comment_ID',form.last_comment_ID.value)
    fetch('treat/comment.php',{
        method: 'POST',
        body: data,
    }).then((resp)=>resp.json()).then((comments)=>{
        if (comments.length==0)
            other_comments.innerHTML+='';
        else{
            other_comments.innerHTML+=comments.map((comment)=>{
                return `
                <div id="${comment.id}" class="mt-5 comments d-flex p-3">
                    <div class="d-flex justify-content-center align-items-center dev-icon">
                        ${comment.author.charAt(0)}
                    </div>
                    <div class="ml-3 comment-content">
                        <h5>${comment.author}</h5>
                        ${comment.content}
                    </div>
                    <span>
                    ${comment.date}
                    </span>
                </div>
                `;
            })
            form.last_comment_ID.value=document.querySelector('.other-comments .comments:last-of-type').id;
        }
        
    })
}, 700);