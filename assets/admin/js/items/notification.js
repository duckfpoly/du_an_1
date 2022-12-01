function return_page(){
    history.back();
}
document.addEventListener("DOMContentLoaded", function () {
    if (!Notification) {
        alert("Trình duyệt của bạn không hỗ trợ chức năng này.");
        return;
    }
    if (Notification.permission !== "granted") Notification.requestPermission();
});
Pusher.logToConsole = true;
var pusher = new Pusher('fdd2d88095b96edb92f5', {
    cluster: 'ap1'
});
var channel = pusher.subscribe('courses-app');
channel.bind('notice', function (data) {
    n = new Notification(
        'Courses App', {
            body:  data.message,
            icon: '<?= BASE_URL ?>assets/img/apple-icon.png',
            tag:  '<?= BASE_URL ?>'
        }
    );
    setTimeout(n.close.bind(n), 3000);
    n.onclick = function () {
        window.location.href = this.tag;
    }
});