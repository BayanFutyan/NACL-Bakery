function first() {
    //صندوق البحث
    document.getElementById('search-form').style.display = 'none';
    document.getElementById('quantity').style.display = 'none';
}


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

//filter
const rangeInput = document.querySelectorAll(".range-input input"),
    priceInput = document.querySelectorAll(".price-input input"),
    pogress = document.querySelector(".slider .pogress");
let priceGap = 10;

rangeInput.forEach(input => {
    input.addEventListener("input", e => {
        let minVal = parseInt(rangeInput[0].value),
            maxVal = parseInt(rangeInput[1].value);

        if (maxVal - minVal < priceGap) {
            if (e.target.className === "range-min") {
                rangeInput[0].value = maxVal - priceGap;
            } else {
                rangeInput[1].value = minVal + priceGap;
            }
        } else {
            priceInput[0].value = minVal;
            priceInput[1].value = maxVal;
            pogress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
            pogress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
        }
    });
});


window.addEventListener('scroll', function () {
    var filterElement = document.querySelector('.filter');
    var originalPosition = 630; // موضع الفلتر الأصلي بالنسبة لأعلى الصفحة
    var scrollPosition = window.scrollY;
    var windowHeight = window.innerHeight;
    var contentHeight = document.documentElement.scrollHeight;

    if (scrollPosition >= originalPosition && scrollPosition <= contentHeight - windowHeight) {
        filterElement.style.position = 'fixed';
        filterElement.style.top = '100px';
    } else if (scrollPosition > contentHeight - windowHeight) {
        filterElement.style.position = 'absolute';
        filterElement.style.top = (contentHeight - windowHeight - originalPosition) + 'px';
    } else {
        filterElement.style.position = 'absolute';
        filterElement.style.top = originalPosition + 'px';
    }
});


document.addEventListener('DOMContentLoaded', function () {
    const filterRadios = document.querySelectorAll('input[name="filtername"]');

    function setActiveNewProduct(event) {
        const selectedId = event.target.id;
        localStorage.setItem('selectedFilter', selectedId); // تخزين الحالة في localStorage
        const allCategories = ['cakee', 'breads', 'pp1', 'corr'];

        allCategories.forEach(category => {
            document.getElementById(category).style.display = 'none';
        });

        if (selectedId === 'All') {
            allCategories.forEach(category => {
                document.getElementById('cakee').style.display = 'none';
                document.getElementById('breads').style.display = 'none';
                document.getElementById('pp1').style.display = 'none';
                document.getElementById('corr').style.display = 'none';
                document.getElementById('ALL1').style.display = 'flex';
            });
        } else {
            if (selectedId === "cake") {
                document.getElementById('cakee').style.display = 'flex';
                document.getElementById('breads').style.display = 'none';
                document.getElementById('pp1').style.display = 'none';
                document.getElementById('corr').style.display = 'none';
                document.getElementById('ALL1').style.display = 'none';
            } else if (selectedId === "Bread") {
                document.getElementById('cakee').style.display = 'none';
                document.getElementById('breads').style.display = 'flex';
                document.getElementById('pp1').style.display = 'none';
                document.getElementById('corr').style.display = 'none';
                document.getElementById('ALL1').style.display = 'none';
            } else if (selectedId === "pp") {
                document.getElementById('cakee').style.display = 'none';
                document.getElementById('breads').style.display = 'none';
                document.getElementById('pp1').style.display = 'flex';
                document.getElementById('corr').style.display = 'none';
                document.getElementById('ALL1').style.display = 'none';
            } else if (selectedId === "cor") {
                document.getElementById('cakee').style.display = 'none';
                document.getElementById('breads').style.display = 'none';
                document.getElementById('pp1').style.display = 'none';
                document.getElementById('corr').style.display = 'flex';
                document.getElementById('ALL1').style.display = 'none';
            }
        }
    }

    filterRadios.forEach(radio => {
        radio.addEventListener('change', setActiveNewProduct);
    });

    // استرجاع الحالة عند تحميل الصفحة
    const savedFilter = localStorage.getItem('selectedFilter');
    if (savedFilter) {
        document.getElementById(savedFilter).checked = true;
        setActiveNewProduct({ target: document.getElementById(savedFilter) });
    } else {
        setActiveNewProduct({ target: document.querySelector('input[name="filtername"]:checked') });
    }
});

