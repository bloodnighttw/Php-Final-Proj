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
    console.log( $('#title1').text());
    client.post('/api/create-content.php',{"title":$('#title1').text(),"delta":quill.getContents()})
        .then(response=>{
            window.location.href = './content.php?id='+response.data['id'];
        });
})

$(document).ready(function(){

    $('#update').hide();

    if($('#content').attr('content-id') !== undefined){
        client.get('/api/content.php',{params:{id:$('#content').attr('content-id')}})
            .then(i=>{
                console.log(i.data);
                quill.setContents(i.data['ops']);
            });
    }


    $('#comment .comment-editor').each(function(){
        let quill = new Quill(this, {
            modules: {
                toolbar: options,
            },
            readOnly: true,
            theme: 'bubble',
            bounds:this
        });
        quill.setContents({})
    })

})

