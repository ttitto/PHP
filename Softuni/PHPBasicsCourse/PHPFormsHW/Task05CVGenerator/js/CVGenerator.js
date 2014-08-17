function addProgLanguage() {
    var elCount = document.getElementsByClassName('prog-lang-input').length;
    var parent = document.getElementById('prog-langs');
    //create input element
    var newInputEl = document.createElement('input');
    newInputEl.className = 'prog-lang-input';
    newInputEl.type = 'text';
    newInputEl.id = 'prog-lang-' + elCount;

    newInputEl.name = 'prog-lang-' + elCount;
    parent.appendChild(newInputEl);
    //create select element
    var oldSelectEl = document.getElementById('prog-lang-level-0');
    var options = oldSelectEl.innerHTML;

    var newSelectEl = document.createElement('select');
    newSelectEl.className = 'prog-lang-select';
    newSelectEl.id = 'prog-lang-level-' + elCount;
    newSelectEl.name = 'prog-lang-level-' + elCount;
    newSelectEl.innerHTML = options;

    parent.appendChild(newSelectEl);
    parent.appendChild(document.createElement('br'));
}
function removeProgLanguage() {
    var elCount = document.getElementsByClassName('prog-lang-input').length;
    if (elCount === 1) {
        return;
    }
    var parent = document.getElementById('prog-langs');
    var inputEl = document.getElementById('prog-lang-' + (elCount - 1));
    parent.removeChild(inputEl);
    var selectEl = document.getElementById('prog-lang-level-' + (elCount - 1));
    parent.removeChild(selectEl);
    parent.removeChild(parent.getElementsByTagName('br')[elCount-1]);

}
function addLanguage() {
    var elCount = document.getElementsByClassName('lang-input').length;
    var parent = document.getElementById('langs');
    //create input element
    var newInput=document.createElement('input');
    newInput.type='text';
    newInput.id='lang-'+elCount;
    newInput.name='lang-'+elCount;
    newInput.className='lang-input';
    parent.appendChild(newInput);

    //create comprehension select
    var comprSelect=document.getElementById('lang-compr-0');
    var newComprSelect=document.createElement('select');
    newComprSelect.id='lang-compr-'+elCount;
    newComprSelect.name='lang-compr-'+elCount;
    newComprSelect.innerHTML=comprSelect.innerHTML;
    parent.appendChild(newComprSelect);

    //create reading select
    var readSelect=document.getElementById('lang-read-0');
    var newReadSelect=document.createElement('select');
    newReadSelect.id='lang-read-'+elCount;
    newReadSelect.name='lang-read-'+elCount;
    newReadSelect.innerHTML=readSelect.innerHTML;
    parent.appendChild(newReadSelect);

    //create writing select
    var writeSelect=document.getElementById('lang-write-0');
    var newWriteSelect=document.createElement('select');
    newWriteSelect.id='lang-write-'+elCount;
    newWriteSelect.name='lang-write-'+elCount;
    newWriteSelect.innerHTML=writeSelect.innerHTML;
    parent.appendChild(newWriteSelect);
    parent.appendChild(document.createElement('br'));

}
function removeLanguage() {
    var elCount = document.getElementsByClassName('lang-input').length;
    if (elCount === 1) {
        return;
    }
    var parent = document.getElementById('langs');
    var inputEl = document.getElementById('lang-' + (elCount - 1));
    parent.removeChild(inputEl);
    var selectComprEl = document.getElementById('lang-compr-' + (elCount - 1));
    parent.removeChild(selectComprEl);
    var selectReadEl = document.getElementById('lang-read-' + (elCount - 1));
    parent.removeChild(selectReadEl);
    var selectWriteEl = document.getElementById('lang-write-' + (elCount - 1));
    parent.removeChild(selectWriteEl);
    parent.removeChild(parent.getElementsByTagName('br')[elCount-1]);
}