function getQueryParameter(name) {
    let urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(name);
}

window.onload = function () {
    let selectedFilter = getQueryParameter('selected');
    if (selectedFilter) {
        let radioButton = document.getElementById(selectedFilter);
        if (radioButton) {
            radioButton.checked = true;
            radioButton.dispatchEvent(new Event('change')); // لتفعيل تغيير العرض عند التحقق
        }

        let scroll = getQueryParameter('scroll');
        if (scroll === 'true') {
            // التمرير إلى 460 بكسل عند وجود معلمة scroll في عنوان URL
            window.scrollTo(0, 460);
        }
    }

    // استدعاء الدالة first لإخفاء صندوق البحث
    first();
}

document.addEventListener('DOMContentLoaded', function () {
    var filterElement = document.querySelector('.filter');
    var originalPosition = 630; // موضع الفلتر الأصلي بالنسبة لأعلى الصفحة
    var bufferFromBottom = 200; // المسافة التي يتوقف عندها الفلتر من نهاية الصفحة

    // تحديث موقع الفلتر في بداية التحميل
    function updateFilterPosition() {
        var scrollPosition = window.scrollY;
        var windowHeight = window.innerHeight;
        var contentHeight = document.documentElement.scrollHeight;
        var maxScrollPosition = contentHeight - windowHeight - bufferFromBottom; // الحد الأقصى للتمرير

        if (scrollPosition >= originalPosition && scrollPosition <= maxScrollPosition) {
            filterElement.style.position = 'fixed';
            filterElement.style.top = '100px';
        } else if (scrollPosition > maxScrollPosition) {
            filterElement.style.position = 'absolute';
            filterElement.style.top = (contentHeight - windowHeight - bufferFromBottom) + 'px';
        } else {
            filterElement.style.position = 'absolute';
            filterElement.style.top = originalPosition + 'px';
        }
    }

    updateFilterPosition(); // تحديث موقع الفلتر في بداية التحميل

    // تحديث موقع الفلتر عند التمرير
    window.addEventListener('scroll', updateFilterPosition);

    // تحديث موقع الفلتر عند تغيير حجم الشاشة
    window.addEventListener('resize', updateFilterPosition);
});


// start cart


let iconCart = document.querySelector('.copyclass');
let body = document.querySelector("body");
let cartTab = document.querySelector('.cartTab');

iconCart.addEventListener('click', (event) => {
    event.preventDefault(); // يمنع السلوك الافتراضي للرابط
    body.classList.toggle('showCart');
});


document.getElementById("userIcon").addEventListener("click", function () {
    document.querySelector(".account").style.display = "flex";
});



// إضافة حدث للنقر على عنصر "close2" لإخفاء النموذج
document.querySelector(".close2").addEventListener("click", function () {
    document.querySelector(".account").style.display="none";
});





// الوظيفة التي تمنع السكرول وإعادة التحميل
function preventDefaultBehavior(event) {
    event.preventDefault(); // منع السلوك الافتراضي
    // (اختياري) يمكنك تنفيذ الإجراء الذي تريده بعد منع الافتراضي هنا
}

//
// var iconLinks = document.querySelectorAll('a[class^="fas fa-heart"], a[class^="fas fa-shopping-cart"], a[class^="fas fa-eye"]');
//
// // Loop through the selected links and add a click event listener to each of them
// iconLinks.forEach(function(link) {
//     link.addEventListener('click', preventDefaultBehavior);
// });
//



function hideCartBox() {
    body.classList.remove('showCart');
}







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

setTimeout(function() {
    document.getElementById('thankYouPopup').style.display = 'block'; // عرض رسالة الشكر
    document.getElementById('thankYouPopup').style.display = 'none';
}, 5000); // 5000 ميلي ثانية = 5 ثوانٍ