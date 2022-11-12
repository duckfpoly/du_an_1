function showSuccessToast(title, message, type) {
    toast({
        title: title,
        message: message,
        type: type,
        duration: 3000
    });
}
// Toast function
function toast({ title = "", message = "", type = "info", duration = 3000 }) {
    const main = document.getElementById("toastt");
    if (main) {
        const toast = document.createElement("div");
        // Auto remove toast
        const autoRemoveId = setTimeout(function () {
            main.removeChild(toast);
        }, duration + 1000);

        // Remove toast when clicked
        toast.onclick = function (e) {
            if (e.target.closest(".toastt__close")) {
                main.removeChild(toast);
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

        toast.classList.add("toastt", `toastt--${type}`);
        toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;

        toast.innerHTML = `
            <div class="toastt__icon">
                <i class="${icon}"></i>
            </div>
            <div class="toastt__body">
                <h3 class="toastt__title">${title}</h3>
                <p class="toastt__msg">${message}</p>
            </div>
            <div class="toastt__close">
                <i class="fas fa-times"></i>
            </div>
        `;
        main.appendChild(toast);
    }
}
