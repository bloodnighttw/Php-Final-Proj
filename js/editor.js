
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

let default_contetnt = {
    "ops": [
        {
            "attributes": {
                "color": "#e60000",
                "background": "#ffffcc",
                "size": "huge"
            },
            "insert": "這是一個WYSIWYG(所見及所得)編輯器，使用Github上的開源專案"
        },
        {
            "attributes": {
                "size": "huge",
                "color": "#e60000",
                "background": "#ffffcc",
                "link": "https://github.com/quilljs/quill/"
            },
            "insert": "Quill"
        },
        {
            "attributes": {
                "size": "huge",
                "color": "#e60000",
                "background": "#ffffcc"
            },
            "insert": " 修改而成，你可以在右上角選單按鈕按一下叫出選單，按下編輯啟用編輯，並反白此段文字，你將會看到編輯器介面，還可以貼上圖片。"
        },
        {
            "insert": "\n"
        },
        {
            "insert": {
                "image": "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABNcAAADTCAYAAACiNfUhAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAADnzSURBVHhe7d0HnFXF2cfxB+uiIiBgF0QRo2AXwRBjw4ZoFEWwiygqGjV2ia9J1IhgiSaxBEWssYCoFFuwhwgqFgQLIAgWREREpVh59z975jJ79pZzzzZ2+X33cz/3nj4zp9xzn52Z02BZKQMAAAAAAABQtFWidwAAAAAAAABFIrgGAAAAAAAApERwDQAAAAAAAEiJ4BoAAAAAAACQEsE1AAAAAAAAICWCawAAAAAAAEBKBNcAAAAAAACAlAiuAQAAAAAAACkRXAMAAAAAAABSIrgGAAAAAAAApERwDQAAAAAAAEiJ4BoAAAAAAACQEsE1AAAAAAAAICWCawAAAAAAAEBKBNcAAAAAAACAlOpMcG3ZsmW2eMkS917XTXj1Ndui7baZl4YBAAAAAABQ99RIcG3BggXWvUevcgGlfK899u5i0z+cES1t9sW8eXZSn77WfoddrNexJ9iMmTOjKQAAAAAAAEDtqRM114Y/8qi9/N9x7vNrr0+0xx4f5T4DAAAAAAAAtalO9rlWUlISfcLXCxfa0/8Za6f1O8ten/hGNBYAAAAAAAA1oVaCawcesL+Ne/E5mzhhXNbXqMcesdabt4rmNuvZ40g75OCu1rBhiXvXMMr6btu5w+52xpln23/GPmc///xzNAUAAAAAAAA1oVaCa2ussYY1adLEmjZtmvXVpHFjW3XVVaO5zZo1W89u+tt1NuXtN9y7hgEAAAAAAIDaViebhQIAAAAAAAArAoJrAAAAAAAAQEp1IrimvsW2aLtt5qVhUR9jf//nLeWm3Xf/A25a3Lx5X1qvY0/IzHfiyae6hwHELV6yxEY89rid1Kev7dShk5tX7xoeNeYJW7p0aTRnbrM//tiuGjDQ9txnf7f8Ntvt5Lb33PMvVLpftAULFlj3Hr3ceo8+7sRobBkN+/ztsXcXm/7hjGhKeXPmfG53Dr3beh5zvEub5m+77fZ2aPcedtM/bnbpX7ZsWTR3eUuWLLVzz78osx191rhffvnF/vfKeNf/my835V/loPUBAAAAAADUR3W65pr6Zet51JG2y847R2PMHho23AWPQgoUPfHU0/bqa6+74caN17Vzzz7L9e3maR5NP/jQw+2Ciy61l17+ry1c+I2bpncNn/OHC1wAa8bMmW58nAJnClod0PVQ9/7xJ5+48d9//729/N9xdspp/eyvAwbaokWL3PiapsDhoOtusD33LQt6vfb6RJc2+emnn2zy5CkuuNblgIPtr9cMssWLF7tphWi+q66+xo478WT35FJfbsq/Lw8FLHMF7AAAAAAAAOqqOt8sdIP117d+p59qq622mhue8u579vjIUeUCOR9//In9+8GHoiGz007pYzvusH00VOaV8RPstH5n2axZs92wAnAH7NfFTj7pBGvfvl1m/W9Pesf++H9/ti/mzXPDnrb36GMj7Zprr88ErLyWLTezNddc032+65777N77/+0+p9FglVVs0002sR2238623GKLaGwZDWu8n7Z6lGZRAOzyP11htw2+wwXSPKVL8/r8iaYrKHb5n68sGGBTXm/912CXL2nRorl7hTTPlX8d4MoYAAAAAACgPqmV4NrIUaOt3Q47Z5oWxl+qXVWMzr/e3Y46sns0ZPboyFEuoCaqTfbQsEds2rTpbniP33S2Xr2OsgYNGrhhmT37Y/vLVVdnalyd2qe3jXvpebv15r/bZf0vsccfedgevP8ea7355m66mqUOGz6iXABPQb3r/3ZTJnC1ySYb25DBt9q0996xF8Y+be9OesPGPj3Gdu/U0V586b9unjRU2+7vN15vjw5/yK664k/R2DIa1ni97hoy2Fq1aunGqwzuuPMuV3vM27/LvvbcM0+6dP3nqdH2/uS37JGHH3CBOW/k6DH21DP/iYaye+nll+2e+/5txx7d01757ws2YdxL7vX2xAl2et9TMkE7le2/bh+StSkuAAAAAABAXVUvHmiwxhprWO+TTsgEvxRIGz7iURdUmvTOZPv3gw+68aqN1u/0vhWag6ovNR98O+TgrnbO78+0tRo2dMOiQNzOO+1ovU88Phpj9vwLL7r+z0TbeXzkaJv7xRduWNsZePVVtvdee7qmq6J1bNG6tf3t+kHWcbcOblxNmTZ9uj3w4MPRkFn3w35nN1w30DbfvFUmyLjKKqvYTjvuYLfd8o9MM1sFCh8Z8VjegJj6Wzu1z8n258svc7UIvUaNGtn5fzjHjj/26GiM2RtvvmUffTQrGgIAAAAAAKj76kVwTdS08cx+p2VqSqlmmZpw3n3v/Zka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"
            }
        },
        {
            "insert": "\n\n"
        }
    ]
}

let default_comment = {
    "ops": [
        {
            "attributes": {
                "color": "#e60000",
                "background": "#ffffcc",
                "size": "huge"
            },
            "insert": "這是一個留言板，使用WYSIWYG(所見及所得)編輯器，使用Github上的開源專案"
        },
        {
            "attributes": {
                "color": "#e60000",
                "background": "#ffffcc",
                "size": "huge",
                "link": "https://github.com/quilljs/quill/"
            },
            "insert": "Quill"
        },
        {
            "attributes": {
                "color": "#e60000",
                "background": "#ffffcc",
                "size": "huge"
            },
            "insert": " 修改而成。\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n"
        },
        {
            "insert": "\n\n"
        }
    ]
}

quill.setContents(default_contetnt.ops)



$('#edit').click(function(e){
    e.preventDefault();
    $('#title').attr('contenteditable','true')
    let temp = quill.getContents();
    console.log(temp)
    quill.enable();
})

$('#del').click(function(e){
    e.preventDefault();
})

$(document).ready(function(){
    $('#comment .comment-editor').each(function(){
        let quill = new Quill(this, {
            modules: {
                toolbar: options,
            },
            readOnly: true,
            theme: 'bubble',
            bounds:this
        });
        quill.setContents(default_comment.ops)
    })

})

