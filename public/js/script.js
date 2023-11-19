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
const buttonModalShare = document.querySelectorAll('#bSearch');
let username;
buttonModalShare.forEach(b => {
    b.addEventListener('click', () => {
        const form = document.querySelector('#form');
        let id_file = b.getAttribute('data-id_file');
        username = b.getAttribute('data-user');
        form.action = '';
        form.action = '/kirimFile/' + id_file;
    })
})
searchUser.addEventListener('input', function () {
    let valueSearch = searchUser.value.trim();
    const buttonKirim = document.querySelector('#kirimUser');
    if (valueSearch != '') {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', `/username?q=${valueSearch}`, true);
        xhr.onload = function () {
            if (xhr.status == 200) {
                const users = JSON.parse(xhr.responseText);
                valueSearch == username ? buttonKirim.classList.add('disabled') : buttonKirim.classList.remove('disabled');
                result.innerHTML = '';

                if (users.length == 0) {
                    buttonKirim.classList.add('disabled')
                }
                
                users.forEach(u => {
                    const li = document.createElement('li');
                    li.textContent = u.username;
                    li.classList.add('list-group-item');
                    li.classList.add('userLi');
                    result.appendChild(li);
                    let liUser = document.querySelectorAll('.userLi');
                    liUser.forEach(uli => {
                        uli.addEventListener('click', () => {
                            searchUser.value = uli.innerText;
                            result.innerHTML = '';
                        })
                    })
                })
            }
        };

        xhr.send();
    } else {
        buttonKirim.classList.add('disabled');
        result.innerHTML = '';
    }
})
