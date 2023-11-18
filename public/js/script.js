function showPreview(event) {
    if (event.target.files.length > 0) {
        let src = URL.createObjectURL(event.target.files[0]);
        let preview = document.getElementById("imgPreview");
        preview.src = src;
    }
}

if (window.location.href === 'http://127.0.0.1:8000/file/create' || window.location.href === 'http://127.0.0.1:8000/file/1/edit') {
    document.querySelectorAll('.dropFile').forEach((i) => {
        const dropArea = i.closest('.dropArea');
        dropArea.addEventListener('click', (e) => {
            i.click();
        });

        i.addEventListener('change', (e) => {
            if (i.files.length) {
                thumb(dropArea, i.files[0]);
            }
        })

        dropArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropArea.classList.add('dropArea-over');
        });
        ['dragleave', 'dragend'].forEach((type) => {
            dropArea.addEventListener(type, (e) => {
                dropArea.classList.remove('dropArea-over');
            })
        });
        dropArea.addEventListener('drop', (e) => {
            e.preventDefault();
            if (e.dataTransfer.files.length) {
                i.files = e.dataTransfer.files;
                thumb(dropArea, e.dataTransfer.files[0]);
            }
            dropArea.classList.remove('dropArea-over');
        });
    })

    function thumb(dropArea, file) {
        let thumbElement = dropArea.querySelector('.dropArea-thumb');

        if (dropArea.querySelector('.dropText')) {
            dropArea.querySelector('.dropText').remove();
        }

        if (!thumbElement) {
            thumbElement = document.createElement('div');
            thumbElement.classList.add('dropArea-thumb');
            dropArea.appendChild(thumbElement);
        }
        thumbElement.dataset.label = file.name;

        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => {
                thumbElement.style.backgroundImage = `url('${reader.result}')`;
            };
        } else {
            thumbElement.style.backgroundImage = null;
        }
    }
}

const bSalin = document.querySelectorAll("#salin");
bSalin.forEach((b) => {
    b.addEventListener('click', () => {
        link = document.querySelector('#link');
        navigator.clipboard.writeText(link.value);
        alert('berhasil disalin');
    });
})


const searchUser = document.querySelector('#searchUser');
const result = document.querySelector('#result');
const bSearch = document.querySelectorAll('#bSearch');
bSearch.forEach(b => {
    b.addEventListener('click', () => {
        let id_file = b.getAttribute('data-id_file');
        const formKirim = document.querySelector('#form');
        formKirim.action = '/kirimFile/' + id_file;
        searchUser.addEventListener('input', function() {
            const user = searchUser.value.trim();
            if(user != '') {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', `/username?q=${user}`, true);
                xhr.onload = function() {
                    if(xhr.status == 200) {
        
                        const users  = JSON.parse(xhr.responseText);
                        const id_file = event.relatedTarget;
        
                        result.innerHTML = '';
        
                        users.forEach(u => {
                            const li = document.createElement('li');
                            li.textContent = u.username;
                            li.classList.add('list-group-item')
                            result.appendChild(li);
                        })
                    }
                };
        
                xhr.send();
            } else {
                result.innerHTML = '';
            }
        })
    })
})