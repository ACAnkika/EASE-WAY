
let menu=document.querySelector("#menu-btn");
let navbar=document.querySelector(".header .navbar");
menu.onclick= () =>{
    menu.classList.toggle("fa-times");
    menu.classList.toggle("active");

};
window.onscroll = () =>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
};
var swiper = new Swiper(".home-slider", {
    loop:true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
  var reviewswiper = new Swiper(".review-slider", {
    loop:true,
    spaceBetween: 20,
    autoHeight:true,
    grabCursor:true,

  breakpoints: {
    640: {
      slidesPerView: 8,
    },
    768: {
      slidesPerView: 6,
    },
    1024: {
      slidesPerView: 6,
    },
  },
});
let loadMoreBtn = document.querySelector('.packages .load-more .btn ');
let currentItem = 3;

loadMoreBtn.onclick = () => {
    let boxes = [...document.querySelectorAll('.packages .box-container .box')];
    for (var i = currentItem; i < currentItem+3; i++){
      boxes[i].style.display = 'inline-block';
    };
    currentItem += 3;
    if(currentItem >= boxes.length ){
        loadMoreBtn.style.display = 'none';
    }
}

function validateForm() {
  var email = document.getElementById("email").value;
  var arrivals = new Date(document.getElementById("arrivals").value);
  var leaving = new Date(document.getElementById("leaving").value);
  var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

  if (!emailPattern.test(email)) {
      document.getElementById("emailError").innerHTML = "Invalid email format";
      return false;
  } else {
      document.getElementById("emailError").innerHTML = "";
  }

  if (leaving < arrivals) {  // Change the condition to check if leaving is before arrival
      document.getElementById("dateError").innerHTML = "Date of leaving should be after date of arrival";
      return false;
  } else {
      document.getElementById("dateError").innerHTML = "";
  }

  return true;
}
