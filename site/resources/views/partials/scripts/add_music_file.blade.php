<script>
    let musicSetForm = document.getElementById('musicset-form');
    let addFileInputButton = document.getElementById('add-file-input-button');
    let musicSetSubmit = document.getElementById('musicset-submit');
    let hiddenFileInputIndex = document.getElementById('file-input-index');

    addFileInputButton.addEventListener('click', addFileInput);

    function addFileInput(event, num) {
        if (event && event.type == 'click') {
            if (sessionStorage.getItem('fileInputIndex')) {
                sessionStorage.setItem('fileInputIndex', parseInt(sessionStorage.getItem('fileInputIndex')) + 1);
            }
            else {
                sessionStorage.setItem('fileInputIndex', 1);
            }
        }

        let fileInputIndex = parseInt(sessionStorage.getItem('fileInputIndex'));

        let musicFileID = 'music_file[' + (num ? (num - 1) : fileInputIndex) + ']';
        let fileInputElem = document.createElement('input');
        let fileInputLabelElem = document.createElement('label');
        let deleteFileInputElem = document.createElement('input');
        fileInputElem.setAttribute('type', 'file');
        fileInputElem.setAttribute('name', musicFileID);
        fileInputElem.setAttribute('id', musicFileID);
        fileInputElem.classList.add('extra-file');
        fileInputLabelElem.setAttribute('for', musicFileID);
        fileInputLabelElem.textContent = 'Music file ' + (num ? num : (fileInputIndex + 1));
        fileInputLabelElem.classList.add('extra-label');
        deleteFileInputElem.setAttribute('type', 'button');
        deleteFileInputElem.setAttribute('value', 'x');
        deleteFileInputElem.setAttribute('id', 'delete-file-input-button-' + (num ? (num - 1) : fileInputIndex));
        deleteFileInputElem.addEventListener('click', deleteFileInput);
        deleteFileInputElem.indexToBeDeleted = num ? (num - 1) : fileInputIndex;
        hiddenFileInputIndex.setAttribute('value', num ? (num - 1) : fileInputIndex);

        musicSetForm.insertBefore(fileInputLabelElem, addFileInputButton);
        musicSetForm.insertBefore(deleteFileInputElem, addFileInputButton);
        musicSetForm.insertBefore(fileInputElem, addFileInputButton);
    }

    function deleteFileInput(event) {
        let fileInputIndex = parseInt(sessionStorage.getItem('fileInputIndex'));
        let indexToBeDeleted = event.currentTarget.indexToBeDeleted;
        let fileInputElemToBeDeleted = document.getElementById('music_file[' + indexToBeDeleted + ']');
        let fileInputLabelElemToBeDeleted = document.querySelector('label[for="music_file[' + indexToBeDeleted + ']"]');
        let deleteFileInputElemToBeDeleted = document.getElementById('delete-file-input-button-' + indexToBeDeleted);

        sessionStorage.setItem('fileInputIndex', fileInputIndex - 1);

        musicSetForm.removeChild(fileInputElemToBeDeleted);
        musicSetForm.removeChild(fileInputLabelElemToBeDeleted);
        musicSetForm.removeChild(deleteFileInputElemToBeDeleted);
        hiddenFileInputIndex.setAttribute('value', parseInt(sessionStorage.getItem('fileInputIndex')));

        let allFileInputElems = document.getElementsByClassName('extra-file');
        let allFileInputLabelElems = document.getElementsByClassName('extra-label');
        let allDeleteFileInputElem = document.querySelectorAll('input[id^="delete-file-input-button-"]');
        console.log(allFileInputElems);
        console.log(allDeleteFileInputElem);

        for (let i = 0; i < allFileInputElems.length; i++) {
            allFileInputElems[i].setAttribute('name', 'music_file[' + (i + 1) + ']');
            allFileInputElems[i].setAttribute('id', 'music_file[' + (i + 1) + ']');
            allFileInputLabelElems[i].setAttribute('for', 'music_file[' + (i + 1) + ']');
            allFileInputLabelElems[i].textContent = 'Music file ' + (i + 2);
            allDeleteFileInputElem[i].indexToBeDeleted = (i + 1);
            allDeleteFileInputElem[i].setAttribute('id', 'delete-file-input-button-' + (i + 1));
        }

        if (sessionStorage.getItem('fileInputIndex') <= 0) {
            sessionStorage.removeItem('fileInputIndex');
        }
    }

    if (sessionStorage.getItem('fileInputIndex')) {
        let fileInputIndex = parseInt(sessionStorage.getItem('fileInputIndex'));

        for(let i = 0; i < fileInputIndex; i++) {
            addFileInput(null, i + 2);
        }
    }
</script>
