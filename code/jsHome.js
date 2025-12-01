
let menu = document.querySelector('#bars');
let tap = document.querySelector('.tap');

menu.onclick = () => {
    menu.classList.toggle('fa-times');
    tap.classList.toggle('active');
}

function first() {
    document.getElementById('best-sellers').style.display = 'none';
    document.getElementById('New-Items').style.display = 'none';
    //صندوق البحث
    document.getElementById('search-form').style.display = 'none';
}

function setActiveNewProduct(event) {
    // إزالة الصف النشط من جميع التبويبات
    const tabs = document.querySelectorAll('.type a');
    tabs.forEach(tab => tab.classList.remove('OurFeatures'));

    // إضافة الصف النشط إلى التبويب الذي تم الضغط عليه
    event.currentTarget.classList.add('OurFeatures');

    // التحكم في العرض بناءً على التبويبة النشطة
    const targetClass = event.currentTarget.className.split(' ')[0];
    if (targetClass === 'BestSellers') {
        document.getElementById('our-features').style.display = 'none';
        document.getElementById('New-Items').style.display = 'none';
        document.getElementById('best-sellers').style.display = 'flex';
    } else if (targetClass === 'OurFeatures') {
        document.getElementById('best-sellers').style.display = 'none';
        document.getElementById('New-Items').style.display = 'none';
        document.getElementById('our-features').style.display = 'flex';
    } else if (targetClass === 'NewItems') {
        document.getElementById('our-features').style.display = 'none';
        document.getElementById('best-sellers').style.display = 'none';
        document.getElementById('New-Items').style.display = 'flex';
    }
}

function setActiveNewSale(event, saleId) {
    event.preventDefault();
    var sale50 = document.getElementById('sale50');
    var sale25 = document.getElementById('sale25');

    sale50.style.display = 'none';
    sale25.style.display = 'none';

    document.getElementById(saleId).style.display = 'flex';
}

function navigateToSalePage(event) {
    event.preventDefault();
    window.location.href = 'salePage.php?sale=sale25';
}




document.addEventListener('DOMContentLoaded', first);

function setActiveTab(event) {
    // إزالة الصف النشط من جميع التبويبات
    const tabs = document.querySelectorAll('.tap a');
    tabs.forEach(tab => tab.classList.remove('active'));

    // إضافة الصف النشط إلى التبويب الذي تم الضغط عليه
    event.currentTarget.classList.add('active');
}

function selectImage(filterId) {
    // تحديث حالة الراديو بوتن المرتبط بالفلتر المحدد
    let radioButton = document.getElementById(filterId);
    if (radioButton) {
        radioButton.checked = true;
    }

    // تحويل المستخدم إلى صفحة ال shop مع تمرير معلمة scroll
    window.location.href = `phpShop.php?selected=${filterId}&scroll=true`;
}

function selectImage2(filterId) {
    // تحديث حالة الراديو بوتن المرتبط بالفلتر المحدد
    let radioButton = document.getElementById(filterId);
    if (radioButton) {
        radioButton.checked = true;
    }

    // تحويل المستخدم إلى صفحة ال shop مع تمرير معلمة scroll
    window.location.href = `phpshopadmin.php?selected=${filterId}&scroll=true`;
}


document.getElementById("userIcon").addEventListener("click", function () {
    document.querySelector(".account").style.display = "flex";
});

// إضافة حدث للنقر على عنصر "close2" لإخفاء النموذج
document.querySelector(".close2").addEventListener("click", function () {
    document.querySelector(".account").style.display = "none";
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


function showDiv() {
    // هنا يمكنك إظهار الـ div المراد عرضه
    var divToShow = document.getElementById('pop1');
    divToShow.style.display = 'block';
}

function dissDiv() {
    // هنا يمكنك إظهار الـ div المراد عرضه
    var divToShow = document.getElementById('pop1');
    divToShow.style.display = 'none';
}

document.querySelector(".close").addEventListener("click", function () {
    document.querySelector(".pop").style.display = "none";
});


function selectImage19(filterId) {
    // تحديث حالة الراديو بوتن المرتبط بالفلتر المحدد
    let radioButton = document.getElementById(filterId);
    if (radioButton) {
        radioButton.checked = true;
    }

    // تحويل المستخدم إلى صفحة ال shop مع تمرير معلمة scroll
    window.location.href = `phpshopadmin.php?selected=${filterId}&scroll=true`;
}