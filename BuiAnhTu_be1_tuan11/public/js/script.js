// Tự động ẩn tin nhắn sau 3 giây
setTimeout(function() {
    var element = document.getElementById("successMessage");
    if (element) {
        element.style.display = 'none';
    }
}, 5000);