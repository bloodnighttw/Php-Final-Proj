let options = [
    ["bold","italic",'underline','strike','blockquote'],
    [{ size: [ 'small', false, 'large', 'huge' ]}],
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    [{ 'color': [] }, { 'background': [] }],
    ['link', 'image']
]


let quill = new Quill('#editor', {
    modules: {
        toolbar: options,
    },
    readOnly: true,
    theme: 'bubble'
});

let quill2 = new Quill('#comment-box', {
    modules: {
        toolbar: options,
    },
    readOnly: false,
    theme: 'bubble'
});

let base = "/";
window.location.pathname.split('/').forEach(i=>{if(!i.endsWith(".php")) base+=i+"/";});
let client = axios.create({
    withCredentials: true,
    baseURL:base
})


$('#edit').on('click',function(e){
    e.preventDefault();
    $('#title').attr('contenteditable','true')
    let temp = quill.getContents();
    console.log(temp)
    quill.enable();
    $('#update').fadeIn();
})

$('#del').on('click',function(e){
    e.preventDefault();
})


$('#create').on('click',function (){
    client.post('/api/create-content.php',{"title":$('#title1').text(),"delta":quill.getContents()})
        .then(response=>{
            window.location.href = './content.php?id='+response.data['id'];
        });
})

$('#create-comment').on('click',function (){
    let temp = this;
    client.post('/api/create-comment.php',{"id":$(temp).attr('content-id'),"delta":quill2.getContents()})
        .then(response=>{
            window.location.reload();
        });
})
$('.up').on('click',function (){
    let temp = this;
    $(temp).siblings('.down').removeClass('press');
    $(temp).toggleClass('press');
    if($(temp).hasClass('press')){
        client.get('/api/comment/upvote.php',{params:{id:$(temp).attr('comment-id')}})
            .then(i=>{
                $(temp).siblings('.count').text(i.data['count']);
            })
    }else {
        client.get('/api/comment/reset.php',{params:{id:$(temp).attr('comment-id')}})
            .then(i=>{
                $(temp).siblings('.count').text(i.data['count']);
            })
    }
})

$('.down').on('click',function (){
    let temp = this;
    $(temp).siblings('.up').removeClass('press');
    $(temp).toggleClass('press');
    if($(temp).hasClass('press')){
        client.get('/api/comment/downvote.php',{params:{id:$(temp).attr('comment-id')}})
            .then(i=>{
                $(temp).siblings('.count').text(i.data['count']);
            })
    }else {
        client.get('/api/comment/reset.php',{params:{id:$(this).attr('comment-id')}})
            .then(i=>{
                $(temp).siblings('.count').text(i.data['count']);
            })
    }
})


$('.cup').on('click',function (){
    let temp = this;
    $(temp).siblings('.cdown').removeClass('press');
    $(temp).toggleClass('press');
    if($(temp).hasClass('press')){
        client.get('/api/content/upvote.php',{params:{id:$('#content').attr('content-id')}})
            .then(i=>{
                $(temp).siblings('.count').text(i.data['count']);
            })
    }else {
        client.get('/api/content/reset.php',{params:{id:$('#content').attr('content-id')}})
            .then(i=>{
                $(temp).siblings('.count').text(i.data['count']);
            })
    }
})

$('.cdown').on('click',function (){
    let temp = this;
    $(temp).siblings('.cup').removeClass('press');
    $(temp).toggleClass('press');
    if($(temp).hasClass('press')){
        client.get('/api/content/downvote.php',{params:{id:$('#content').attr('content-id')}})
            .then(i=>{
                console.log(i.data);
                $(temp).siblings('.count').text(i.data['count']);
            })
    }else {
        client.get('/api/content/reset.php',{params:{id:$('#content').attr('content-id')}})
            .then(i=>{
                $(temp).siblings('.count').text(i.data['count']);
            })
    }
})

$(document).ready(function(){

    $('#update').hide();

    if($("#content").attr('content-id') !== undefined){
        client.get('/api/content.php',{params:{id:$('#content').attr('content-id')}})
            .then(i=>{
                console.log(i.data);
                quill.setContents(i.data['ops']);
            }).catch(i=>{
                alert('無法更新');
            });
    }


    $('#comment .comment-editor').each(function(){
        let comment = new Quill(this, {
            modules: {
                toolbar: options,
            },
            readOnly: true,
            theme: 'bubble',
            bounds:this
        });
        client.get('/api/comment.php',{params:{id:$(this).attr('comment-id')}})
            .then(i=>{
                console.log(i.data)
                comment.setContents(i.data['ops']);
            })
    })

})

