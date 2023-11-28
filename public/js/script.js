/**
 * dari nanamnya taulah
 */
function showPreview(event) {
    if (event.target.files.length > 0) {
        let src = URL.createObjectURL(event.target.files[0]);
        let preview = document.getElementById("imgPreview");
        preview.src = src;
    }
}

/**
 * Kalau user edit  atau create tampilin dragble
 */
if (
    window.location.href === "http://127.0.0.1:8000/file/create" ||
    window.location.href === "http://127.0.0.1:8000/file/1/edit"
) {
    document.querySelectorAll(".dropFile").forEach((i) => {
        const dropArea = i.closest(".dropArea");
        dropArea.addEventListener("click", (e) => {
            i.click();
        });

        i.addEventListener("change", (e) => {
            if (i.files.length) {
                thumb(dropArea, i.files[0]);
            }
        });

        dropArea.addEventListener("dragover", (e) => {
            e.preventDefault();
            dropArea.classList.add("dropArea-over");
        });
        ["dragleave", "dragend"].forEach((type) => {
            dropArea.addEventListener(type, (e) => {
                dropArea.classList.remove("dropArea-over");
            });
        });
        dropArea.addEventListener("drop", (e) => {
            e.preventDefault();
            if (e.dataTransfer.files.length) {
                i.files = e.dataTransfer.files;
                thumb(dropArea, e.dataTransfer.files[0]);
            }
            dropArea.classList.remove("dropArea-over");
        });
    });

    function thumb(dropArea, file) {
        let thumbElement = dropArea.querySelector(".dropArea-thumb");

        if (dropArea.querySelector(".dropText")) {
            dropArea.querySelector(".dropText").remove();
        }

        if (!thumbElement) {
            thumbElement = document.createElement("div");
            thumbElement.classList.add("dropArea-thumb");
            dropArea.appendChild(thumbElement);
        }
        thumbElement.dataset.label = file.name;

        if (file.type.startsWith("image/")) {
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

/**
 * Hapus user lain oleh admin
 */
const targetDelete = document.querySelectorAll(".deleteA");
targetDelete.forEach((target) => {
    target.addEventListener("click", () => {
        const formDel = document.querySelector("#form-delete-admin");
        const namaAkun = document.querySelector(".nmA");
        let idTarget = target.getAttribute("data-user");
        let nmTarget = target.getAttribute("data-acc");

        formDel.action = "";
        formDel.action = `users/hapus/${idTarget}`;
        namaAkun.textContent = nmTarget;
    });
});

/**
 * Nyalin link
 */
const bSalin = document.querySelectorAll("#salin");
bSalin.forEach((b) => {
    b.addEventListener("click", () => {
        link = document.querySelector("#link");
        navigator.clipboard.writeText(link.value);
        alert("Link file berhasil disalin!");
    });
});

/**
 * ajax nyari user
 */
const searchUser = document.querySelector("#searchUser");
const result = document.querySelector("#result");
const buttonModalShare = document.querySelectorAll("#bSearch");
const notfon = document.querySelector("#notfon");
const pesanFile = document.querySelector("#pesan");
let clicked = false;
let username;

pesanFile.setAttribute("disabled", "");

buttonModalShare.forEach((b) => {
    b.addEventListener("click", () => {
        const form = document.querySelector("#form");
        let id_file = b.getAttribute("data-id_file");
        username = b.getAttribute("data-user");
        form.action = "";
        form.action = "/kirimFile/" + id_file;
    });
});

searchUser.addEventListener("input", function () {
    let valueSearch = searchUser.value.trim();
    const buttonKirim = document.querySelector("#kirimUser");
    if (valueSearch != "") {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `/username?q=${valueSearch}`, true);
        xhr.onload = function () {
            if (xhr.status == 200) {
                const users = JSON.parse(xhr.responseText);

                if (valueSearch == username) {
                    buttonKirim.classList.add("disabled");
                    pesanFile.setAttribute("disabled", "");
                } else {
                    buttonKirim.classList.remove("disabled");
                    pesanFile.removeAttribute("disabled");
                }
                result.innerHTML = "";

                if (clicked) {
                    buttonKirim.classList.remove("disabled");
                    pesanFile.removeAttribute("disabled");
                } else {
                    buttonKirim.classList.add("disabled");
                    pesanFile.setAttribute("disabled", "");
                }

                searchUser.addEventListener("keyup", function () {
                    clicked = false;
                    buttonKirim.classList.add("disabled");
                    pesanFile.setAttribute("disabled", "");
                });

                if (users.length == 0) {
                    buttonKirim.classList.add("disabled");
                    pesanFile.setAttribute("disabled", "");
                    notfon.textContent = `User '${valueSearch}' tidak ada!`;
                    notfon.classList.remove("d-none");
                    notfon.classList.add("d-block");
                } else {
                    notfon.classList.add("d-none");
                    notfon.classList.remove("d-block");
                }

                users.forEach((u) => {
                    const li = document.createElement("li");
                    li.textContent = u.username;
                    li.classList.add("list-group-item");
                    li.classList.add("userLi");
                    li.setAttribute("role", "button");
                    result.appendChild(li);
                    let liUser = document.querySelectorAll(".userLi");
                    liUser.forEach((uli) => {
                        uli.addEventListener("click", () => {
                            searchUser.value = uli.innerText;
                            result.innerHTML = "";
                            clicked = true;

                            if (clicked) {
                                buttonKirim.classList.remove("disabled");
                                pesanFile.removeAttribute("disabled");
                            } else {
                                buttonKirim.classList.add("disabled");
                                pesanFile.setAttribute("disabled", "");
                            }
                        });
                    });
                });
            }
        };

        xhr.send();
    } else {
        buttonKirim.classList.add("disabled");
        notfon.classList.add("d-none");
        notfon.classList.remove("d-block");
        result.innerHTML = "";
    }
});
