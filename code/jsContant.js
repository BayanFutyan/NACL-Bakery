
function setActiveTab(event) {

    // إزالة الصف النشط من جميع التبويبات
    const tabs = document.querySelectorAll('.tap a');
    tabs.forEach(tab => tab.classList.remove('active'));

    // إضافة الصف النشط إلى التبويب الذي تم الضغط عليه
    event.currentTarget.classList.add('active');
}
//صودوق البحث
let isSearchVisible = false;

// تابع لتبديل حالة عرض صندوق البحث
function toggleSearch() {
    const searchForm = document.getElementById('search-form');
    isSearchVisible = !isSearchVisible; // تبديل قيمة المتغير بولياني
    searchForm.style.display = isSearchVisible ? 'flex' : 'none'; // عرض أو إخفاء صندوق البحث
}


let menu = document.querySelector('#bars');
let tap = document.querySelector('.tap');

menu.onclick = () => {
    menu.classList.toggle('fa-times');
    tap.classList.toggle('active');
}



document.getElementById("userIcon").addEventListener("click", function () {
    document.querySelector(".account").style.display = "flex";
});

// إضافة حدث للنقر على عنصر "close2" لإخفاء النموذج
document.querySelector(".close2").addEventListener("click", function () {
    document.querySelector(".account").style.display="none";
});

function showPassword() {
    const password = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');

    // تبديل نوع الإدخال بين كلمة السر والنص
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);

    // تبديل أيقونة العين
    togglePassword.classList.toggle('fa-eye');
    togglePassword.classList.toggle('fa-eye-slash');
}

document.getElementById("userIcon").addEventListener("click", function () {
    document.querySelector(".account").style.display = "flex";
});
