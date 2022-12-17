
function showNotifications(message) {
    const title = 'Thông báo mới';
    const type = 'success';
    noti({
        title: title,
        message: message,
        type: type,
        duration: 3000
    });
}
function noti({ title = "", message = "", type = "info", duration = 3000 }) {
    const main = document.getElementById("noti");
    if (main) {
        const notification = document.createElement("div");
        const autoRemoveId = setTimeout(function () {
            main.removeChild(notification);
        }, duration + 1000);
        notification.onclick = function (e) {
            if (e.target.closest(".noti__close")) {
                main.removeChild(notification);
                clearTimeout(autoRemoveId);
            }
        };
        const icons = {
            success: "fas fa-check-circle",
            info: "fas fa-info-circle",
            warning: "fas fa-exclamation-circle",
            error: "fas fa-exclamation-circle"
        };
        const icon = icons[type];
        const delay = (duration / 1000).toFixed(2);
        notification.classList.add("noti", `noti--${type}`);
        notification.style.animation = `slideInRight ease .3s, fadeOut linear 1s ${delay}s forwards`;
        notification.innerHTML = `
            <div class="noti__icon">
                <i class="${icon}"></i>
            </div>
            <div class="noti__body">
                <h3 class="noti__title">${title}</h3>
                <p class="noti__msg">${message}</p>
            </div>
            <div class="noti__close">
                <i class="fas fa-times"></i>
            </div>
        `;
        main.appendChild(notification);
    }
}