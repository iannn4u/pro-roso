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
const bSalin = document.querySelector("#salin");
let countResult;
let visibleDropdown = null;
let id_file;
let file_name;

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

document.addEventListener("keydown", (event) => {
  if (event.key === "Escape") {
    //if esc key was not pressed in combination with ctrl or alt or shift
    const isNotCombinedKey = !(event.ctrlKey || event.altKey || event.shiftKey);
    if (isNotCombinedKey) {
      hideDropdown(); // https://stackoverflow.com/a/64446856
    }
  }
});

cards.forEach((c) => {
  c.addEventListener("contextmenu", (e) => {
    hideDropdown();
    id_file = c.getAttribute("data-id_file");
    file_name = c.querySelector("a").textContent;

    const dropdown = document.querySelector(`#dropdown`);
    const downlaod = document.querySelector("#download");
    const edit = document.querySelector(`#edit`);
    // const filnm = document.querySelector(`#edit`);

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
// bSalin.addEventListener("click", () => {
//   const link = document.querySelector(`#link[data-id_file="${id_file}"]`);
//   navigator.clipboard.writeText(link.value);
//   alert(`Link file #${id_file} berhasil disalin!`);
// });

/**
 * ajax nyari user
 */


/**
 * Hide Modal Notif
 */
const modalNotif = document.querySelector(`#notif`);
const triggerCloseModalNotif = document.querySelector(`#closeModalNotif`);
if (triggerCloseModalNotif != null) {
  triggerCloseModalNotif.addEventListener('click', () => modalNotif.classList.add('hidden'));
}


/**
 * Salin URL File
 */
const buttonSalinUrl = document.querySelectorAll('#salin');
buttonSalinUrl.forEach(b => {
  b.addEventListener('click', () => {
    const id_file = b.getAttribute('data-id_file');
    const linkUrl = document.querySelector(`#link[data-id_file="${id_file}"]`);
    navigator.clipboard.writeText(linkUrl.value);
    alert(`Link file #${id_file} berhasil disalin!`);
  });
})


/**
 * Delete File
 */
const buttonShowModalDelete = document.querySelectorAll('#buttonShowModalDelete');
buttonShowModalDelete.forEach(b => {
  b.addEventListener('click', () => {
    const dropdown = document.querySelectorAll(`.dropdownUserIndex`);
    dropdown.forEach(m => {
      m.classList.add('hidden');
    })
    const id_file = b.getAttribute('data-id_file');
    const form = document.querySelector(`#formDeleteFile`);
    form.action = `file/${id_file}`;
  });
})


/**
 * Modal Share Another User
 */
const buttonShowModalShare = document.querySelectorAll('#buttonShowModalShare');
const form = document.querySelector("#formShareFile");
buttonShowModalShare.forEach(b => {
  b.addEventListener('click', () => {
    const modalShareAnotherUser = document.querySelector('#modalShareAnotherUser').classList.add('hidden');
    const dropdown = document.querySelectorAll(`.dropdownUserIndex`);
    const id_file = b.getAttribute("data-id_file");
    dropdown.forEach(m => {
      m.classList.add('hidden');
    })
    form.action = "";
    form.action = "file/send/" + id_file;
    console.log(form.action)
  })
});

const modalResultAjaxUser = document.querySelector('#result');
document.addEventListener('click', function (event) {
  // Periksa apakah klik dilakukan di luar elemen result
  if (!modalResultAjaxUser.contains(event.target)) {
    // Jika ya, tambahkan class hidden pada elemen result
    modalResultAjaxUser.classList.add('hidden');
  }
});

// Event listener untuk menampilkan kembali elemen result jika diklik
modalResultAjaxUser.addEventListener('click', function (event) {
  // Hapus class hidden saat elemen result diklik
  modalResultAjaxUser.classList.remove('hidden');
});

const result = document.querySelector("#result");
const buttonModalShare = document.querySelectorAll("#bSearch");
const notfon = document.querySelector("#notfon");
let clicked = false;
let username;

const searchUser = document.querySelector("#searchUser");
searchUser.addEventListener("input", function () {
  let valueSearch = searchUser.value.trim();
  if (valueSearch != "") {
    result.innerHTML = "<span class='block px-4 py-2'>Loading...</span>";
    const userPromise = fetch(`/username?q=${valueSearch}`, {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    }).then((response) => {
      return response.json();
    }).then((dataUsers) => {
      const users = dataUsers.dataUsers;
      result.innerHTML = "";
      searchUser.addEventListener("keyup", function () {
        clicked = false;
      });

      if (users.length == 0) {
        searchUser.classList.add("rounded-lg");
        searchUser.classList.remove("rounded-t-lg");
        result.classList.add("hidden");
        notfon.textContent = `User '${valueSearch}' tidak ada!`;
        notfon.classList.remove("hidden");
        notfon.classList.add("block");
      } else {
        searchUser.classList.remove("rounded-lg");
        searchUser.classList.add("rounded-t-lg");
        result.classList.remove("hidden");
        result.classList.add("block");
        notfon.classList.remove("block");
        notfon.classList.add("hidden");
      }

      users.forEach((user) => {
        const li = document.createElement("li");
        li.textContent = user.username;
        li.classList.add(
          "userLi",
          "block",
          "px-4",
          "py-2",
          "hover:bg-gray-100"
        );
        li.setAttribute("role", "button");
        result.appendChild(li);

        let liUser = document.querySelectorAll(".userLi");
        liUser.forEach((uli) => {
          uli.addEventListener("click", () => {
            searchUser.value = uli.innerText;
            result.innerHTML = "";
            countResult = null;
            clicked = true;

            if (clicked) {
              result.classList.add("hidden");
            }
          });
        });
      });
    })
      .catch((error) => {
        console.error(`Error: ${error.message}`);
      });
  } else {
    searchUser.classList.add("rounded-lg");
    searchUser.classList.remove("rounded-t-lg");
    notfon.classList.add("hidden");
    notfon.classList.remove("block");
    result.classList.add("hidden");
    result.classList.remove("block");
    result.innerHTML = "";
  }
});