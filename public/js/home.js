function deletePost(id) {
                    'use strict'

                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }  
}
                
let textarea = document.getElementById('body');

let clientHeight = textarea.clientHeight;

textarea.addEventListener('input', ()=>{
    textarea.style.height = clientHeight + 'px';
    let scrollHeight = textarea.scrollHeight;
    textarea.style.height = scrollHeight + 'px';
});  

