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
 * heading scroll
 */
// var parent = document.querySelectorAll(".parent");

// parent.forEach((element) => {
//   element.onscroll = () => {
//     if (element.scrollTop > 30) {
//       document.querySelector(".greeting").classList.add("onsc");
//       document.querySelector(".msgs").classList.add("onsc");
//     } else {
//       document.querySelector(".greeting").classList.remove("onsc");
//       document.querySelector(".msgs").classList.remove("onsc");
//     }
//   };
// });

/**
 * Kalau user edit atau create tampilin dragble
 */
if (
  window.location.href === "http://127.0.0.1:8000/file/create" ||
  window.location.href === "http://127.0.0.1:8000/file/1/edit"
) {
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
 * Right Click by Ian
 */
const cards = document.querySelectorAll(".card-file");
const bSalin = document.querySelectorAll("#salin");
let countResult;
let visibleDropdown = null;
let id_file;

function hideDropdown() {
  if (visibleDropdown) {
    visibleDropdown.classList.add("hidden");
    visibleDropdown = null;
  }
}
function hiddenDropdownResult() {
  if (countResult) {
    result.classList.add("hidden");
    visibleDropdown = null;
  }
}

window.addEventListener("contextmenu", (e) => {
  e.preventDefault();
  return false;
});

document.addEventListener("click", (e) => {
  if (visibleDropdown && !visibleDropdown.contains(e.target)) {
    hideDropdown();
  }
  if (countResult && !result.contains(e.target)) {
    hiddenDropdownResult();
  }
});

cards.forEach((c) => {
  c.addEventListener("contextmenu", (e) => {
    hideDropdown();
    id_file = c.getAttribute("data-id_file");
    const dropdown = document.querySelector(`#dropdown`);
    const downlaod = document.querySelector("#download");
    const edit = document.querySelector(`#edit`);

    if (visibleDropdown && visibleDropdown != dropdown) {
      hideDropdown();
    }

    dropdown.style.left = `${e.clientX}px`;
    dropdown.style.top = `${e.clientY}px`;
    dropdown.classList.toggle("hidden");

    downlaod.href = `/download/${id_file}`;
    edit.href = `/file/${id_file}/edit`;
    document.querySelector("#formDelete").action = "/file/" + id_file;
    visibleDropdown = dropdown;
    e.preventDefault();
    return false;
  });
});

/**
 * Nyalin link lewar klik kanan
 */
bSalin.forEach(b => {
  b.addEventListener("click", () => {
    id_file = b.getAttribute('data-id_file');
    const link = document.querySelector(`#link[data-id_file="${id_file}"]`);
    navigator.clipboard.writeText(link.value);
    alert(`Link file #${id_file} berhasil disalin!`);
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
    form.action = "file/send/" + id_file;
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
        result.classList.remove("hidden");
        if (valueSearch == username) {
          buttonKirim.disabled = true;
          pesanFile.setAttribute("disabled", "");
        } else {
          buttonKirim.disabled = false;
          pesanFile.removeAttribute("disabled");
        }
        result.innerHTML = "";
        if (clicked) {
          buttonKirim.disabled = false;
          pesanFile.removeAttribute("disabled");
        } else {
          buttonKirim.disabled = true;
          pesanFile.setAttribute("disabled", "");
        }
        searchUser.addEventListener("keyup", function () {
          clicked = false;
          buttonKirim.disabled = false;
          pesanFile.setAttribute("disabled", "");
        });
        if (users.length == 0) {
          buttonKirim.disabled = true;
          pesanFile.setAttribute("disabled", "");
          notfon.textContent = `User '${valueSearch}' tidak ada!`;
          result.classList.add("hidden");
          notfon.classList.remove("hidden");
          notfon.classList.add("block");
        } else {
          notfon.classList.add("hidden");
          notfon.classList.remove("block");
        }

        users.forEach((u) => {
          const li = document.createElement("li");
          li.textContent = u.username;
          li.classList.add(
            "list-group-item",
            "userLi",
            "block",
            "px-4",
            "py-2",
            "hover:bg-gray-100"
          );
          li.setAttribute("role", "button");
          result.appendChild(li);
          countResult = result;
          let liUser = document.querySelectorAll(".userLi");
          liUser.forEach((uli) => {
            uli.addEventListener("click", () => {
              searchUser.value = uli.innerText;
              result.innerHTML = "";
              countResult = null;
              clicked = true;
              if (clicked) {
                buttonKirim.disabled = false;
                pesanFile.removeAttribute("disabled");
                result.classList.add("hidden");
              } else {
                buttonKirim.disabled = true;
                pesanFile.setAttribute("disabled", "");
              }
            });
          });
        });
      }
    };
    xhr.send();
  } else {
    buttonKirim.disabled = true;
    notfon.classList.add("hidden");
    notfon.classList.remove("block");
    result.innerHTML = "";
  }
});


