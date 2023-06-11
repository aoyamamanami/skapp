const text =  document.getElementById('origin-text');
const textChange =  document.getElementById('translated-text');
const translateBtn =  document.getElementById('translate-btn');
translateBtn.addEventListener('click', function() {
    if(translateBtn.textContent === '翻訳'){
        text.classList.add('text-hidden');
        textChange.classList.remove('text-hidden');
        translateBtn.textContent = '原文';
    } else {
        text.classList.remove('text-hidden');
        textChange.classList.add('text-hidden');
        translateBtn.textContent = '翻訳';
    }
    console.log(translateBtn.textContent);
});