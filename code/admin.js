// //
// // document.getElementById("button1").addEventListener("click" , function (){
// //     document.querySelector(".pop1").style.display ="flex";
// // })
// //
// // document.querySelector(".close").addEventListener("click",function (){
// //     document.querySelector(".pop1").style.display="none";
// // })
//
// function raghad(){
//     document.getElementById('pop1').style.display ="flex";
// }


function first1() {
    //صندوق البحث
    document.getElementById('search-form').style.display = 'none';
    document.getElementById('quantity').style.display = 'none';
    // document.getElementById('pop1').style.display = "none";
    document.getElementById('pop10').style.display = "none";

}


// let editButtons = document.getElementsByClassName("fa-edit");
// for (let i = 0; i < editButtons.length; i++) {
//     editButtons[i].addEventListener("click", function () {
//         document.querySelector(".pop").style.display = "flex";
//     });
// }

document.getElementById("add12").addEventListener("click", function () {
    document.querySelector(".pop10").style.display = "flex";
});


document.querySelector(".close").addEventListener("click", function () {
    document.querySelector(".pop").style.display = "none";
});

document.querySelector(".close5").addEventListener("click", function () {
    document.querySelector(".pop10").style.display = "none";
});


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


