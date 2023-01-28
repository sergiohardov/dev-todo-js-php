"use strict";
const getData = async (url) => {
  try {
    const response = await fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
    });

    return await response.json();
  } catch (error) {
    console.error("Ошибка:", error);
  }
};
const sendData = async (url, data) => {
  try {
    const response = await fetch(url, {
      method: "POST",
      body: JSON.stringify(data),
      headers: {
        "Content-Type": "application/json",
      },
    });

    const json = await response.json();

    console.log(json);
  } catch (error) {
    console.error("Ошибка:", error);
  }
};
const refreshList = (data, list) => {
  data.forEach((item) => {
    let html = "";
    html += "<li>";
    html += `<span>${item.task}</span>`;
    html += `<button class="todo__list-delete btn btn-danger" data-id-task="${item.id}">Удалить</button>`;
    html += "</li>";

    list.insertAdjacentHTML("afterbegin", html);
  });

  refreshDeletes();
};
const refreshDeletes = () => {
  const list = document.querySelector(".todo__list");
  const buttons = document.querySelectorAll(".todo__list-delete");

  buttons.forEach((button) => {
    button.addEventListener("click", (e) => {
      e.preventDefault();

      const taskId = button.getAttribute("data-id-task");

      sendData("../delete.php", {
        id: taskId,
      }).then(() => {
        getData("../update.php").then((data) => {
          list.innerHTML = "";
          refreshList(data, list);
        });
      });
    });
  });
};

document.addEventListener("DOMContentLoaded", () => {
  const form = document.querySelector(".todo__form");
  const formInput = form.querySelector(".todo__form-input");
  const formButton = form.querySelector(".todo__form-button");
  const list = document.querySelector(".todo__list");

  getData("../update.php").then((data) => {
    list.innerHTML = "";
    refreshList(data, list);
  });

  formButton.addEventListener("click", async (e) => {
    e.preventDefault();

    sendData("../add.php", { text: formInput.value })
      .then(() => getData("../update.php"))
      .then((data) => {
        list.innerHTML = "";
        formInput.value = "";
        refreshList(data, list);
      });
  });
});
