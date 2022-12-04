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
            body: data.message,
            icon: admin+'assets/img/apple-icon.png',
            tag:  admin+'/orders?s='+data.order_code
        }
    );
    setTimeout(n.close.bind(n), 6000);
    n.onclick = function () {
        window.location.href = this.tag;
    }
});